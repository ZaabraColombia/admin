<?php

namespace App\Exports\Sprofesional;

use Maatwebsite\Excel\Concerns\FromCollection;

class perfilBasicoNoPago implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($fechaInicio, $fechaFin )
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin  = $fechaFin;
    }
    public function collection()
    {
        //
    }
}
