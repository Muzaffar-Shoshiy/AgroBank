<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    use HasFactory;
    protected $table = 'viewers';
    public $fillable = [
        'employer_id',
        'vacancy_id',
        'employee_id'
    ];
}
