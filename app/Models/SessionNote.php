<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionNote extends Model
{
    protected $table = 'SessionNote';
    protected $primaryKey = 'note_id';

    protected $fillable = [
        'session_id', 'professional_id', 'isi_catatan'
    ];

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function professional()
    {
        return $this->belongsTo(ProfessionalProfile::class, 'professional_id');
    }
}
