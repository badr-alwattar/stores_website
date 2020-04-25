@extends('layouts.app')

@section('content')


<h1 style="text-align:center; ">Create Your Store</h1>
        <div class="container">
            {!! Form::open(['action' => 'StoresController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-sm mt-1" align="center"> 
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Store name'])}}
                    </div>
                    <div class="col-sm" align="center mt-1"> 
                        {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
                    </div>
                    
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm mt-1" align="center"> 
                        {{Form::text('about_store', '', ['class' => 'form-control', 'placeholder' => 'About Store'])}}
                    </div>
                </div>
            
            </div>

            

            <div class="form-group">
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                </div>
        {!! Form::close() !!}
        </div>
@endsection