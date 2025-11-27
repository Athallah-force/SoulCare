<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'session';
    protected $primaryKey = 'session_id';

    protected $fillable = [
        'client_id', 'professional_id', 'slot_id',
        'waktu_mulai', 'waktu_akhir', 'jenis_sesi',
        'status_sesi', 'link_sesi'
    ];

    public function client()
    {
        return $this->belongsTo(ClientProfile::class, 'client_id');
    }

    public function professional()
    {
        return $this->belongsTo(ProfessionalProfile::class, 'professional_id');
    }

    public function slot()
    {
        return $this->belongsTo(AvailabilitySlot::class, 'slot_id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'session_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'session_id');
    }
}
