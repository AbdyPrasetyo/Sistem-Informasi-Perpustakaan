<?php

namespace App\Models;
use App\Models\Donaterelation;
use App\Models\Donatur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Itembook extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'donationbooks';
    protected $fillable = ['title','amount'];

    public function anggota()
    {
        return $this->belongsToMany(Donatur::class, 'donaturrelations', 'student_id', 'donation_id');
        // return $this->belongsToMany(Donatur::class);
    }




}
