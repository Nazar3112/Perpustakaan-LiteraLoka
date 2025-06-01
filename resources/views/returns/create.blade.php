@extends('perpustakaan.master')

@section('title', 'Process Return')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Return Book</h6>
                <form action="{{ route('returns.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Borrowing</label>
                        <select name="borrowing_id" class="form-control" required>
                            <option value="">-- Select Borrowing --</option>
                            @foreach($borrowings as $borrow)
                                <option value="{{ $borrow->id }}">
                                    {{ $borrow->member->name }} - {{ $borrow->book->title }} (Borrowed: {{ $borrow->borrow_date }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Return Date</label>
                        <input type="date" name="return_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Process Return</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
