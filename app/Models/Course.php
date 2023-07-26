<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','description','package_type','coure_price'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_students', 'course_id', 'student_id');
    }
}
