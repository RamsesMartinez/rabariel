@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-6">
        <h3>Aqui puedes editar una categoria - </h3>
        
        <form action="{{ url('cms/categories/' . $category['id']) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="category_id" value="{{$category['id']}}">
             {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{ $category['title']}}" type="text" name="title" class="form-control" placeholder="Title">
        </div>
             <div class="form-group">
            <label for="url">Url</label>
            <input value="{{ $category['url'] }}" type="text" name="url" class="form-control" placeholder="Url">
        </div>
        <div class="form-group">
            <label for="article">Articulo</label>
            <textarea name="article" class="form-control" rows="10">{{ $category['article'] }}</textarea>
        </div>
             <div class="form-group">
            <label for="image">Imagen</label>
            <img width="50" border="0" src="{{asset('images/' . $category['image'])}}">
            <input type="file" name="image">
        </div>
            <input type="submit" name="submit" value="Actualizar Categoria" class="btn btn-primary">
            <a class="btn btn-default" href="{{url('cms/categories')}}">Cancelar</a>
        </form>
       
        
    </div>
</div>

@endsection
