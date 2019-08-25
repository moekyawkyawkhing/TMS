<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteProfile extends Model
{
    protected $fillable=[
        'name',
        'email',
        'phone',
        'address',
        'about_us'
    ];
}
