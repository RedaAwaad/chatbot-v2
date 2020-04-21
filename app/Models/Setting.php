<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=[
      'website_name','dashboard_url','logo','description','email','big_circle','small_circle','start_chat','user_id','text2','text3',
        'icon','tw','ln','fb','phone','picture','faq'
    ];
    public function keywords()
    {
        return $this->morphMany('App\Models\Keyword', 'keyword');
    }
}
