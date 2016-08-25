@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-12">
        <h3>Aqui puedes editar el contenido de tu sitio</h3>
        <p>
            <a href="{{url('cms/content/create')}}" class="btn btn-primary">+ Agregar Contenido</a>
        </p>
        
        @if($content)
        <div class="col-md-6">
            <br><br>
            <div class="row">
        <table class="table table-bordered">
            <th>Title</th>
            <th>Operation</th>
            @foreach($content as $row)
            <tr>
                <td>{{$row['title']}}</td>
                <td>
                    <a href="{{ url('cms/content/' . $row['id'] . '/edit') }}">Editar</a>
                    <a href="{{url('cms/content/' . $row['id'] )}}">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </table>
            </div>
        </div>
        @endif
        
    </div>
</div>

@endsection
