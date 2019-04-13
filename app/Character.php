<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'dbo.Character';
    public $timestamps = false;
    protected $fillable = ['cLevel', 'LevelUpPoint', 'Experience', 'Strength', 'Dexterity', 'Vitality', 'Energy', 'Leadership', 'Money', 'PkCount', 'PkLevel', 'PkTime', 'RESETS'];
}
