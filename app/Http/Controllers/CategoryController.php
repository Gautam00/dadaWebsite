<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        if ( Auth::user()->type ) {
            
            $categories = Category::orderBy('updated_at', 'desc')->get();

            return view( 'admin.category.index', compact('categories') );
            
        } else {

            abort(404);

        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $createCategory = Category::create( $this->validateCategory() );

        if( $createCategory ) {

            return redirect('admin/category')->with('success', "Category added Successfully.");

        } else {

            return redirect('admin/category')->with('failed', "Something went wrong.");

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {

        $category = Category::findOrFail($id);

        $categories = Category::orderBy('updated_at', 'desc')->get();

        return view( 'admin.category.index', compact('category', 'categories') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $updateCategory = Category::findOrFail($id)->update( $this->validateCategory() );

        if( $updateCategory ) {

            return redirect('admin/category')->with('success', "Category updated Successfully.");

        } else {

            return redirect('admin/category')->with('failed', "Something went wrong.");

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request) {
        
        $deleteCategory = Category::findOrFail( request('id') )->delete();

        if( $deleteCategory ) {

            return '200';

        } else {

            return '400';  

        }

    }


    protected function validateCategory() {

        return request()->validate([

            'name' => 'required|min:2'

        ]);

    }

}
