@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-12">
        <h3>Aqui puedes editar las categorias de tu sitio</h3>
        <p>
            <a href="{{url('cms/categories/create')}}" class="btn btn-primary">+ Agregar Categoria</a>
        </p>
        
        @if($categories)
        <div class="col-md-6">
            <br><br>
            <div class="row">
        <table class="table table-bordered">
            <th>Title</th>
            <th>Operation</th>
            @foreach($categories as $row)
            <tr>
                <td>{{$row['title']}}</td>
                <td>
                    <a href="{{ url('cms/categories/' . $row['id'] . '/edit') }}">Editar</a>
                    <a href="{{url('cms/categories/' . $row['id'] )}}">Eliminar</a>
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
