@extends('master')

@section('content')



<div class="row text-center" >
    @if($item)
      <div class="col-md-12">
            <h3>{{$item['title']}}</h3>
            <p>{!! $item['article'] !!}</p>
            <p><img width="350" border="0" src="{{asset('images/' . $item['image'])}}"></p>
            <p><b>Precio:</b> {{ $item['price'] }}$</p>
            <p>
                <input @if(Cart::get($item['id'])) disabled="disabled" @endif type="button" data-id="{{ $item['id'] }}" class="add-to-cart btn btn-success" value="+ Agregar al carrito">
                <a href="{{ url('shop/checkout')}}" class="btn btn-primary">Comprar</a>
            </p>
        </div>
    
    
    @else
    <div class="col-md-12">
        <p><i>No hay detalles...</i></p>
    @endif
</div>

@endsection
