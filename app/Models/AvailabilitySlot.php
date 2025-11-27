<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailabilitySlot extends Model
{
    use HasFactory;

    protected $table = 'availability_slot';
    protected $primaryKey = 'slot_id';

    protected $fillable = [
        'professional_id', 'hari', 'jam_mulai', 'jam_akhir', 'tersedia'
    ];

    public function professional()
    {
        return $this->belongsTo(ProfessionalProfile::class, 'professional_id');
    }
}