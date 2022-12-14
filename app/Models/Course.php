<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'users_id', 'title', 'name', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class, 'courses_id', 'id');
    }

    public function quizHeader()
    {
        return $this->hasMany(QuizHeader::class);
    }
}
