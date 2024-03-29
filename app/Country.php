<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $guarded =[];
    protected $fillable = ['name', 'code', 'country_url', 'image'];
}
