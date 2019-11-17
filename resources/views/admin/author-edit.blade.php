@extends('layouts.admin')


@section('content')
    <div class="row mb-2">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header bg bg-primary text-white">Create Author</div>
                <div class="card-body">
                    <form action="{{ route('update', ['id' => $author->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Author Name</label>
                            <input class="form-control" type="text" id="name" name="name" value="{{ $author->name }}"
                                   placeholder="Enter Author Name">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
