<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $categories = Category::all();

        return view('admin.product.index', compact('categories') );

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

        $available = $request->available ? 1 : 0;
        $file = $request->image ? 1 : 0;

        $validatation = $this->validateProduct( $available, $file );

        $productCreate = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category,
            'available' => $available,
            'stock' => $available ? $request->stock : 0;

        ]);

        $productCreate->

        // return $uploadImage = $this->uploadImage();


        


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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    protected function validateProduct( $available, $file ) {


        request()->validate([

            'name' => 'required|min:2',
            'price' => 'required',
            'category' => 'required'

        ]);

        if ( $available ) {
            
            request()->validate([

                'stock' => 'required'

            ]);

        }

        
        if ( $file ) {
            
            request()->validate([

                'image' => 'required|image|max:10000'

            ]);

        }


        return true;

    }


    protected function uploadImage() {

        $image = request('image');

        $file = $image->getClientOriginalName(); //Get Image Name

        $extension = $image->getClientOriginalExtension();  //Get Image Extension

        $fileName = $file.'.'.$extension; 

        return $fileName;

    }


}
