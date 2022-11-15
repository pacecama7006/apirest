<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'isbn',
        'publication_year',
        'book_status_id',
    ];

    //Relaciones
    public function book_statis()
    {
        # code...
        return $this->belongsTo(BookStatus::class);
    }

    public function authors()
    {
        # code...
        return $this->belongsToMany(Author::class);
    }
}
