@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include('frontend.partials.left-navbar')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Your Ads List
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Author Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Posts as $post)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $post->bookName }}</td>
                                <td>{{ str_limit($post->description, 10) }}</td>
                                <td>{{ $post->price }}</td>
                                <td>{{ $post->relationToAuthorName->name }}</td>
                                <td>{{ $post->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $post->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <a href="{{ route('ad.edit', ['id'=>$post->id]) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                    <br>
                                    <a href="{{ route('ad.destroy', ['id'=>$post->id]) }}" class="btn btn-outline-danger btn-sm mt-1">Delete</a>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
