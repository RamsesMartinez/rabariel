@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    
    <div class="col-md-12">
        <h3>Aqui puedes editar el menu de tu sitio</h3>
        <p>
            <a href="{{url('cms/menu/create')}}" class="btn btn-primary">+ Agregar Menu</a>
        </p>
        
        @if($menu)
        <div class="col-md-6">
            <br><br>
            <div class="row">
        <table class="table table-bordered">
            <th>Link</th>
            <th>Operation</th>
            @foreach($menu as $row)
            <tr>
                <td>{{$row['link']}}</td>
                <td>
                    <a href="{{ url('cms/menu/' . $row['id'] . '/edit') }}">Editar</a>
                    <a href="{{url('cms/menu/' . $row['id'] )}}">Eliminar</a>
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
