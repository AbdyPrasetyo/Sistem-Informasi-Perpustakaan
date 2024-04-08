<?php

namespace App\Models;

use App\Models\Donaterelation;
use App\Models\Itembook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donatur extends Model
{
    use HasFactory;

    protected $table = 'datastudents';
    protected $primaryKey = 'id';
    protected $fillable = [ 'nis', 'name', 'street', 'contact'];

    public function item()
    {
    	return $this->belongsToMany(Itembook::class, 'donaturrelations', 'student_id', 'donation_id');
    	// return $this->belongsToMany(Itembook::class);
    }






}
