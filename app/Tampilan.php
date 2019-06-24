<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tampilan extends Model
{
    protected $table = 'tampilans';
    protected $fillable=[
        'favicon',
        'logo1',
        'logo2',
        'logo3',
        'site_title',
        'site_keyword',
        'site_desc',
        'alamat',
        'no_hp',
        'email',
        'email',
        'facebook',
        'twitter',
        'instagram',
        'copyright',
        'about',
        'created_at',
        'updated_at',
    ];
}
