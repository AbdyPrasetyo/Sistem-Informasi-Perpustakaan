<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donaterelation extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'donaturrelations';
    protected $fillable = ['student_id', 'donation_id'];



}
