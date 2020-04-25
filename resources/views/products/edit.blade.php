@extends('layouts.app')

@section('content')
 
        <h1 class="text-center"> Edit Product </h1>
        <div class="container">
            {!! Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST']) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {{Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Product name'])}}
                    </div>
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {{Form::number('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Price', 'min' => '0', 'step' => '0.1'])}}
                    </div>
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {!! Form::select('state',['Available', 'Sold out', 'Coming Soon'],'',['class' => 'form-control', 'placeholder' => 'State']) !!}
                    </div>
                </div>
            
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {{Form::text('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
                    </div>
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {{Form::text('imglink', $product->img, ['class' => 'form-control', 'placeholder' => 'Image Link'])}}
                    </div>
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {{Form::number('instock', $product->instock, ['class' => 'form-control', 'placeholder' => 'In Stock', 'min' => '0'])}}
                    </div>
                </div>
            
            </div>

            <div class="form-group">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            </div>
        {!! Form::close() !!}
            {!! Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete Store', ['class' => 'btn btn-danger float-right'])}}
        {!! Form::close() !!}
        </div>

        

@endsection
