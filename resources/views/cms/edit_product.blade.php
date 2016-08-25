@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-6">
        <h3>Aqui puedes editar tu producto</h3>
        <form action="{{ url('cms/products/' . $product['id']) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
            {{ csrf_field() }}
               <div class="form-group">
            <label for="category">Categoría</label>
            <select name="category" class="form-control">
            @foreach($categories as $row)
            <option value="{{$row->id}}">{{$row->title}}</option>
            @endforeach
            </select>
        </div>
             
             <div class="form-group">
            <label for="title">Title</label>
            <input value="{{ $product['title'] }}" type="text" name="title" class="form-control" placeholder="Title">
        </div>
            <div class="form-group">
            <label for="url">Url</label>
            <input value="{{ $product['url'] }}" type="text" name="url" class="form-control" placeholder="Url">
        </div>
            <div class="form-group">
            <label for="price">Precio</label>
            <input value="{{ $product['price'] }}" type="text" name="price" class="form-control" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="article">Articulo</label>
            <textarea name="article" class="form-control" rows="10">{{ $product['article'] }}</textarea>
        </div>
             <div class="form-group">
                 <label for="image">Imagen</label><br>
                 <img width="100" border="0" src="{{ asset('images/' . $product['image']) }}"><br><br>
            <input type="file" name="image">
        </div>
        
            <input type="submit" name="submit" value="Actualizar Producto" class="btn btn-primary">
            <a class="btn btn-default" href="{{url('cms/products')}}">Cancelar</a>
       
           </form>
        
    </div>
</div>

@endsection
