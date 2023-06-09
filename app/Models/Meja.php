<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table='tb_meja';

    protected $fillable = [
        'no_meja',
    ];

    public function reservasi()
    {
        return $this->hasOne(Reservasi::class);
    }
}
