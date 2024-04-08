<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $table = 'publishers';
    protected $primaryKey = 'publisher_id';
    protected $guarded = 'publisher_id';
    protected $fillable = ['name_publisher'];


}
