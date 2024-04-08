<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaction_id';
    protected $guarded = 'transaction_id';
    protected $table = 'transactions';
    protected $fillable = ['book_id', 'users_id', 'created', 'deadline', 'return_date', 'late', 'charge', 'status'];
}
