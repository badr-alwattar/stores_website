@extends('layouts.app')

@section('content')

<div class="container">
    <h2> Buyer page</h2>
    <div class="row">
        @if($stores->count() > 0)
            @foreach($stores as $store)
                <div class="col col-3 py-2">
                    <div class="card" >
                        <img class="card-img-top" src='{{ $store->store_image }}' alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{ $store->name }}</h5>
                            <p class="card-text">{{ $store->about_store}}</p>
                        <a href='stores/{{$store->id}}' class="btn btn-primary">show store</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h2> No stores in the hood </h2>
        @endif
        
    </div>
</div>

@endsection
