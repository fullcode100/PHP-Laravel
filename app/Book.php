<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'author',
        'genre',
        'year',
        'title'
    ];

    public $timestamps=false;

    public function owner(){
        return $this->belongsTo('App\User','id');
    }
}
