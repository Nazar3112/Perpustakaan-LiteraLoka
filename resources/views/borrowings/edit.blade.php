@extends('perpustakaan.master')

@section('title', 'Edit Borrowing')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Borrowing</h6>
                <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Member</label>
                        <select name="member_id" class="form-control" required>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}" {{ $member->id == $borrowing->member_id ? 'selected' : '' }}>
                                    {{ $member->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Book</label>
                        <select name="book_id" class="form-control" required>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ $book->id == $borrowing->book_id ? 'selected' : '' }}>
                                    {{ $book->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Borrow Date</label>
                        <input type="date" name="borrow_date" class="form-control" value="{{ $borrowing->borrow_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="borrowed" {{ $borrowing->status == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                            <option value="returned" {{ $borrowing->status == 'returned' ? 'selected' : '' }}>Returned</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Borrowing</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
