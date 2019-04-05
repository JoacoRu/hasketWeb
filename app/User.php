<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'dbo.MEMB_INFO';
    protected $primaryKey = 'memb_guid';
    protected $rememberTokenName = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'memb___id', 'memb__pwd', 'mail_addr', 'SecretAnswer', 'SecretQuestion', 'Country', 'memb_name', 'sno__numb', 'mail_chek', 'bloc_code', 'ctl1_code', 'confirmed', 'Gender', 'Vip', 'InicioVIP', 'FinVIP', 'VipDate', 'VipINF', 'admincp', 'credits', 'credits2', 'm_Grand_Resets', 'mvc_vip_date', 'msponsor_limit', 'smtp_block', 'scrable_wrong', 'scrable_level'
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
