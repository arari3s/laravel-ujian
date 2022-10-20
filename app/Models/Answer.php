<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'question_banks_id', 'explanation'
    ];
    // relationships one to many question bank to answer
    public function qbank()
    {
        return $this->belongsTo(QuestionBank::class, 'question_banks_id', 'id');
    }
}
