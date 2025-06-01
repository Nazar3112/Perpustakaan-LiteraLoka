@extends('perpustakaan.master')

@section('title', 'Add Borrowing')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add New Borrowing</h6>
                <form action="{{ route('borrowings.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Member</label>
                        <select name="member_id" class="form-control" required>
                            <option value="">-- Select Member --</option>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Book</label>
                        <select name="book_id" class="form-control" required>
                            <option value="">-- Select Book --</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }} (stock: {{ $book->stock }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Borrow Date</label>
                        <input type="date" name="borrow_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Borrowing</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
