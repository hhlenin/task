@extends('admin.master')

@section('title', 'Add Product')

@section('page_name', 'Provide Product Informations')

@section('content')

<div class="col-md-7 mx-auto">
    
    <div class="card card-body">
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control">
                <span class="text-danger">{{ $errors->has('name')? $errors->first('name') : '' }}</span>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="7" class="form-control"></textarea>
                <span class="text-danger">{{ $errors->has('description')? $errors->first('description') : '' }}</span>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control">
                <span class="text-danger">{{ $errors->has('price')? $errors->first('price') : '' }}</span>
            </div>

            <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" name="unit" id="unit" class="form-control" placeholder="Kg/Litre/pc">
                <span class="text-danger">{{ $errors->has('unit')? $errors->first('unit') : '' }}</span>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control">
                <span class="text-danger">{{ $errors->has('quantity')? $errors->first('quantity') : '' }}</span>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                <span class="text-danger">{{ $errors->has('image')? $errors->first('image') : '' }}</span>
            </div>
     
            <div class="form-group">
                <input type="submit" value="Save Information" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
    
@endsection