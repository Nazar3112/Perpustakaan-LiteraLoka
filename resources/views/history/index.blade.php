@extends('perpustakaan.master')

@section('title', 'Borrowing History')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">History Table</h6>

                <div class="table-responsive">
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Member</th>
                                <th>Book</th>
                                <th>Status</th>
                                <th>Borrowed At</th>
                                <th>Returned At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($histories as $history)
                                <tr>
                                    <td>{{ $history->id }}</td>
                                    <td>{{ $history->member->name }}</td>
                                    <td>{{ $history->book->title }}</td>
                                    <td>
                                        <span class="badge bg-{{ $history->status == 'borrowed' ? 'warning' : 'success' }}">
                                            {{ ucfirst($history->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $history->borrowed_at }}</td>
                                    <td>{{ $history->returned_at ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No history found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
