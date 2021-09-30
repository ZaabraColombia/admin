<?php

namespace App\Http\Controllers\Sprofesional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\Sprofesional\perfilesPagosFechasExport;
use App\Exports\Sprofesional\perfilBasicoNoPago;
use App\Exports\Sprofesional\perfilVenceMenbresia;

use Maatwebsite\Excel\Facades\Excel;

class ReportesPDF extends Controller
{
    public function descargarPerfilesPagosFechasPDF(){

        return Excel::download(new perfilesPagosFechasExport('11-20-2020','11-20-2020'), 'PerfilesPagosFechas.DOMPDF');
    }
    public function descargarPerfilesVenceMenbresiaPDF(){

        return Excel::download(new perfilVenceMenbresia('11-20-2020','11-20-2020'), 'PerfilesVenceMenbresia.DOMPDF');
    }
    public function descargarPerfilesBasicoNoPagoPDF(){

        return Excel::download(new perfilBasicoNoPago('11-20-2020','11-20-2020'), 'PerfilesBasicoNoPago.DOMPDF');
    }


}
