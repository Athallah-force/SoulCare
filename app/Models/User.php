<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'nomor_telepon',
        'tipe_pengguna',
        'is_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ============================
    // RELATION
    // ============================
    
    public function clientProfile()
    {
        return $this->hasOne(ClientProfile::class, 'user_id');
    }

    public function professionalProfile()
    {
        return $this->hasOne(ProfessionalProfile::class, 'user_id');
    }

    public function adminProfile()
    {
        return $this->hasOne(AdminProfile::class, 'user_id');
    }

    // ============================
    // ROLE HELPER
    // ============================

    public function isAdmin()
    {
        return $this->tipe_pengguna === 'Admin';
    }

    public function isClient()
    {
        return $this->tipe_pengguna === 'Client';
    }

    public function isProfessional()
    {
        return $this->tipe_pengguna === 'Professional';
    }

    public function isVerified()
{
    return $this->is_verified === true;
}

}
