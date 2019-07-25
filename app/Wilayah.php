<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    //
    protected $table = 'wilayah';
    protected $fillable=[
        'nama',
        'ketua',
        'created_at',
        'updated_at'
    ];

    public function lingkungan()
    {
    	return $this->hasMany('App\Lingkungan');
    }

    public function pengelola()
    {
    	return $this->hasMany('App\User');
    }

    public function usulan()
    {
    	return $this->hasMany('App\Usulan');
    }
}
