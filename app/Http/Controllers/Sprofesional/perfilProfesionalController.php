<?php

namespace App\Http\Controllers\Sprofesional;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\catalogos;
use App\Models\perfilProfesional;
use App\Mail\perfilProfesionalMail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\generalesController;
use Carbon\Carbon;

class perfilProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $objPerfil = $this->cargarPerfiles();
        
        return view('SProfesional.indexperfilProfesional',compact('objPerfil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function cargarPerfiles(){

        $perfil = DB::table('perfilesprofesionales') 
        ->select('users.email','users.name','infouser.numero_documento','infouser.telefono',)
        ->join('users', 'perfilesprofesionales.idUser', '=', 'users.id')
        ->join('infouser', 'infouser.id', '=', 'users.id')
        
        ->orderBy('users.fecha', 'desc')
        ->paginate(8);
        
        return $perfil;


    }

    public function filtroPerfprof(Request $request)
    {
        //dd($cedula);
        //Aqui se encapsula el codigo de referencia 
        $cedula = $request->get('cedula');
        $objPerfil = $this->cargueUnicoPerfil($cedula);
        return view('SProfesional.indexperfilProfesional',compact('objPerfil'));

    }
    public function cargueUnicoPerfil ($cedula){

        $perfil  = DB::table('perfilesprofesionales') 
        ->select('users.email','users.name','infouser.numero_documento','infouser.telefono',)
        ->join('users', 'perfilesprofesionales.idUser', '=', 'users.id')
        ->join('infouser', 'infouser.id', '=', 'users.id')
        ->where('infouser.numero_documento', '=', $cedula)
        ->orderBy('users.fecha', 'desc')
        ->paginate(1);
          return $perfil ;
    }

    public function detallePerfilProf(Request $request,$cod){

        

        $obj = $this->cargarInfoPerfilSinAprobado($cod); 
        
        $objUsuario  = $this->cargarCiudadUsuario($obj[0]->id); 
        if(count($obj) == 0){
            $obj[] = '' ;
            $perfil = '';
        }else {
            $perfil = $obj[0];// desencapsulo el objeto para retormar a la vista 
        }
        if($perfil == ""){ 
             /*esto solo es para cargar area, profesion, especialidad del perfil*/
            $objAreaProfEspe = $this->controlPerfilProfesionalPorUsuario(0);
            
        }else{
             /*esto solo es para cargar area, profesion, especialidad del perfil*/
            $objAreaProfEspe = $this->controlPerfilProfesionalPorUsuario($perfil->id);
        }
        
        $objbannersArea = (new HomeController)->cargarAreas();
        $objbannersProfesionales =  (new HomeController)->cargarProfesiones();
        $objbannersEspecialidades =  (new HomeController)->cargarEspecialidades();
       
        
       
        $objTipoConsulta = (new generalesController)->consultarCatalogos(16);
        $diasSemana = $this->cargarDia();
        $objEstados =(new generalesController)->consultarCatalogos(17); //codigo 17 para los estadosGenerales aprobado o rechazado 
        

        return view('SProfesional.miPerfilProfesional',compact('perfil'
        ,'diasSemana',
        'objbannersArea',
        'objbannersProfesionales',
        'objbannersEspecialidades',
        'objUsuario',
        'objAreaProfEspe',
        'objTipoConsulta',
        'objEstados'));
    }
    //TODO LAS SIGUIENTE 3 FUNCIONES SON PARA EL CARGUE DEL DETALLE DEL PROFESIONAL ED 
    public function cargarInfoPerfilSinAprobado ($cedula){
        
        $perfil = DB::select('SELECT PERF.id,PERF.idUser, INFO.numero_documento, INFO.nombre , INFO.apellido, USER.email , PERF.tipoConsulta,
        PERF.nivelEstudios, PERF.nombreEstudios, PERF.estudios, PERF.fechaEstudios , PERF.descripcion ,
        PERF.entidadCertificado, PERF.nombreCertificado,PERF.fechaCertificado, PERF.titulos ,
        PERF.nombrePublicacion, PERF.linksPublicacion, PERF.Publicaciones ,  PERF.fechaPublicacion ,  PERF.hojaVida ,
        PERF.nombreEmpresaExperiencia, PERF.descripcionExperiencia, PERF.fechaInicioExperiencia, PERF.fechaFinExperiencia,
        PERF.nombreProyecto,PERF.descripcionProyecto,PERF.imagen, PERF.expertoEn,
        PERF.facebook ,PERF.instagram, PERF.twitter, PERF.whatsapp, PERF.youtube,PERF.CorreoPersonal , PERF.url, PERF.diaatencioninicio  , PERF.diaatencionfin ,
        PERF.valorConsultaPresencial,PERF.valorConsultaVirtual,PERF.valorConsultaTelefonica,
        REPLACE(DATE_FORMAT(PERF.fechanacimiento, "%Y %m %d" )," ","-")  fechanacimiento, PERF.horarioatencioninicio,
        PERF.horarioatencionfin, PERF.descripcion,  PERF.fotoperfil, CIUD.nombre ciudad ,   CIUD.id_municipio codigoCiudad
        ,PERF.genero ,PERF.EmpresaActual ,PERF.aprobado
        FROM perfilesprofesionales PERF 
        INNER JOIN users USER ON PERF.idUser = USER.id  
        INNER JOIN infouser INFO ON USER.id = INFO.id 
        INNER JOIN municipio CIUD ON CIUD.id_municipio = INFO.ciudad
        WHERE  INFO.numero_documento = ?', [$cedula]) ;

        return $perfil;

    }
    public function cargarCiudadUsuario ($profesional){

        $perfil = DB::select('SELECT  INFO.nombre , INFO.apellido, USER.email ,CIUD.nombre ciudad , CIUD.id_municipio codigoCiudad
        FROM users USER  
        INNER JOIN  infouser INFO ON USER.id = INFO.id 
        INNER JOIN  municipio CIUD ON CIUD.id_municipio = INFO.ciudad
        WHERE USER.id = ?', [$profesional]) ;

       
        return $perfil;
    }
      /*esto solo es para cargar area, profesion, especialidad del perfil*/
      public function controlPerfilProfesionalPorUsuario ($id){
       
        return DB::select('SELECT * FROM controlesperfilesprofesiones WHERE idPerfilProfesional = ?', [$id]) ;
  
      }

      public function cargarDia(){

        $diasSemana =  catalogos::select('id_catalogo','id_padre','nombre')     
        ->where('id_padre', '=', 13 )
        ->get();
        return $diasSemana ;

    }

    public function guardarEstado(Request $request){
        
        $id = $request->idUsuario;
        $actualizoUsuario = $this->update($request,$id);
        $usuarioActual = $this->consultarCorreoPerfilProf($actualizoUsuario->idUser);
        
        
        //Envio al Perfil Gestionado
        Mail::to($usuarioActual[0]->email)->send(new perfilProfesionalMail($usuarioActual[0]->numero_documento));

        return redirect()->route('detallePerfilProf', array('cod' => $request->documentoUsuario ));
       

    }
    
    public function update(Request $request,$valorid){

        $array = perfilProfesional::where('id', '=',$valorid)->get();
        $infoProf = $array[0];
        $infoProf->notasAprobacion =  $request->notasAprobacion ;
        $infoProf->aprobado =  $request->slcEstado ;
        $infoProf->usuarioAprueba =$request->user()->id ;
        $infoProf->FechaAprobacion = Carbon::now();
        

        $infoProf->save();

        return $infoProf;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function consultarCorreoPerfilProf($id){
        $usuarioActual =  DB::select('SELECT  USER.email , INFO.numero_documento FROM  users AS USER
        INNER JOIN infouser INFO  ON USER.id = INFO.id
        WHERE USER.id = ?', [$id]) ;

        return $usuarioActual;
     }


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
    public function show($id)
    {
        //
    }

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
