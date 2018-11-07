<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\UT;
use App\Programacion;

class Actividad extends Model
{
    use SoftDeletes;

    protected $table = 'p_actividades';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function ut()
    {
        return $this->belongsTo(UT::class);
    }

}
