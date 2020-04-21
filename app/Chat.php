<?php

namespace App;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $guarded = ['id'];

    public function questions()
    {
        return $this->hasMany(Question::class,'chat_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
