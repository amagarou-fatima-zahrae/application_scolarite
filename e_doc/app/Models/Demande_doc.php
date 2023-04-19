<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande_doc extends Model
{
    use HasFactory;
    protected $fillable=['id_demande', 'id_etudiant', 'type_demande', 'status', 'is_archive', 'erreur', 'date_demande', 'annee_univ'];
   
}
