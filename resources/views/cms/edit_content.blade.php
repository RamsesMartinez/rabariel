@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-6">
        <h3>Aqui puedes editar tu contenido</h3>
        <form action="{{ url('cms/content/' . $content['id']) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
               <div class="form-group">
            <label for="menu">Menu</label>
            <select name="menu" class="form-control">
            @foreach($menu as $row)
            <option value="{{$row->id}}">{{$row->link}}</option>
            @endforeach
            </select>
        </div>
             
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{ $content['title'] }}" type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="article">Articulo</label>
            <textarea name="article" class="form-control" rows="10">{{ $content['article'] }}</textarea>
        </div>
            <input type="submit" name="submit" value="Actualizar Contenido" class="btn btn-primary">
            <a class="btn btn-default" href="{{url('cms/content')}}">Cancelar</a>
       
           </form>
        
    </div>
</div>

@endsection
