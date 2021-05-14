<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $table='compte';
    protected $primaryKey='LOGIN';
    public $incrementing =false ;
    protected $keyType='string';
    public $timestamps=false;
    protected $fillable = ['LOGIN','LOGINELEVE','IDFILIERE','NIVEAU','NOMCLASSE','NOM','PRENOM','NUMTEL','EMAIL','GENDER','PWD','DATENAIS','ACTIVE_STATUS','TYPE_COMPTE','POSTE','SPECIALITE'];
}
