@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">

            <div class="card">
                <div class="card-header bg bg-secondary text-white">User List</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @forelse($users as $user)
                                <th scope="row">1</th>
                                <td>{{ $user->name }}</td>
                                <td> {{ $user->email }}</td>
                                <td> {{ $user->phone }}</td>
                                <td>
                                    {{ $user->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $user->created_at->diffForHumans() }}
                                </td>

                        </tr>

                        @empty
                            <tr class="text-center">
                                <td colspan="4" class="text-danger"> No data available </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
