<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'question_banks_id', 'answer', 'is_checked'
    ];

    // relationships one to many question bank to answer
    public function questionbank()
    {
        return $this->belongsTo(QuestionBank::class, 'question_banks_id', 'id');
    }
}
