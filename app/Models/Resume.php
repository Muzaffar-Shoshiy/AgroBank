<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $table = "resumes";
    public $fillable = [
        'user_id',
        'name',
        'surname',
        'phone',
        'city',
        'd_birth',
        'gender',
        'country',
        'experience',
        'salary'
    ];
}
