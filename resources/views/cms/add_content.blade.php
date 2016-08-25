@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-6">
        <h3>Aqui puedes agregar un nuevo contenido - </h3>
        @if($menu)
        <form action="{{url('cms/content')}}" method="post">
            {{ csrf_field() }}
             <div class="form-group">
            <label for="menu">Menu</label>
            <select name="menu" class="form-control">
            <option value="-1">Elige un menu</option>
            @foreach($menu as $row)
            <option value="{{$row['id']}}">{{$row['link']}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{ Input::old('title') }}" type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="article">Articulo</label>
            <textarea name="article" class="form-control" rows="10">{{ Input::old('article') }}</textarea>
        </div>
            <input type="submit" name="submit" value="Guardar Contenido" class="btn btn-primary">
            <a class="btn btn-default" href="{{url('cms/content')}}">Cancelar</a>
        </form>
        @else
        <p>No hay menu para elegir <a href="{{ url('cms/content') }}">Volver</a></p>
        @endif
        
    </div>
</div>

@endsection
