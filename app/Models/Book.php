<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $primaryKey ='book_id';
    protected $table = 'books';
    protected $fillable = ['book_code','isbn','title','description','book_location','book_category','author','publisher','year','amount','image'];
    protected $rules = [
        'book_code' => 'required|book_code|unique:books',
        'isbn' => 'required|isbn|unique:books',

    ];


}

