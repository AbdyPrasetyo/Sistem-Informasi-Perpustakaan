<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestions extends Model
{
    use HasFactory;
    protected $table = "suggestions";
    protected $primaryKey = 'id';
    protected $fillable =[
    'name',
    'email',
    'subject',
    'message',
    ];

}
