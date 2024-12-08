<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'title',
        'description',
        'added_by_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by_user_id');
    }
    protected $casts = [
        'start_time' => 'datetime',
    ];
}