@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h2>Hacer la compra...</h2>
        <p>Productos en el carrito...</p>
    </div>
</div>
@if($cart)
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
            @foreach($cart as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>
                    <input type="button" value="-" class="update-cart" data-op="minus" data-id="{{$item['id']}}">
                    <input class="text-center" type="text" size="1" value="{{ $item['quantity'] }}">
                    <input type="button" value="+" class="update-cart" data-op="plus" data-id="{{$item['id']}}">
                </td>
                <td>{{ $item['price'] }}$</td>
                <td>{{ $item['quantity'] * $item['price'] }}$</td>
            </tr>
            @endforeach
            
            <tr>
                <td><b>Total en el carrito: </b>{{ Cart::getTotal() }}$</td>
                <td></td><td></td>
                <td><a href="{{ url('shop/clear-cart') }}" class="btn btn-default">Vaciar carrito</a></td>
            </tr>
        </table>
        <p><a href="{{ url('shop/order') }}" class="btn btn-primary">Enviar ya</a></p>
    </div>
</div>
@else

<div class="row">
    <div class="col-md-12">
        <p><i>No hay items en el carrito...</i></p>
    </div>
</div>

@endif
@endsection
