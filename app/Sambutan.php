<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    protected $table = 'sambutan';
    protected $fillable=[
        'slug',
        'sambutan',
        'foto'
    ];
    public $timestamps = false;
}
