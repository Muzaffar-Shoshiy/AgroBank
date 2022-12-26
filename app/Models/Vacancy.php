<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $table = 'vacancies';
    public $fillable = [
        'user_id',
        'name',
        'position',
        'work_mode',
        'city',
        'experience',
        'salary'
    ];
}
