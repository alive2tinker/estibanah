<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'text',
        'description',
        'required'
    ];

    protected $appends = [
        'show'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function conditions()
    {
        return $this->hasMany(Condition::class);
    }

    public function getShowAttribute()
    {
        $conditionalStatement = "";

        if($this->conditions->count() === 0)
            return "true";
        
        foreach($this->conditions as $index => $condition)
        {
            switch($condition->operation)
            {
                case "notEmpty":
                    $newCondition = $index === 0 ? "this.isNotEmpty('" . $condition->foreignQuestion->id . "')"
                    : " " . $condition->operator . " this.isNotEmpty('" . $condition->foreignQuestion->id . "')";
                    $conditionalStatement = $conditionalStatement . $newCondition;
                    break;
                case "equals":
                    $newCondition = $index === 0 ? "this.equals('" . $condition->foreignQuestion->id . "', '$condition->value')"
                    : " " . $condition->operator . " this.equals('" . $condition->foreignQuestion->id . "', '$condition->value')";
                    $conditionalStatement = $conditionalStatement . $newCondition;
                    break;
                case "notEquals":
                    $newCondition = $index === 0 ? "this.notEquals('" . $condition->foreignQuestion->id . "', '$condition->value')"
                    : " " . $condition->operator . " this.notEquals('" . $condition->foreignQuestion->id . "', '$condition->value')";
                    $conditionalStatement = $conditionalStatement . $newCondition;
                    break;
            }
        }

        return $conditionalStatement;
    }
}
