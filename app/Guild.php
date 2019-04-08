<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $table = 'Guild';
    protected $primaryKey = 'G_Name';
    public $timestamps = false;
}
