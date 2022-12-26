<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumePosition extends Model
{
    use HasFactory;
    protected $table = "resume_positions";
    public $fillable = [
        'user_id',
        'resume_id',
        'position'
    ];
}
