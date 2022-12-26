<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeLang extends Model
{
    use HasFactory;
    protected $table = "resume_langs";
    public $fillable = [
        'user_id',
        'resume_id',
        'lang'
    ];
}
