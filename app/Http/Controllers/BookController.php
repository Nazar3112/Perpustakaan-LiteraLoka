<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'author'    => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year'      => 'required|digits:4|integer|min:1000|max:' . (date('Y') + 1),
            'category'  => 'nullable|string|max:255',
            'isbn'      => 'nullable|string|max:255',
            'stock'     => 'required|integer|min:0',
            'cover'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file cover jika ada
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $validated['cover'] = $coverPath;
        }

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'author'    => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year'      => 'required|digits:4|integer|min:1000|max:' . (date('Y') + 1),
            'category'  => 'nullable|string|max:255',
            'isbn'      => 'nullable|string|max:255',
            'stock'     => 'required|integer|min:0',
            'cover'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $book = Book::findOrFail($id);

        // Jika ada file cover baru
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }

            $coverPath = $request->file('cover')->store('covers', 'public');
            $validated['cover'] = $coverPath;
        }

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        // Hapus file cover dari storage jika ada
        if ($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
