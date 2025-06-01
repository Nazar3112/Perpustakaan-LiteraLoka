<?php

namespace App\Http\Controllers;

use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::with('member', 'book')->orderByDesc('borrowed_at')->get();
        return view('history.index', compact('histories'));
    }
}
