<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $fillable=[
        'caption',
        'foto',
        'created_at',
        'updated_at'
    ];
}
