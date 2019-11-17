@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header bg bg-info text-white">Create Author</div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Author Name</label>
                            <input class="form-control" type="text" id="name" name="name"
                                   placeholder="Enter Author Name">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">

            <div class="card">
                <div class="card-header bg bg-info text-white">All Author List</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Author Name</th>
                            <th>Created Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @forelse($authors as $author)
                                <th scope="row">1</th>
                                <td>{{ $author->name }}</td>
                                <td>
                                    {{ $author->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $author->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <a href="{{ route('authorNameEdit', ['id'=> $author->id]) }}" class="btn btn-warning btn-sm mb-2">Edit</a>
                                    <br>
                                    <a href="{{ route('destroy', ['id'=> $author->id]) }}" class="btn btn-danger btn-sm">Delete</a>
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

    <div class="row">
        <div class="col-md-12 mb-2">

            <div class="card">
                <div class="card-header bg bg-warning text-white">Deleted Author List</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Author Name</th>
                            <th>Created Time</th>
                            <th>Deleted Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @forelse($softDeletedAuthors as $softDeletedAuthor)
                                <th scope="row">1</th>
                                <td>{{ $softDeletedAuthor->name }}</td>
                                <td>
                                    {{ $softDeletedAuthor->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $softDeletedAuthor->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    {{ $softDeletedAuthor->deleted_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $softDeletedAuthor->deleted_at->diffForHumans() }}
                                </td>
                                <td>
                                    <a href="{{ route('restore', ['id' => $softDeletedAuthor->id]) }}" class="btn btn-primary btn-sm">Restore</a>
                                    <br>
                                    <a href="{{ route('permanentDelete', ['id' => $softDeletedAuthor->id]) }}" class="btn btn-danger btn-sm mt-1">PermanentDelete</a>
                                </td>

                        </tr>

                        @empty
                            <tr class="text-center">
                                <td colspan="5" class="text-danger"> No data available </td>
                            </tr>
                            @endforelse

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection
