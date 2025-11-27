<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'Transaction';
    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'session_id',
        'jumlah_pembayaran',
        'status_pembayaran',
        'metode_pembayaran',
        'tanggal_transaksi'
    ];

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }
}
