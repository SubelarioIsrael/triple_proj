<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodTrackQuestions extends Model
{
    use HasFactory;

    protected $table = 'mt_questions'; // Explicitly set the table name
    public $timestamps = false;
}
