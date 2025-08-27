<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseProgram extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'course_id',
        'program_name',
        'description',
        'amount'
    ];

    
    protected $casts = [
        'amount' => 'decimal:2'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
