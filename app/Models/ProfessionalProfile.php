<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalProfile extends Model
{
    use HasFactory;

    protected $table = 'professional_profile';
    protected $primaryKey = 'professional_profile_id';

    protected $fillable = [
        'user_id', 'spesialisasi_id', 'lisensi_praktik',
        'tarif_sesi', 'deskripsi_profil', 'status_aktif'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'spesialisasi_id');
    }

    public function availabilitySlots()
    {
        return $this->hasMany(AvailabilitySlot::class, 'professional_id');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'professional_id');
    }
}
