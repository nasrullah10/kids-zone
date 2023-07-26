<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyQuizQuestion extends Model
{
    use HasFactory;
    protected $fillable =[
        'status'
    ];
    public function dailyQuizOptions()
    {
        return $this->hasMany(DailyQuizOption::class);
    }
    
}
