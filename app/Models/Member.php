<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // Agar bisa mass assign kolom-kolom ini
    protected $fillable = ['name', 'email', 'phone', 'address', 'status'];

    // Relasi ke History (jika ada tabel histories dan model History)
    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
