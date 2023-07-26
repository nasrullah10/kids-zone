<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyQuizOption extends Model
{
    use HasFactory;
    
    public function dailyQuizQuestion()
    {
        return $this->belongsTo(DailyQuizQuestion::class);
    }
    protected $quarded = [];
    public function setDailyQuizOptionAttribute($value){

        $this->attributes['daily_quiz_option'] = json_encode($value);
    }

    protected $casts = [
        'daily_quiz_option' => 'array',
    ];
    public function getDailyQuizOptionAttribute($value)
{
    // dd($value);
    
    return json_decode($value, true);
}
}
