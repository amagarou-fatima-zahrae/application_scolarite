<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convention_stage extends Model
{
    use HasFactory;
    protected $fillable =['nom_entreprise', 'encadrant_entreprise', 'encadrant_ecole', 'directeur', 'sujet', 'adresse_entreprise', 'tel_entreprise', 'date_debut', 'date_fin', 'email_entreprise', 'accord', 'assurance','logo_company', 'assistant_pedagogique'];
}
