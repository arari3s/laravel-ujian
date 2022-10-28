<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionBank extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'users_id', 'question'
    ];

    // relationships one to many question bank to answer
    public function answer()
    {
        return $this->hasMany(Answer::class, 'question_banks_id');
    }
}
