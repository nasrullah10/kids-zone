<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttemptDailyQuizQuestion extends Model
{
    use HasFactory;

    public function dailyQuestion()
    {
        return $this->belongsTo(DailyQuizQuestion::class);
    }
}
