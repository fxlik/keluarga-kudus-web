<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan';
    protected $fillable=[
        'nama',
        'email',
        'hp',
        'pesan',
        'created_at',
        'updated_at'
    ];
}
