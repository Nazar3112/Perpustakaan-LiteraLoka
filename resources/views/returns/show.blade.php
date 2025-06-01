@extends('perpustakaan.master')

@section('title', 'Return Details')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Return Details</h6>
                <table class="table text-white">
                    <tr><th>ID</th><td>{{ $return->id }}</td></tr>
                    <tr><th>Member</th><td>{{ $return->borrowing->member->name }}</td></tr>
                    <tr><th>Book</th><td>{{ $return->borrowing->book->title }}</td></tr>
                    <tr><th>Borrow Date</th><td>{{ $return->borrowing->borrow_date }}</td></tr>
                    <tr><th>Return Date</th><td>{{ $return->return_date }}</td></tr>
                    <tr><th>Fine</th><td>Rp {{ number_format($return->fine_amount, 0, ',', '.') }}</td></tr>
                </table>
                <a href="{{ route('returns.index') }}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
