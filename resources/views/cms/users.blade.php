@extends('cms.cms_master')

@section('cms_content')

    <div class="row">

        <div class="col-md-12">
            <h3>Aqui puedes editar a los usuarios</h3>
            <p>
                <a href="{{url('cms/products/create')}}" class="btn btn-primary">+ Agregar Producto</a>
            </p>


        </div>
    </div>

@endsection
