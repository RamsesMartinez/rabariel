@extends('master')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h2>¡Aquí puedes entrar con tu cuenta!</h2>
        <form action="" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="des" value="<?= $des; ?>">
        <div class="form-group">
            <label for="email">Email address</label>
            <input value="{{ Input::old('email') }}" type="text" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
            <input type="submit" name="submit" value="Sign in" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection
