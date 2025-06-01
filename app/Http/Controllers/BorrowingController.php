<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Member;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('member', 'book')->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::where('stock', '>', 0)->get(); // hanya buku yang tersedia
        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id'   => 'required|exists:members,id',
            'book_id'     => 'required|exists:books,id',
            'borrow_date' => 'required|date',
        ]);

        // kurangi stok buku
        $book = Book::findOrFail($request->book_id);
        if ($book->stock < 1) {
            return redirect()->back()->with('error', 'Book out of stock.');
        }

        $book->decrement('stock');

        $borrowing = Borrowing::create([
            'member_id'   => $request->member_id,
            'book_id'     => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'status'      => 'borrowed',
        ]);

        // Otomatis simpan ke history
        \App\Models\History::create([
            'member_id'   => $borrowing->member_id,
            'book_id'     => $borrowing->book_id,
            'status'      => 'borrowed',
            'borrowed_at' => $borrowing->borrow_date,
        ]);


        return redirect()->route('borrowings.index')->with('success', 'Borrowing recorded.');
    }

    public function show(string $id)
    {
        $borrowing = Borrowing::with('member', 'book')->findOrFail($id);
        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(string $id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $members = Member::all();
        $books = Book::all();
        return view('borrowings.edit', compact('borrowing', 'members', 'books'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'member_id'   => 'required|exists:members,id',
            'book_id'     => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'status'      => 'required|in:borrowed,returned',
        ]);

        $borrowing = Borrowing::findOrFail($id);
        $borrowing->update($request->all());

        return redirect()->route('borrowings.index')->with('success', 'Borrowing updated.');
    }

    public function destroy(string $id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Borrowing deleted.');
    }
}
