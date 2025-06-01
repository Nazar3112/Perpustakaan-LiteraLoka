@extends('perpustakaan.master')

@section('title', 'Book Details')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Book Details</h6>
                <div class="row mb-2">
                    <div class="col-md-4">
                        @if($book->cover)
                            <img src="{{ asset('storage/'.$book->cover) }}" alt="cover" class="img-fluid rounded" style="max-width: 250px; max-height: 350px;">
                        @else
                            <p>No Cover Available</p>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table text-white">
                            <tr><th>Title</th><td>{{ $book->title }}</td></tr>
                            <tr><th>Author</th><td>{{ $book->author }}</td></tr>
                            <tr><th>Publisher</th><td>{{ $book->publisher }}</td></tr>
                            <tr><th>Year</th><td>{{ $book->year }}</td></tr>
                            <tr><th>Category</th><td>{{ $book->category }}</td></tr>
                            <tr><th>ISBN</th><td>{{ $book->isbn }}</td></tr>
                            <tr><th>Stock</th><td>{{ $book->stock }}</td></tr>
                        </table>
                        <a href="{{ route('books.index') }}" class="btn btn-light">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
