@extends('master')

@section('content')

<div class="row text-center">
    <div class="col-md-12" >
        <h2>{{ $title }}</h2>
        <div class="btn-group pull-right">
            <form action="{{ url('shop/'.$cat_url ) }}" method="GET" class='navbar-form navbar-lef' role='search'>
                <div class="form-group">
                    <select title="sort" name="sort" class="form-control" value="hola">
                        @if($_GET['sort'] == 'asc')
                            <option value="des">Mayor precio</option>
                            <option value="asc" selected>Menor precio</option>
                        @else
                            <option value="des">Mayor precio</option>
                            <option value="asc">Menor precio</option>
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-info">Ordenar</button>
            </form>
        </div>
    </div>
</div>

<div class="row text-center" >
    @if($products)
    
    @foreach($products as $row)
        <div class="col-md-6">
            <h3>{{$row['title']}}</h3>
            <p>{!! $row['article'] !!}</p>
            <p><img width="250" border="0" src="{{asset('images/' . $row['image'])}}"></p>
            <p><b>Precio:</b> {{ $row['price'] }}$</p>
            <p>
                <input  @if(Cart::get($row['id'])) disabled="disabled" @endif  type="button" data-id="{{ $row['id'] }}" class="add-to-cart btn btn-success" value="+ Agregar al carrito" >
                <a href="{{ url('shop/' . $cat_url . '/' . $row['url']) }}" class="btn btn-primary">Ver detalles</a>
            </p>
        </div>
    @endforeach
    
    @else
    <div class="col-md-12">
        <p>No Products...</p>
    </div>
    @endif
</div>

@endsection
