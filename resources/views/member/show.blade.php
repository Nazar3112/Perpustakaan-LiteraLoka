@extends('perpustakaan.master')

@section('title', 'Member Details')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Member Details</h6>
                <table class="table text-white">
                    <tr><th>ID</th><td>{{ $member->id }}</td></tr>
                    <tr><th>Name</th><td>{{ $member->name }}</td></tr>
                    <tr><th>Email</th><td>{{ $member->email }}</td></tr>
                    <tr><th>Phone</th><td>{{ $member->phone }}</td></tr>
                    <tr><th>Address</th><td>{{ $member->address }}</td></tr>
                    <tr><th>Status</th><td>Active</td></tr> {{-- Ganti jika nanti ada field status --}}
                </table>
                <a href="{{ route('member.index') }}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
