@extends('perpustakaan.master')

@section('title', 'Borrowing Details')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Borrowing Details</h6>
                <table class="table text-white">
                    <tr><th>ID</th><td>{{ $borrowing->id }}</td></tr>
                    <tr><th>Member</th><td>{{ $borrowing->member->name }}</td></tr>
                    <tr><th>Book</th><td>{{ $borrowing->book->title }}</td></tr>
                    <tr><th>Borrow Date</th><td>{{ $borrowing->borrow_date }}</td></tr>
                    <tr><th>Return Date</th><td>{{ $borrowing->return_date ?? '-' }}</td></tr>
                    <tr><th>Status</th><td>{{ ucfirst($borrowing->status) }}</td></tr>
                </table>
                <a href="{{ route('borrowings.index') }}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
