<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnBook extends Model
{
    use HasFactory;

    protected $table = 'returns'; // karena nama tabel di database adalah "returns"

    protected $fillable = [
        'borrowing_id',
        'return_date',
        'fine_amount',
    ];

    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }
}
