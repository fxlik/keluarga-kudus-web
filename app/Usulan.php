<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    protected $table = 'usulan';
    protected $fillable=[
        'organisasi_id',
        'seksi_id',
        'wilayah_id',
        'user_id',
        'perihal',
        'detail',
        'file',
        'status',
        'tanggapan',
        'created_at',
        'updated_at'
    ];

    public function wilayah()
    {
        return $this->belongsTo('App\Wilayah');
    }

    public function organisasi()
    {
        return $this->belongsTo('App\Organisasi');
    }

    public function seksi()
    {
        return $this->belongsTo('App\Seksi');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
