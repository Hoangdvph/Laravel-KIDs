@extends('admin.master')

@section('content')
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">supplier:</label>
            <select name="supplier_id" id="" class="form-label">
                @foreach ($supplier as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Name:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">content:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="content">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">price:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="price">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">quantity:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="quantity">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
