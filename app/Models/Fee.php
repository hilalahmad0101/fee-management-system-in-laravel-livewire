<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $table = 'fees';
    protected $fillable = [
        'amount',
        'fee_type',
        'total_amount',
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
