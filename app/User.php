<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;
use App\Profile;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $date=['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
