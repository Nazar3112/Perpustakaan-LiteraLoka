<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBuku = Book::count();
        $jumlahAnggota = Member::count();
        $jumlahPeminjaman = Borrowing::where('status', 'borrowed')->count();
        $jumlahPengembalian = Borrowing::where('status', 'returned')->count();

        $latestBorrowings = Borrowing::with('member', 'book')
            ->orderByDesc('borrow_date')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'jumlahBuku',
            'jumlahAnggota',
            'jumlahPeminjaman',
            'jumlahPengembalian',
            'latestBorrowings'
        ));
    }
}
