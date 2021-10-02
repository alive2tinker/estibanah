<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_response_id',
        'value',
        'question_id'
    ];

    protected $casts = [
        'value' => 'array'
    ];
}
