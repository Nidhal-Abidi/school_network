<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $table='filiere';
    protected $primaryKey='IDFILIERE';
    public $incrementing =false ;
    protected $keyType='string';
    public $timestamps=false;
}
