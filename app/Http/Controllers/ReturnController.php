<?php

namespace App\Http\Controllers;

use App\Models\ReturnBook;
use App\Models\Borrowing;
use App\Models\Book;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function index()
    {
        $returns = ReturnBook::with('borrowing.member', 'borrowing.book')->get();
        return view('returns.index', compact('returns'));
    }

    public function create()
    {
        $borrowings = Borrowing::where('status', 'borrowed')->with('member', 'book')->get();
        return view('returns.create', compact('borrowings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'borrowing_id' => 'required|exists:borrowings,id',
            'return_date'  => 'required|date',
        ]);

        $borrowing = Borrowing::findOrFail($request->borrowing_id);

        // Logika denda (misal: 1000 per hari lewat)
        $returnDate = \Carbon\Carbon::parse($request->return_date);
        $dueDate = \Carbon\Carbon::parse($borrowing->borrow_date)->addDays(7);

        $lateDays = $returnDate->gt($dueDate) ? $returnDate->diffInDays($dueDate) : 0;
        $fine = $lateDays * 1000;


        // Tambah stok kembali
        $borrowing->book->increment('stock');

        // Update borrowing jadi 'returned'
        $borrowing->update([
            'return_date' => $request->return_date,
            'status'      => 'returned',
        ]);

        // Update history juga jadi returned
        \App\Models\History::where('member_id', $borrowing->member_id)
            ->where('book_id', $borrowing->book_id)
            ->where('status', 'borrowed')
            ->latest('borrowed_at')
            ->first()
            ?->update([
                'status'      => 'returned',
                'returned_at' => $request->return_date,
            ]);

        // Simpan return record
        ReturnBook::create([
            'borrowing_id' => $borrowing->id,
            'return_date'  => $request->return_date,
            'fine_amount'  => $fine,
        ]);

        return redirect()->route('returns.index')->with('success', 'Book returned successfully.');
    }

    public function show(string $id)
    {
        $return = ReturnBook::with('borrowing.member', 'borrowing.book')->findOrFail($id);
        return view('returns.show', compact('return'));
    }

    public function edit(string $id) { /* optional - skip dulu */ }
    public function update(Request $request, string $id) { /* optional */ }
    public function destroy(string $id) { /* optional */ }
}
