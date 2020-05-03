@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-4 px-4">
        <div class="col">
            @if(Auth::check())
                @if(Auth::user()->role_id == 2 && Auth::user()->store_id != null)
                    <a href="#"><a href='/products/create' class="btn btn-success align-right mb-3"  >  Add product  </a></a>
                @endif
            @endif
        </div>
    </div>


    
</div>
@endsection
