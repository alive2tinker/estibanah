<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    protected $fillable = [
        'operation',
        'operator',
        'value',
        'foreign_question',
        'question_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function foreignQuestion()
    {
        return $this->belongsTo(Question::class, 'foreign_question');
    }
}
