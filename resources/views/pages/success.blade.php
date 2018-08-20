@extends('layouts.app')
@section('title', 'Success')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Success</div>
    <div class="panel-body text-center">
        <h1>{{ $msg }}</h1>
        <a class="btn btn-primary" href="{{ route('root') }}">Back to Homepage</a>
    </div>
</div>
@endsection
