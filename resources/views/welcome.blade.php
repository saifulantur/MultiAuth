@extends('layouts.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-warning" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h1>Welcome Page</h1>
@endsection
