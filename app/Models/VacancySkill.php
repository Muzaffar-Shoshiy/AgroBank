<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancySkill extends Model
{
    use HasFactory;
    protected $table = 'vacancy_skills';
    public $fillable = [
        'user_id',
        'vacancy_id',
        'skill'
    ];
}
