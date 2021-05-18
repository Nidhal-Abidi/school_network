<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table='classe';
    protected $primaryKey=['IDFILIERE','NIVEAU','NOMCLASSE'];
    public $incrementing =false ;
    protected $keyType='string';
    public $timestamps=false;
}
