@extends('cms.cms_master')

@section('cms_content')

    <div class="row">

        <div class="col-md-12">
            <h3>Aqui puedes editar a los usuarios</h3>
            <p>
                <a href="{{url('cms/users/create')}}" class="btn btn-primary">+ Agregar Usuario</a>
            </p>

            @if($users)
                <div class="col-md-6">
                    <br><br>
                    <div class="row">
                        <table class="table table-bordered">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Operation</th>
                            @foreach($users as $row)
                                <tr>
                                    <td>{{$row['name']}}</td>
                                    <td>{{$row['email']}}</td>
                                    <td>
                                        <a href="{{ url('cms/users/' . $row['id'] . '/edit') }}">Editar</a>
                                        <a href="{{url('cms/users/' . $row['id'] )}}">Eliminar</a>
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