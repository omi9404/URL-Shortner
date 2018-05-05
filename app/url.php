<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'url_data';
    protected $fillable = [
        'url', 'shortenurl', 'hits',
    ];
}
