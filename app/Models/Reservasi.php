<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table='tb_reservasi';

    protected $fillable = [
        'id_user',
        'id_meja',
        'tanggal',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja', 'id');
    }
}
