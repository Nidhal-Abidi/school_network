<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;
    protected $table='actualite';
    protected $primaryKey='IDACT';
    public $incrementing =false ;

    /**
    * The roles that belong to the Actualite
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function roles(): BelongsToMany
        {
            return $this->belongsToMany('Niveau', 'ActualiteNiveau', 'IDACT', 'NIVEAU');
        }
    
}

