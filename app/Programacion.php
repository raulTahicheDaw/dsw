<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UT;
use App\Grupo;
use Illuminate\Support\Facades\DB;

class Programacion extends Model
{
    protected $table="programaciones";

    public function uts()
    {
        return $this->hasMany(UT::class)->orderBy('pos');
    }

    public function getCicloIdAttribute()
    {
        $grupoId = $this->attributes['grupo_id'];

        return Grupo::find($grupoId)->ciclo_id;
    }

    public function getAesAttribute()
    {
        $programacionId=$this->attributes['id'];
        $aes=DB::select("select * from p_actividades where peso>0 and ut_id in (select id from ut where programacion_id=:id)",[$programacionId]);
        return $aes;
    }
}
