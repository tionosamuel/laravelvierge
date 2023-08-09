@extends('products.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="form-group">
                <strong>image</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
                <img src="{{ asset('storage/picture/'.$product->image) }}" style="height: 70px;width:70px;">
                <!-- <img src="/image/{{ $product->image}}" width="250px"> -->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix</strong>
                <input type="number" name="prix" class="form-control" value="{{ $product->prix}}" placeholder="prix">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>category</strong>
                <input type="text" name="category" class="form-control" value="{{ $product->category}}" placeholder="category">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->detail }}
            </div>
        </div>
    </div>
@endsection