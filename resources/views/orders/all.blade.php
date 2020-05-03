@extends('layouts.app')

@section('content')

    
<div class="container">
    @if($orders->count() > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Status</th>
                <th scope="col">Total</th>
                <th scope="col">Time</th>
                <th scope="col">More</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                    <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td> <a href="#">Details</a> </td>
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
