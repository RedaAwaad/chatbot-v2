<?php

namespace App\Models;

use App\Chat;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'first_name', 'last_name', 'full_name', 'age', 'sex', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function slug()

    {
        //dd(str_slug($this->first_name, $this->last_name));
        return Str::slug($this->first_name.$this->last_name,'');
    }

    public function chats(){
        return $this->hasMany(Chat::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function setting(){
//        dd($this->belongsTo(Setting::class));
        return $this->hasOne(Setting::class);
    }
}
