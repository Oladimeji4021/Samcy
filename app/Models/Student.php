<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'gender',
    'marital_status',
    'dob',
    'state',
    'local_govt',
    'address',
    'nationality',
    'nin',
    'department',
];

   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
