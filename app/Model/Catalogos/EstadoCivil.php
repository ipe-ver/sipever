<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'cat_estado_civil';    
    protected $primaryKey = 'id';    
    protected $fillable = ['nombre'];
}

