<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodHistory extends Model
{
    use HasFactory;

    // Define the table name explicitly (optional if naming conventions are followed)
    protected $table = 'mood_history';

    // Specify the fillable fields
    protected $fillable = [
        'user_id',
        'question_id',
        'score',
    ];

    // Cast attributes if needed (e.g., timestamps or special formats)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships (assuming you have User and Question models)
    
    // Link to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Link to a Question model (if applicable)
    public function question()
    {
        return $this->belongsTo(MoodTrackQuestions::class, 'question_id');
    }
}
