<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $primaryKey = 'categorie_id';
    protected $guarded = 'categorie_id';
    protected $table = 'categories';
    protected $fillable = ['categori_name'];

}
