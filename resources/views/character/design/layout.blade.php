@extends('layouts.app')

@section('title') 
    @yield('design-title')
@endsection

@section('sidebar')
    @include('character.design._sidebar')
@endsection

@section('content')
    @yield('design-content')
@endsection

@comments(['model' => $request,
        'perPage' => 5
    ])

@section('scripts')
@parent
@endsection