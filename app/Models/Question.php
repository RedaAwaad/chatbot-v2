<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Question extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $fillable = [
        'text','sort','user_id','text_ar','chat_id','next_question_id','type_id', 'num_answer', 'answer_type', 'is_entry_point'
    ];

    public function answers()
    {
        return $this->belongsToMany(Answer::class,'questions_answers');
        //return DB::table('questions_answers')->where('question_id', $this->id)->get();
    }
}
