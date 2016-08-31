@extends('cms.cms_master')

@section('cms_content')

    <div class="row">

        <div class="col-md-6">
            <h3>Aqui puedes editar un usuario - </h3>

            <form action="{{ url('cms/users/' . $user['id']) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="user_id" value="{{$user['id']}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input value="{{ $user['name']}}" type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input value="{{ $user['email'] }}" type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                </div>
                <input type="submit" name="submit" value="Actualizar Usuario" class="btn btn-primary">
                <a class="btn btn-default" href="{{url('cms/users')}}">Cancelar</a>
            </form>


        </div>
    </div>

@endsection
