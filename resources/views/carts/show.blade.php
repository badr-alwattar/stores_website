@extends('layouts.app')

@section('content')

    {{-- <div class="row justify-content-center"> --}}
@if($showcart == "show")        
    @if($products->count() > 0)
        @foreach($products as $product)

            <div class="row py-3 mx-4 my-4 justify-content-center border">
                
                <div class="col col-2 text-center">
                    <img class="card-img-top " style="width:50%" align="center" src="https://image.flaticon.com/icons/svg/2826/2826356.svg" alt="Card image cap">                        
                </div>

                <div class="col col-9 ">
                    <div class="row ">
                        <div class="col col-4">
                        <h4> {{$product->name}} </h4>
                        <p class="font-weight-bold"> {{$product->price * $product->pivot->count}} SR</p>
                        </div>
                        <div class="col col-4 offset-md-4">
                        <div class="row justify-content-center py-2">
                            <div class="col-xs-1 " >
                                {!! Form::open(['action' => 'CartsController@removeProduct', 'method' => 'POST']) !!}
                                {{Form::hidden('id', $product->id)}}
                                {{Form::submit('-', ['class' => 'btn btn-secondary rounded-circle'])}}
                                {!! Form::close() !!} 
                            </div>
                            <div class="col-xs-1 px-1 py-1">
                                <p class="text-center"> {{$product->pivot->count}} </p>
                            </div>
                            <div class="col-xs-1">
                                {!! Form::open(['action' => 'CartsController@addProduct', 'method' => 'POST']) !!}
                                {{Form::hidden('id', $product->id)}}
                                {{Form::submit('+', ['class' => 'btn btn-secondary rounded-circle'])}}
                                {!! Form::close() !!}
                                
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col offset-md-8">
                                {!! Form::open(['action' => 'CartsController@deleteProduct', 'method' => 'POST']) !!}
                                    {{Form::hidden('product-id', $product->id)}}
                                    {{Form::hidden('order-id', $product->pivot->order_id)}}
                                    {{Form::submit('Delete Product', ['class' => 'btn btn-danger rounded-pill'])}}
                                    {!! Form::close() !!}
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>    
        @endforeach
            


            
            
            <div class="row py-3 my-4 ">
                    <div class="col offset-md-10">
                        {!! Form::open(['action' => 'CartsController@checkout', 'method' => 'POST']) !!}
                            {{Form::hidden('id', Auth::user()->cart_id)}}
                            {{Form::submit('checkout', ['class' => 'btn btn-success rounded-pill'])}}
                        {!! Form::close() !!}
                    </div>
                
                
            </div>
    @else
        <h2> No products yet </h2>
    @endif
@else
<h2> You have order to confirm, please check it </h2>
@endif

@endsection
