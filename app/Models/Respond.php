<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{
    use HasFactory;
    protected $table = 'responds';
    public $fillable = [
        'employer_id',
        'vacancy_id',
        'employee_id',
        'resume_id'
    ];
}
