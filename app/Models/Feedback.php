<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Specify the table name if it's not the default 'feedbacks'
    protected $table = 'feedback_hist';

    protected $fillable = [
        'user_id',
        'rating',
        'subject',
        'feedback',
    ];
}
