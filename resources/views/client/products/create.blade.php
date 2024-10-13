@extends('client.layouts.master')

@section('title')
    TRANG THÊM MỚI SẢN PHẨM
@endsection

@section('content')
    <h1>TRANG THÊM MỚI SẢN PHẨM</h1>

    <a href="{{ route('products.index') }}"><button class="btn btn-success">Quay lại</button></a> <br> <br>

    @if (session()->has('success') && !session()->get('success'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-4 col-form-label">Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ old('name') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-4 col-form-label">Description</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ old('description') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="price" class="col-4 col-form-label">Price</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="quantity" class="col-4 col-form-label">Quantity</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="quantity" id="quantity"
                        value="{{ old('quantity') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="is_active" class="col-4 col-form-label">Is Active</label>
                <div class="col-8">
                    <input type="checkbox" class="form-checkbox" value="1" name="is_active" id="is_active" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="image" class="col-4 col-form-label">Image</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="image" id="image" />
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
