@extends('layouts.app')

@section('content')
 
        <h1 class="text-center"> Edit User </h1>
        <div class="container">
            {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST']) !!}
            <div class="form-group ">
                <div class="row ">
                    <div class="col-sm mt-2" align="center"> 
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                    </div>
                    <div class="col-sm mt-2" align="center"> 
                        <input id="phone" type="tel" class="form-control" name="phone" 
                        placeholder="example: 966xx-xxxx-xxx" pattern="[9]{1}[6]{1}[6]{1}[0-9]{9}"
                        value='{{ $user->phone }}' required >
                    </div>

                    
                    
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Neiborhood') }}</label>

                <div class="col-md-5">
                    <select class="form-control" name="hood">
                        @foreach ($neighborhoods as $neighborhood)
                            <option value='{{ $neighborhood->id }}'> {{ $neighborhood->neighborhood }} </option>
                        @endforeach
                        </select>
                </div>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" placeholder="Address" name="address" value="{{ $user->address }}" required>
                </div>
            </div>
            
            <div class="form-group text-right">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Save', ['class' => 'btn btn-success'])}}
            </div>
        </div>

        

@endsection
