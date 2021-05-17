<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActualiteNiveau extends Model
{
    use HasFactory;
    protected $table='actualiteniveau';
    protected $primaryKey='IDACT';
    public $incrementing =false ;
}
