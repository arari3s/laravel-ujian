<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'courses_id', 'question_banks_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id', 'id');
    }

    public function questionbank()
    {
        return $this->belongsTo(QuestionBank::class, 'question_banks_id', 'id');
    }
}
