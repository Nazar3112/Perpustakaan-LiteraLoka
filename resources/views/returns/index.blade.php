@extends('perpustakaan.master')

@section('title', 'Returns')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0">Returns Table</h6>
                    <a href="{{ route('returns.create') }}" class="btn btn-primary">+ Process Return</a>
                </div>

                <div class="table-responsive">
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Member</th>
                                <th>Book</th>
                                <th>Borrowed At</th>
                                <th>Returned At</th>
                                <th>Fine</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($returns as $retur)
                                <tr>
                                    <td>{{ $retur->id }}</td>
                                    <td>{{ $retur->borrowing->member->name }}</td>
                                    <td>{{ $retur->borrowing->book->title }}</td>
                                    <td>{{ $retur->borrowing->borrow_date }}</td>
                                    <td>{{ $retur->return_date }}</td>
                                    <td>Rp {{ number_format($retur->fine_amount, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('returns.show', $retur->id) }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No returns found.</td>
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
