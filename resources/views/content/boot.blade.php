@extends('master')

@section('content')

<div class="row">
    @if($contents)
    @foreach($contents as $row)
    <div class="col-md-12">
        <h2>{{$row['title']}}</h2>
        <p>{!! $row['article'] !!}</p>
    </div>
    @endforeach
    @else
    <div class="col-md-12">
        <p><i>No se encontro contenido...</i></p>
    </div>
    @endif
</div>

@endsection
