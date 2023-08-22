<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $guarded = [];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function topic() 
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }
}
