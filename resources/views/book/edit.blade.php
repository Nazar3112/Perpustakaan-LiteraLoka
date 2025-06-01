@extends('perpustakaan.master')

@section('title', 'Edit Book')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Book</h6>
                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Publisher</label>
                        <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year</label>
                        <input type="number" name="year" class="form-control" value="{{ $book->year }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" value="{{ $book->category }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cover (Image)</label>
                        <input type="file" name="cover" class="form-control">
                        @if($book->cover)
                            <small>Current: <img src="{{ asset('storage/covers/'.$book->cover) }}" alt="cover" width="60"></small>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ISBN</label>
                        <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ $book->stock }}" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Book</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
