<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    use HasFactory;
    protected $table='tb_contact';

    protected $fillable = ['nama', 'email', 'subject', 'deskripsi'];
}
