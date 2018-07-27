<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['content', 'user_id'];
    
    public function user() {
        //タスク側からユーザーに伸びる枝
        return $this->belongsTo(User::class);
    }
}
