<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function response()
    {
        return $this->belongsTo(Response::class, 'table_id', 'id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'table_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'table_id', 'id');
    }
}
