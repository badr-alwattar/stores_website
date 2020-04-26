@extends('layouts.app')

@section('content')
 
        <h1 class="text-center"> Edit Store </h1>
        <div class="container">
            {!! Form::open(['action' => ['StoresController@update', $store->id], 'method' => 'POST']) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-sm mt-1" align="center"> 
                    {{Form::text('name', $store->name, ['class' => 'form-control', 'placeholder' => 'Store name'])}}
                    </div>
                    <div class="col-sm" align="center mt-1"> 
                        {{Form::text('phone', $store->phone, ['class' => 'form-control', 'placeholder' => 'Phone Number', 'disabled' => 'disabled'])}}
                    </div>
                    
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-sm mt-1" align="center"> 
                        {{Form::text('about_store', $store->about_store, ['class' => 'form-control', 'placeholder' => 'About Store'])}}
                    </div>

                    <div class="col-sm mt-1" align="center"> 
                        <select class="form-control" name="category">
                            @foreach ($categories as $category)
                                <option value='{{ $category->id }}'> {{ $category->name }} </option>
                            @endforeach    
                        </select>            
                    </div>
                </div>
            
            </div>


            <div class="form-group">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            </div>
        {!! Form::close() !!}
            {!! Form::open(['action' => ['StoresController@destroy', $store->id], 'method' => 'POST']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete Store', ['class' => 'btn btn-danger float-right'])}}
        {!! Form::close() !!}
        </div>

        

@endsection
