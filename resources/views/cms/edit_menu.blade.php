@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-6">
        <h3>Aqui puedes editar tu menu</h3>
        <form action="{{ url('cms/menu/' . $menu['id']) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="menu_id" value="{{ $menu['id'] }}">
            {{ csrf_field() }}
        <div class="form-group">
            <label for="link">Link</label>
            <input value="{{ $menu['link'] }}" type="text" name="link" class="form-control" placeholder="Link">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{ $menu['title'] }}" type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="url">Url</label>
            <input value="{{ $menu['url'] }}" type="text" name="url" class="form-control" placeholder="Url">
        </div>
            <input type="submit" name="submit" value="Actualizar Menu" class="btn btn-primary">
            <a class="btn btn-default" href="{{url('cms/menu')}}">Cancelar</a>
        </form>
        
    </div>
</div>

@endsection
