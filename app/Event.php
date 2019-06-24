<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $fillable=[
        'judul',
        'slug',
        'deskripsi',
        'SEOtitle',
        'SEOdesc',
        'foto',
        'tanggal',
        'tempat',
        'status',
        'created_at',
        'updated_at'
    ];
}
