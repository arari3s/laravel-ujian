<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizHeader extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'qustions_id', 'id');
    }
}
