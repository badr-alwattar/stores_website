@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        @if($product != null)
            <div class="col-sm-3 mt-2 text-center" >
            <div class="card">
                <div class="text-center">
                    <img class="card-img-top " style="width:50%" align="center" src="/storage/{{ $product->img }}" alt="Card image cap">
                </div>
                <div class="card-block">
                    <br>
                    <h3 class="card-title" style="font-weight: bold; ">{{ $product->name }}</h3>
                    <h4 class="card-title">{{ $product->price }} <b>SR </b></h4>
                    @if( $product->state == "Available" )
                    <span class="badge badge-pill badge-success">{{ $product->state }}</span>
                    @elseif( $product->state == "Sold out" )
                        <span class="badge badge-pill badge-danger">{{ $product->state }}</span>
                    @elseif( $product->state == "Coming Soon")
                        <span class="badge badge-pill badge-warning">{{ $product->state }}</span>
                    @endif
                    <br><br>

                    <p class="card-text"> {{ $product->description }} </p>

                    <ul class="list-inline" >
                    <li ><a href="#" ><a href="/products/{{ $product->id }}" class="btn btn-primary float-right" style="margin-left:5px; margin-right:5px;">  Show more  </a></a></li>
                    
                    @if(Auth::user()->role_id == 2)
                    <li ><a href="{{$product->id}}/edit" ><a href="/products/{{$product->id}}/edit" class="btn btn-warning float-right" style="margin-left:5px;"> Edit </a></a></li>
                    <li >
                        {!! Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
                        {!! Form::close() !!} 
                    </li>
                    
                    @endif
                                
                </ul>


                </div>
            </div>
            </div>
        @else
            <h2> No product</h2>
        @endif

    </div>
</div>
@endsection
