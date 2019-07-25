<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lingkungan extends Model
{
    protected $table = 'lingkungan';
    protected $fillable=[
        'wilayah_id',
        'nama',
        'created_at',
        'updated_at'
    ];

    public function wilayah()
    {
        return $this->belongsTo('App\Wilayah');
    }
}
