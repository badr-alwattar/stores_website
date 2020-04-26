@extends('layouts.app')

@section('content')


<h1 style="text-align:center; ">Add Product </h1>
        <div class="container">
            {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Product name'])}}
                    </div>
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {{Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Price', 'min' => '0', 'step' => '0.1'])}}
                    </div>
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {!! Form::select('state',['Available', 'Sold out', 'Coming Soon'],'',['class' => 'form-control', 'placeholder' => 'State']) !!}
                    </div>
                </div>
            
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                    </div>
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                        <input id="img" type="file" class="form-control" name="img" required>
                    </div>
                    <div class="col-sm" align="center" style="margin-top: 5px;"> 
                    {{Form::number('instock', '', ['class' => 'form-control', 'placeholder' => 'In Stock', 'min' => '0'])}}
                    </div>
                </div>
            
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm hi" align="center" style="margin-top: 5px;"> 
                    {{Form::textarea('details', '', ['class' => 'form-control', 'placeholder' => 'Details', 'id' => 'editor'])}}
                    </div>
                </div>
            
            </div>

            <div class="form-group">
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                </div>
        {!! Form::close() !!}
        </div>
@endsection