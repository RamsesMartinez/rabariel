@extends('cms.cms_master')

@section('cms_content')

<div class="row">
    <div class="col-md-12">
        <h3>Aquí puedes ver todas las Ordenes del sitio</h3>
    </div>
    
    @if($orders)
    
    <table class="table table-bordered">
        <th>
            Usuario
        </th>
        <th>
            Ordenes
        </th>
        <th>
            Total
        </th>
        <th>
            Fecha
        </th>
        
        @foreach($orders as $row)
        <tr>
            <td>{{ $row->name }}</td>
            <td>
                <ul>
                @foreach(json_decode($row->data) as $value)
                <li>{{ $value->name }}, Cantidad:{{ $value->quantity }}, Precio:{{$value->price}}$</li>
                @endforeach
                </ul>
            </td>
            <td>{{ $row->total }}$</td>
            <td>{{ $row->created_at }}</td>
        </tr>
        @endforeach
        
    </table>
    
    @else
    
    <p><i>No se encontraron ordenes...</i></p>
    
    @endif
    
</div>

@endsection
