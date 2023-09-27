<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'topics';
    protected $guarded = [];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'topic_id', 'id');
    }
    public function response()
    {
        return $this->hasMany(Response::class, 'topic_id', 'id');
    }
    public function report()
    {
        return $this->hasMany(Report::class, 'table_id', 'id')->where('table_name', 'topics');
    }

}

