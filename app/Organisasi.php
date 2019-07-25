<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    //
    protected $table = 'organisasi';
    protected $fillable=[
        'nama',
        'pj',
        'created_at',
        'updated_at'
    ];

    public function Seksi()
    {
    	return $this->hasMany('App\Seksi');
    }

    public function usulan()
    {
    	return $this->hasMany('App\Usulan');
    }

}
