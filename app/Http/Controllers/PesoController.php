<?php

namespace App\Http\Controllers;

use App\Programacion;
use App\RA;
use App\CE;
use App\Peso;
use Illuminate\Http\Request;

class PesoController extends Controller
{
    public function pesos($programacionId)
    {
        $p = Programacion::find($programacionId);
        $ras = RA::where("modulo_id", $p->modulo_id)->where("ciclo_id", $p->ciclo_id)->get();
        foreach ($ras as $ra) {
            $ces = CE::where("ra_id", $ra->id)->select("id", "pos", "ce")->get();
            $ra->ces = $ces;
        }
        return view('pesos.pesos', compact('p','ras'));
    }

    public function grabar(Request $request){
        $datos=$request->all(); //coge todos los parametros pasados
        Peso::create($datos);
    }
}
