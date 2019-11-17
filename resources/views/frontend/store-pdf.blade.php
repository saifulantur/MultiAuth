@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include('frontend.partials.left-navbar')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Pdf</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('pdf.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="book_name">Book Name</label>
                                <input type="text" class="form-control" value="{{ old('book_name') }}" name="book_name" id="book_name" placeholder="Enter Book Name">
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
                                <label for="pdf_file">Pdf</label>
                                <input id="pdf_file" name="pdf_file" type="file" class="form-control">
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-success">Add Pdf</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
