@extends('layouts.main')
@section('title', 'V Edit Product | page')
@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{ Route('product') }}">
            < Back </a>
                <br>
                <p>
                <h4>Welcome to the Edit Category Page</h4>
                </p>
                <p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>
                <p>Please Edit in the data below!</p>
                <div class="col-lg-8">
                    <form method="post" action="/product/{{ $product->id }}">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Item Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $product->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="unsignedInteger" class="form-control @error('price') is-invalid @enderror"
                                id="price" name="price" value="{{ $product->price }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" value="{{ $product->description }}">
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" value="{{ $product->image }}">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="select" class="form-label">Select to choose in Category below</label>
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                aria-label="Default select example" name="category_id">
                                <option selected>Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $product->category_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            @endsection
