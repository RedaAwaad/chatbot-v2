<?php

namespace App;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['error_text','chat_id','question_id','type','ip','chat_type'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
