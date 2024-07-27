@extends('admin.master')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>supplier_id</th>
                <th>name</th>
                <th>content</th>
                <th>price</th>
                <th>quantity</th>
                <th>created_at</th>
                <th>updated_at</th>

            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->supplier->name }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->content }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
            </tr>


    </table>
@endsection
