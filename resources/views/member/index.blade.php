@extends('perpustakaan.master')

@section('title', 'Members')

@section('content')
<!-- Member Content Start-->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0">Member Table</h6>
                    <a href="{{ route('member.create') }}" class="btn btn-primary">+ Add Member</a>
                </div>

                <div class="table-responsive">
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($members as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email ?? '-' }}</td>
                                    <td>{{ $member->phone ?? '-' }}</td>
                                    <td>{{ $member->address ?? '-' }}</td>
                                    <td>{{ $member->status ?? 'Active' }}</td> {{-- Default status --}}
                                    <td>
                                        <a href="{{ route('member.show', $member->id) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('member.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('member.destroy', $member->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No members found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Member Content End-->
@endsection
