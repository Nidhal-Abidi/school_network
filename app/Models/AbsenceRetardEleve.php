<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenceRetardEleve extends Model
{
    use HasFactory;
    protected $table='absenceretardeleve';
    protected $primaryKey=['LOGIN','IDFILIERE','NIVEAU','NOMCLASSE','DATESEM','NUMJOUR','HEUREDEB'];
    public $incrementing =false ;
    protected $keyType='string';
    public $timestamps=false;
}
