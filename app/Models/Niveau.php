<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    protected $table='niveau';
    protected $primaryKey=['IDFILIERE','NIVEAU'];
    public $incrementing =false ;
    protected $keyType='string';
    public $timestamps=false;
}
