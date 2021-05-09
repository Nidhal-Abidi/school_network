<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $table='compte';
    protected $primaryKey='login';
    public $incrementing =false ;
    protected $keyType='string';
    public $timestamps=false;
}
