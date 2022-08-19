<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'email',
        'address',
        'contact'
    ];


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
