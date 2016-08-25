@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-12">
        <h3>¿Estás seguro que quiere eliminar este contenido?</h3>
    <form action="{{ url('cms/content/' . $content_id) }}" method="post">
        <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <input type="submit" name="submit" value="Eliminar Menu" class="btn btn-primary">
            <a class="btn btn-default" href="{{url('cms/content')}}">Cancelar</a>
        </form> 
    </div>
        
        
        
    
</div>

@endsection
