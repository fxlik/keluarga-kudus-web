<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    protected $table = 'seksi';
    protected $fillable=[
        'organisasi_id',
        'nama',
        'pj',
        'created_at',
        'updated_at'
    ];

    public function organisasi()
    {
        return $this->belongsTo('App\Organisasi');
    }

    public function usulan()
    {
    	return $this->hasMany('App\Usulan');
    }
}
