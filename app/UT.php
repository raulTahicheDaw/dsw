<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actividad;
use App\Programacion;

class UT extends Model
{
    protected $table = 'ut';

    public function actividades()
    {
        return $this->hasMany(Actividad::class, 'ut_id', 'id')->orderBy('pos');
    }

    public function programacion()
    {
        return $this->belongsTo(Programacion::class, 'programacion_id', 'id');
    }
}
