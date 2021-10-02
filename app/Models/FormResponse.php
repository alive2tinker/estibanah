<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'user_id'
    ];

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
