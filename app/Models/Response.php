<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $table = 'responses';
    protected $guarded = [];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function Topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(Response::class, 'parent_id', 'id');
    }
    public function children()
    {
        return $this->hasMany(Response::class, 'parent_id', 'id');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'table_id', 'id')->where('table_name', 'responses');
    }
}
