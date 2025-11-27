<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'Review';
    protected $primaryKey = 'review_id';

    protected $fillable = [
        'session_id', 'client_id', 'rating', 'komentar_ulasan'
    ];

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function client()
    {
        return $this->belongsTo(ClientProfile::class, 'client_id');
    }
}
