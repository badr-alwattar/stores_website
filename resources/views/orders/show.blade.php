@extends('layouts.app')

@section('content')

    {{-- <div class="row justify-content-center"> --}}
        
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
                            <a href="/products/{{ $product->id }}" class="btn btn-danger rounded-pill" >  Remove Product  </a>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>    
    @endforeach
        <div class="row py-3 mx-4 my-4 border">
            <div class="col-4">
                <h4 class="px-4 mx-4 "> Total = $$ SR </h4>
            </div>
            
            <div class="col-4">
                
                {!! Form::open(['action' => ['StoresController@update', $product->id], 'method' => 'POST', 'class' => 'form-inline']) !!}
                <div class="form-group">
                    <label for="email" class="mx-2 h4">Payment:</label>
                    <label class="radio-inline mx-1"><input type="radio" name="role" value="buyer" checked>Chash</label>
                    <label class="radio-inline mx-1"><input type="radio" name="role" value="supplier">Card</label>
                    
                </div>
                  
                {!! Form::close() !!}

            </div>
            
        </div>


        <div class="row py-3 mx-4 my-4 border">
            <h4 class="px-4 mx-4 "> Address: </h4>

            <div class="container">
                {!! Form::open(['action' => ['StoresController@update', $product->id], 'method' => 'POST', ]) !!}
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm mt-1" align="center"> 
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Address'])}}
                        </div>
                        <div class="col-sm" align="center mt-1"> 
                            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
                        </div>
                        
                    </div>
                </div>

                <div class="form-group">
                    
                    {{Form::submit('Save', ['class' => 'btn btn-success float-right'])}}
                </div>
            {!! Form::close() !!}
                
            </div>
            
        </div>
        
        <div class="row py-3 my-4 ">
                <div class="col offset-md-9">
                    <div class="row">
                        <div class="col-xs-1 px-1">
                            <a href="/products/{{ $product->id }}" class="btn btn-danger rounded-pill" >  Cancel Order  </a>
                        </div>
                        <div class="col-xs-1 px-1">
                            <a href="/products/{{ $product->id }}" class="btn btn-primary rounded-pill" >  Confirm Order  </a>
                        </div>
                    </div>
                    
                </div>
            
            
        </div>
@else
    <h2> No products yet </h2>
@endif
        

@endsection
