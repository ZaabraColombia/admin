<?php

namespace App\Http\Controllers\Sprofesional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\Sprofesional\PerfilesProfesionalesExport;
use App\Exports\Sprofesional\perfilBasicoNoPago;
use App\Exports\Sprofesional\perfilVenceMenbresia;

use Maatwebsite\Excel\Facades\Excel;

class ReportesEXL extends Controller
{
    public function descargarPerfilesProfesionalesEXL(Request $request){
        
        return Excel::download(new PerfilesProfesionalesExport($request->fechaInicio,$request->fechaFin), 'PerfilesProfesionales.xlsx');
    }
    public function descargarPerfilesVenceMenbresiaEXL(Request $request){

        return Excel::download(new perfilVenceMenbresia($request->fechaInicio,$request->fechaFin), 'PerfilesVenceMenbresia.xlsx');
    }
    public function descargarPerfilesBasicoNoPagoEXL(Request $request){

        return Excel::download(new perfilBasicoNoPago($request->fechaInicio,$request->fechaFin), 'PerfilesBasicoNoPago.xlsx');
    }


}
