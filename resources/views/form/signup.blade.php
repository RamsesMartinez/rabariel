@extends('master')

@section('content')



<div class="row">
    <div class="col-md-6">
        <h2>¡Aquí puedes registrar una cuenta!</h2>
        <form action="" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="des" value="<? $des; ?>">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input value="{{ Input::old('name') }}" type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input value="{{ Input::old('email') }}" type="text" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
        </div>
            <input type="submit" name="submit" value="Sign up" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
