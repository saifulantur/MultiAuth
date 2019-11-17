@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('frontend.partials.left-navbar')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('post.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" name="image" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="bookName">Book Name</label>
                            <input type="text" class="form-control" name="bookName" id="bookName" placeholder="Enter Book Name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" placeholder="Enter Description" name="description" id="description" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="author_id" >Author Name</label>
                            <select name="author_id" id="author_id" class="form-control">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Enter Price">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success">Share Post</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
