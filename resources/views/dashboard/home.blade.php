@extends('layouts.app')

@section('content')

    @if(Auth::user()->role_id == 1)
        @include('dashboard.buyer')
    @elseif(Auth::user()->role_id == 2)
        @include('dashboard.supplier')
    @elseif(Auth::user()->role_id == 3)
        @include('dashboard.admin')
    @elseif(Auth::user()->role_id == 4)
        @include('dashboard.delivery')

    @endif

@endsection
