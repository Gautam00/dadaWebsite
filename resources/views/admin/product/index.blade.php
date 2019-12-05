@extends('layouts.app')

@section('content')

@include('layouts.message')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">

                <div class="card-header">Add Product</div>

                <div class="card-body">
                    
                    <form action=" {{ route('product.store') }} " method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        
                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-center">{{ __('Name') }}</label>

                            <div class="col-md-8">

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <div class="form-group row">

                            <label for="price" class="col-md-4 col-form-label text-md-center">{{ __('Price') }}</label>

                            <div class="col-md-8">

                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <div class="form-group row">

                            <label for="category" class="col-md-4 col-form-label text-md-center">{{ __('Category') }}</label>

                            <div class="col-md-8">

                                <select class="form-control @error('category') is-invalid @enderror" name="category">
                                  
                                  <option value="">Select</option>  

                                  @foreach ($categories as $category)
                                      
                                      @if ( $category->id == old('category') )
                                        
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                      
                                      @else
                                            
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                                      @endif

                                  @endforeach

                                </select>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="category" class="col-md-4 col-form-label text-md-center">{{ __('Availablity') }}</label>

                            <div class="col-md-8">

                              <div class="form-check margin-top-10">

                                <input class="form-check-input" type="checkbox" id="available" name="available" checked>

                                <label class="form-check-label" for="available">
                                  Available
                                </label>

                              </div>

                            </div>

                        </div>

                        <div class="form-group row stock-div">

                            <label for="stock" class="col-md-4 col-form-label text-md-center">{{ __('Stock') }}</label>

                            <div class="col-md-8">

                                <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" autocomplete="stock" autofocus>

                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="stock" class="col-md-4 col-form-label text-md-center">{{ __('Image') }}</label>

                            <div class="col-md-8">

                                <div class="form-group">

                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Product') }}
                                </button>

                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    
                    @isset ( $categories )

                        <table id="dataTable" class="display">

                            <thead>

                                <tr>
                                    <th>Index</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>

                            </thead>

                            <tbody>
                                
                                @foreach ($categories as $index => $category)

                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                                
                                            <a href=" {{ route('category.edit', $category->id) }} "><i class="fa fa-pencil-square-o font-size" aria-hidden="true"></i></a>

                                            <a onclick=" confirmMsg( 'Category', {{ $category->id }} ) "><i class="fa fa-trash font-size" aria-hidden="true"></i></a>

                                        </td>
                                    </tr>

                                @endforeach
        
                            </tbody>

                        </table>

                    @endisset

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

