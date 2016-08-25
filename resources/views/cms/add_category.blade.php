@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-6">
        <h3>Aqui puedes agregar una nueva categoria - </h3>
        
        <form action="{{url('cms/categories')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{ Input::old('title') }}" type="text" name="title" class="form-control" placeholder="Title">
        </div>
             <div class="form-group">
            <label for="url">Url</label>
            <input value="{{ Input::old('url') }}" type="text" name="url" class="form-control" placeholder="Url">
        </div>
        <div class="form-group">
            <label for="article">Articulo</label>
            <textarea name="article" class="form-control" rows="10">{{ Input::old('article') }}</textarea>
        </div>
             <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" name="image">
        </div>
            <input type="submit" name="submit" value="Guardar Categoria" class="btn btn-primary">
            <a class="btn btn-default" href="{{url('cms/categories')}}">Cancelar</a>
        </form>
       
        
    </div>
</div>

@endsection
