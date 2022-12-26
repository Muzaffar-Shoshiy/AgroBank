<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumePortfolio extends Model
{
    use HasFactory;
    protected $table = "resume_portfolios";
    public $fillable = [
        'user_id',
        'resume_id',
        'portfolio'
    ];
}
