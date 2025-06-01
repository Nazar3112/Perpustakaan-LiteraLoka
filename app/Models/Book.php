<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'category',
        'isbn',
        'stock',
        'cover',
    ];

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
