<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $table = 'tb_contact';
    public $fillable = ['nama', 'email', 'subject', 'deskripsi'];
    public $timestamps = true;
}
