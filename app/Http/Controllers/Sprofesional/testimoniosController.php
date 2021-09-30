<?php

namespace App\Http\Controllers\Sprofesional;

use App\Http\Controllers\Controller;
use App\Http\Controllers\generalesController;
use App\Models\testimonios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;


class testimoniosController extends Controller
{
    public function __construct()
    {
        $this->instaPerfilProfesional = (new perfilProfesionalController);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objTestimonios = testimonios::select('testimonios.id','testimonios.comentario','testimonios.aprobado','users.name AS usuario','testimonios.calificacion',
         DB::raw('concat(USPE.nombre,\' \',USPE.apellido) AS perfil')
        )
        ->join('users','users.id','=','testimonios.id_usuario')    
        ->join('perfilesprofesionales AS PEPR','PEPR.id','=','testimonios.id_perfilProf')
        ->join('infouser as USPE','PEPR.idUser','=','USPE.id')
        ->orderBy('testimonios.created_at', 'DESC')
        ->paginate(10);
        $objEstados = (new generalesController)->consultarCatalogos(17); //codigo 17 para los estadosGenerales aprobado o rechazado 
        return view('SProfesional.indexTestimoniosperfilProfesional',compact('objEstados','objTestimonios'));
    }

    public function filtroPerfprof(Request $request)
    {
        //dd($cedula);
        //Aqui se encapsula el codigo de referencia 
        $cedula = $request->get('cedula');
        $objPerfil = $this->instaPerfilProfesional->cargueUnicoPerfil($cedula);
        return view('SProfesional.indexTestimoniosperfilProfesional',compact('objPerfil'));

    }
    public function actualizarEstadoTestimonio(Request $request,$testimonio,$idEstado){
        
        if($request->ajax()){
            $testimonios = testimonios::find($testimonio);
            $testimonios->aprobado = $idEstado;
            $testimonios->save();
    
            return response()->json($testimonios); 
        }
    }



    public function show($cod)
    {
        
       

        
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
