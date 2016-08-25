@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-6">
        <h3>Aqui puedes agregar un nuevo producto - </h3>
        @if($categories)
        <form action="{{url('cms/products')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             <div class="form-group">
            <label for="category">Categoria</label>
            <select name="category" class="form-control">
            <option value="-1">Elige ua categoria</option>
            @foreach($categories as $row)
            <option value="{{$row['id']}}">{{$row['title']}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{ Input::old('title') }}" type="text" name="title" class="form-control" placeholder="Title">
        </div>
            <div class="form-group">
            <label for="url">Url</label>
            <input value="{{ Input::old('url') }}" type="text" name="url" class="form-control" placeholder="Url">
        </div>
            <div class="form-group">
            <label for="price">Precio</label>
            <input value="{{ Input::old('price') }}" type="text" name="price" class="form-control" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="article">Articulo</label>
            <textarea name="article" class="form-control" rows="10">{{ Input::old('article') }}</textarea>
        </div>
             <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" name="image">
        </div>
            <input type="submit" name="submit" value="Guardar Producto" class="btn btn-primary">
            <a class="btn btn-default" href="{{url('cms/products')}}">Cancelar</a>
        </form>
        @else
        <p>No hay categoria para elegir <a href="{{ url('cms/products') }}">Volver</a></p>
        @endif
        
    </div>
</div>

@endsection
