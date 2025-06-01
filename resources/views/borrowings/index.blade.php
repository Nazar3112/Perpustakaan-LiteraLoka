@extends('perpustakaan.master')

@section('title', 'Borrowings')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0">Borrowings Table</h6>
                    <a href="{{ route('borrowings.create') }}" class="btn btn-primary">+ New Borrowing</a>
                </div>

                <div class="table-responsive">
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Member</th>
                                <th>Book</th>
                                <th>Borrow Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($borrowings as $borrowing)
                                <tr>
                                    <td>{{ $borrowing->id }}</td>
                                    <td>{{ $borrowing->member->name }}</td>
                                    <td>{{ $borrowing->book->title }}</td>
                                    <td>{{ $borrowing->borrow_date }}</td>
                                    <td>{{ $borrowing->return_date ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $borrowing->status == 'borrowed' ? 'warning' : 'success' }}">
                                            {{ ucfirst($borrowing->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('borrowings.show', $borrowing->id) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Delete this borrowing?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No borrowings yet.</td>
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
