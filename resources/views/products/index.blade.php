@extends('products.app')
 
@section('content')
<br>
<br>
<br>
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Alimenttation bon Samaritain</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Ajouter un Nouveau Produit</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            
            <th>N°</th>
            <th>Nom</th>
            <th>image</th>
            <th>prix</th>
            <th>category</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td><img src="{{ asset('storage/picture/'.$product->image) }}" style="height: 70px;width:70px;"></td>
            <td>{{ $product->prix }}</td>
            <td>{{ $product->category_id}}</td>
            <td>{{ $product->detail }}</td>
            
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST" enctype='multipart/form-data' >
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
      
@endsection