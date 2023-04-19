<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Releve_note extends Model
{
    use HasFactory;
    protected $fillable=['niveau', 'semestre'];
   
}
