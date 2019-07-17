<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $fillable=[
        'judul',
        'slug',
        'deskripsi',
        'SEOtitle',
        'SEOdesc',
        'foto',
        'kategori',
        'author',
        'status',
        'created_at',
        'updated_at'
    ];

    public function formattedDate()
    {
        return $this->created_at->format('M d Y');
    }

    public function user()
    {
        return $this->belongsTo('App\User','author');
    }
}
