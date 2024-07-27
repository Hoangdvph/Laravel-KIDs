@extends('admin.master')

@section('content')
    <a class="btn btn-primary" href="{{ route('products.create')  }}">Them moi</a>

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
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->supplier->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('products.edit', $item)  }}">Edit</a>
                        <a class="btn btn-warning" href="{{ route('products.show', $item)  }}">Show</a>
                        <form action="{{ route('products.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        created_up
    </table>
@endsection
