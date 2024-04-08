<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rak';
    protected $guarded = 'id_rak';
    protected $table = 'raks';
    protected $fillable = ['name_rak'];


}
