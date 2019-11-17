@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include('frontend.partials.left-navbar')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary"><span class="text-warning">{{ $single_product_details->bookName }} </span>Edit</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('ad.update', ['id' => $single_product_details->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input id="image" name="image" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="bookName">Book Name</label>
                                <input type="text" value="{{ $single_product_details->bookName }}" class="form-control" name="bookName" id="bookName" placeholder="Enter Book Name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control"  placeholder="Enter Description" name="description" id="description" cols="30" rows="10">{{ $single_product_details->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="author_id" >Author Name</label>
                                <select name="author_id" id="author_id" class="form-control">
                                    <option value="{{ $single_product_details->author_id }}">{{ $single_product_details->relationToAuthorName->name }}</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" value="{{ $single_product_details->price }}" class="form-control" name="price" placeholder="Enter Price">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-warning">Update Post</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
