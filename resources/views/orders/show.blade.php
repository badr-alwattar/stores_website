@extends('layouts.app')

@section('content')


@if($order->status == null)
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
                                {!! Form::open(['action' => 'OrdersController@removeProduct', 'method' => 'POST']) !!}
                                {{Form::hidden('product-id', $product->id)}}
                                {{Form::hidden('order-id', $product->pivot->order_id)}}
                                {{Form::submit('-', ['class' => 'btn btn-secondary rounded-circle'])}}
                                {!! Form::close() !!} 
                            </div>
                            <div class="col-xs-1 px-1 py-1">
                                <p class="text-center"> {{$product->pivot->count}} </p>
                            </div>
                            <div class="col-xs-1">
                                {!! Form::open(['action' => 'OrdersController@addProduct', 'method' => 'POST']) !!}
                                {{Form::hidden('product-id', $product->id)}}
                                {{Form::hidden('order-id', $product->pivot->order_id)}}
                                {{Form::submit('+', ['class' => 'btn btn-secondary rounded-circle'])}}
                                {!! Form::close() !!}
                                
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col offset-md-8">
                                {!! Form::open(['action' => 'OrdersController@deleteProduct', 'method' => 'POST']) !!}
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
            <div class="row py-3 mx-4 my-4 border">
                <div class="col-4">
                <h4 class="px-4 mx-4 "> Total = {{ $order->total }} SR </h4>
                </div>
                
                <div class="col-4">
                    
                    {!! Form::open(['action' => 'OrdersController@confirm', 'method' => 'POST', 'class' => 'form-inline']) !!}
                    {{Form::hidden('product-id', $products[0]->id)}}
                    {{Form::hidden('order-id', $products[0]->pivot->order_id)}}
                    <div class="form-group">
                        <label for="email" class="mx-2 h4">Payment:</label>
                        <label class="radio-inline mx-1"><input type="radio" name="role" value="buyer" checked>Chash</label>
                        <label class="radio-inline mx-1"><input type="radio" name="role" value="supplier">Card</label>
                        
                    </div>
                    
                    

                </div>
                
            </div>


            <div class="row py-3 mx-4 my-4 border">
                <h4 class="px-4 mx-4 "> Address: </h4>

                <div class="container">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm mt-1" align="center"> 
                            {{Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => 'Address'])}}
                            </div>
                            <div class="col-sm" align="center mt-1"> 
                                {{Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Phone Number', 'disabled' => 'disabled'])}}
                            </div>
                            
                        </div>
                    </div>
                    
                    
        
        
                    
                    
                </div>
                
            </div>
            
            <div class="row py-3 my-4 ">
                    <div class="col offset-md-9">
                        <div class="row">
                            <div class="col-xs-1 px-1">
                                <div class="form-group">
                                    
                                    {{Form::submit('Confirm Order', ['class' => 'btn btn-primary rounded-pill'])}}
                                </div>
                                    {!! Form::close() !!}
                                
                            </div>
                            <div class="col-xs-1 px-1">
                                {!! Form::open(['action' => 'OrdersController@cancel', 'method' => 'POST']) !!}
                                {{Form::hidden('order-id', $product->pivot->order_id)}}
                                {{Form::submit('Cancel Order', ['class' => 'btn btn-danger rounded-pill'])}}
                                {!! Form::close() !!}
                                {{-- <a href="/products/{{ $product->id }}" class="btn btn-danger rounded-pill" >    </a> --}}
                                {{-- <a href="/products/{{ $product->id }}" class="btn btn-primary rounded-pill" >  Confirm Order  </a> --}}
                            </div>
                        </div>
                        
                    </div>
                
                
            </div>
    @else
    <div class="container">
        <h2> No products yet </h2>
    </div>
    @endif
@else
    <div class="container">
        <h2> No orders waiting to be confirmed </h2>
    </div>
    
@endif

@endsection
