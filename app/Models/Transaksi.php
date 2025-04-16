<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'id_user',
        'id_layanan',
        'total_bayar',
        'tanggal_transaksi',
        'metode_pembayaran',
        'expired_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }

    protected static function boot()
    {
        parent::boot();

        // Check for expired transactions when a transaction is created or updated
        static::created(function ($transaksi) {
            $transaksi->checkExpiredStatus();
        });

        static::updated(function ($transaksi) {
            $transaksi->checkExpiredStatus();
        });
    }

    public function checkExpiredStatus()
    {
        if ($this->expired_date <= Carbon::today()) {
            $this->update(['status' => 'expired']);
        }
    }
}