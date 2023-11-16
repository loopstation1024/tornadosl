<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'number_chapter', 'title', 'resumen'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
