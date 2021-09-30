<?php

namespace App\Exports\Sprofesional;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use App\Models\perfilProfesional;

class PerfilesProfesionalesExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($fechaInicio, $fechaFin )
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin  = $fechaFin;
    }
    public function headings(): array
    {
        return [
            'Nombre Perfil'
            ,'documento '
            ,'Telefono'
            ,'Correo'
            ,'Direccion'
            ,'Genero'
            ,'Ciudad'
            ,'Area'
            ,'Profesion'
            ,'Especialidad'            
            ,'fecha de nacimiento'
            ,'fecha creacion sistema'
            ,'fecha de creacion del perfil'
            ,'fecha de la ultima actualizacion del perfil'
            ,'usuario que aprobo '
            ,'Fecha Aprobacion '
            ,'Sistema en el que se creo '

        ];
    }
    
    public function collection()
    {
      
        
         $objConsulta =  perfilProfesional::select(
            
             DB::raw('concat(INFO.nombre,\' \',INFO.apellido) AS NombrePerfil')
            ,'INFO.numero_documento AS NumeroDocumento'     
            , 'INFO.telefono'
            , 'USER.email'
            , 'INFO.direccion'
            , 'GENE.nombre AS GENERO' 
            , 'CIUD.nombre AS CIUDAD' 
            , 'AREA.nombreArea'
            , 'PROF.nombreProfesion'
            , 'ESPE.nombreEspecialidad'
            , 'perfilesprofesionales.fechanacimiento'
            , 'USER.created_at AS FECHACREACION' 
            , 'perfilesprofesionales.created_at AS FECHACREACIONPERFIL' 
            , 'perfilesprofesionales.updated_at AS FECHAACTUALIZACIONPERFIL'
            , 'USAP.name AS USUARIOAPROBO'
            , 'perfilesprofesionales.FechaAprobacion' 
            , 'SICR.nombre AS SISTEMACREACION'
            )
         ->join('users AS USER','perfilesprofesionales.idUser','=','USER.id')
         ->join('users AS USAP','perfilesprofesionales.usuarioAprueba','=','USAP.id')//usuario que aprobo el perfil
         ->join('infouser AS INFO','perfilesprofesionales.idUser','=','INFO.id')
         ->join('municipio AS CIUD','INFO.ciudad','=','CIUD.id_municipio')
         ->join('controlesperfilesprofesiones AS COPR','COPR.idPerfilProfesional','=','perfilesprofesionales.id')
         ->join('areas AS AREA','COPR.idArea','=','AREA.id')
         ->join('profesiones AS PROF','COPR.idProfesion','=','PROF.id')
         ->join('especialidades AS ESPE','COPR.idEspecialidad','=','ESPE.id')
         ->join('catalogos AS GENE','GENE.id_catalogo','=','perfilesprofesionales.genero')
         ->join('catalogos AS SICR','SICR.id_catalogo','=','USER.lineaNegocio')
         ->get();
            
            
        return $objConsulta;

    }
}
