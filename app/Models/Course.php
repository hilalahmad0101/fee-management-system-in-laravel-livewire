<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'course_name',
        'level',
        'content'
    ];

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function student_fees()
    {
        return $this->hasMany(StudentFee::class);
    }
}
