<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientProfile extends Model
{
    use HasFactory;

    protected $table = 'client_profile'; // pastikan sesuai dengan nama tabel

    protected $primaryKey = 'client_profile_id';

    protected $fillable = [
        'user_id',
        'tanggal_lahir',
        'alamat',
        'catatan_kesehatan_awal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'client_id');
    }
}
