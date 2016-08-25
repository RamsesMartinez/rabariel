@extends('master')

@section('content')

<div class="row text-center">
    <div class="col-md-12" >
        <h2>Categories...</h2>
        
    </div>
</div>

<div class="row text-center" >
    @if($categories)
    
    @foreach($categories as $row)
        <div class="col-md-4">
            <h3>{{$row['title']}}</h3>
            <p>{!! $row['article'] !!}</p>
            <p><img width="250" border="0" src="{{asset('images/' . $row['image'])}}"></p>
            <p><a  href="{{ url('shop/' . $row['url']) }}" class="btn btn-primary">Ver producto</a></p>
        </div>
    @endforeach
    
    @else
    <div class="col-md-12">
        <p>No Categories...</p>
    @endif
</div>

@endsection
