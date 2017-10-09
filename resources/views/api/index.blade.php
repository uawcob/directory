@extends('layouts.app')

@section('content')
    <h1>API Documentation</h1>

    <ul>
        <li><a href="{{ route('api.v1') }}">Version 1</a></li>
    </ul>
@endsection
