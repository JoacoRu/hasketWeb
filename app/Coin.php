<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $table = 'dbo.T_InGameShop_Point';
    public $timestamps = false;
    protected $fillable = ['AccountID', 'WCoinP', 'WCoinC', 'GoblinPoint'];
}
