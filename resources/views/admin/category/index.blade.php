@extends('layouts.app')

@section('content')

@include('layouts.message')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">

                @isset ( $category )
                    
                    <div class="card-header">Update Category</div>                    

                @else

                    <div class="card-header">Add Category</div>

                @endisset

                <div class="card-body">
                    
                    @isset ( $category )

                        <form action=" {{ route('category.update', $category->id) }} " method="POST" >

                            @method('PUT')
                        
                    @else

                        <form action=" {{ route('category.store') }} " method="POST" >

                    @endisset
                        
                        @csrf

                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-center">{{ __('Name') }}</label>

                            <div class="col-md-8">

                                @isset ( $category )

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>
                                    
                                @else

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @endisset
                                

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                @isset ( $category )

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    
                                @else

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>

                                @endisset

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

