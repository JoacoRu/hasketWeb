<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'news';
    protected $fillable = ['autor', 'noticia', 'update_at', 'titulo'];
}
