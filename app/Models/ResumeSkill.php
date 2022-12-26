<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeSkill extends Model
{
    use HasFactory;
    protected $table = "resume_skills";
    public $fillable = [
        'user_id',
        'resume_id',
        'skill'
    ];
}
