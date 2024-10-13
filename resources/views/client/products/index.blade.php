@extends('client.layouts.master')

@section('title')
    DANH SÁCH SẢN PHẨM
@endsection

@section('content')
    <h1>DANH SÁCH SẢN PHẨM</h1>

    <a href="{{ route('products.create')}}"><button class="btn btn-success">Thêm mới</button></a> <br> <br>


    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>IS ACTIVE</th>
                    <th>IMAGE</th>
                    <th>CREATED AT</th>
                    <th>UPDATED AT</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($data as $product)
                    <tr class="">
                        <td> {{ $product->id }} </td>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->description }} </td>
                        <td> {{ $product->price }} </td>
                        <td> {{ $product->quantity }} </td>
                        <td>
                            @if ($product->is_active)
                                <span class="badge bg-primary">YES</span>
                            @else
                                <span class="badge bg-danger">NO</span>                               
                            @endif
                        </td>
                        <td>
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image)}}" width="100px" height="80px" alt="">
                            @endif
                        </td>
                        <td> {{ $product->created_at }} </td>
                        <td> {{ $product->updated_at }} </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $data->links() }}
    </div>
@endsection
