@extends('layouts.app')

@section('content')

    
<div class="container">
    @if( !empty($orders) )
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Status</th>
                <th scope="col">Total</th>
                <th scope="col">Time</th>
                <th scope="col">Deliver</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                    <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td> <a href="#">Take Order</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   
    @else
    <div class="container">
        <h2> No orders yet </h2>
    </div>
    @endif
</div>

@endsection
