<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = 'id';
    protected $table = 'charges';
    protected $fillable = ['charge'];
}
