<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Positon extends Model
{
    use HasFactory;
    protected $table = "positons"; // it should be positions actually))
    public $fillable = [
        'position'
    ];
}
