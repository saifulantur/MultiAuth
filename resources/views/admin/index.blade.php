@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">Admin Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            You are Admin
        </div>
    </div>

@endsection
