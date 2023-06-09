<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='tb_product';

    protected $fillable = [
        'nama',
        'image',
        'deskripsi',
        'harga',
        'jumlah_terjual',
        'rating',
        'id_kategori'
    ];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
