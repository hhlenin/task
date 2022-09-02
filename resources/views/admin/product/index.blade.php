@extends('admin.master')

@section('title', 'Manage Products')

@section('page_name', 'Manage Products')

@section('content')

    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product Information Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td><img src="{{ asset($product->image) }}" alt="no image" style="height: 70px"></td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->unit }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product) }}" class="pl-1"><i class="fas fa-edit"></i></a>
                                        <a href="" class="text-danger"
                                            onclick="event.preventDefault();confirm('Are you Sure?'); document.getElementById('deleteForm{{ $product->id }}').submit()"><i
                                                class="fas fa-trash"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                                            id="deleteForm{{ $product->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
