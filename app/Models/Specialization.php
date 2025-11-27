<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $table = 'specialization';
    protected $primaryKey = 'specialization_id';

    protected $fillable = ['nama_spesialisasi', 'deskripsi'];

    public function professionals()
    {
        return $this->hasMany(ProfessionalProfile::class, 'spesialisasi_id');
    }
}
