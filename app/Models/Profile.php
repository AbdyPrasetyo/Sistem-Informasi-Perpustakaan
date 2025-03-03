<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = "profiles";
    protected $primaryKey = 'id';
    protected $fillable =[
    'major',
    'street',
    'phone_number',
    'photo_profile',
    'users_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'users_id');

    }
}
