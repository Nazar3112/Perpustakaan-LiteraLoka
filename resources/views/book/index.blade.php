@extends('perpustakaan.master')

@section('title', 'Books')

@section('content')
<!-- Books Content Start-->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0">Books Table</h6>
                    <a href="{{ route('books.create') }}" class="btn btn-primary">+ Add Book</a>
                </div>

                <div class="table-responsive">
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publisher</th>
                                <th>Year</th>
                                <th>Category</th>
                                <th>ISBN</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publisher }}</td>
                                    <td>{{ $book->year }}</td>
                                    <td>{{ $book->category }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>{{ $book->stock }}</td>
                                    <td>
                                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No books available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Books Content End-->
@endsection
