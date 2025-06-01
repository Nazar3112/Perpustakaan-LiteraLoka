@extends('perpustakaan.master')

@section('title', 'Add Book')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add New Book</h6>
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Publisher</label>
                        <input type="text" name="publisher" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year</label>
                        <input type="number" name="year" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cover (Image)</label>
                        <input type="file" name="cover" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ISBN</label>
                        <input type="text" name="isbn" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Book</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
