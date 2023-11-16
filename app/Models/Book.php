<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'autor', 'published_at'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
