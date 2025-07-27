<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

    protected $fillable = ['name', 'description'];
    public function Books()
    {
        return $this->hasMany(Book::class, 'genre_id');
    }
}
