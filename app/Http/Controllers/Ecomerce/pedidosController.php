<?php

namespace App\Http\Controllers\Ecomerce;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\compras;
use App\Http\Controllers\Controller;


class pedidosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index()
    {

        $objEncCompra = $this->cargueEncabezadoCompras();
        return view('ecommerce.pedidos',compact('objEncCompra'));

    }

    public function cargueEncabezadoCompras (){

        $compra = DB::table('compras') 
        ->select('compras.referenceCode','users.name','compras.direccion','compras.valorCompra','compras.fecha')
        ->join('users', 'compras.id_usuario', '=', 'users.id')
        ->orderBy('compras.fecha', 'desc')
        ->paginate(8);
        
        return $compra;

    }

    public function filtroCompras(Request $request){

        //Aqui se encapsula el codigo de referencia 
        $referenceCode = $request->get('codigoReferencia');

        $objEncCompra = $this->cargueUnicaCompra($referenceCode);

        return view('ecommerce.pedidos',compact('objEncCompra'));
    }

    public function cargueUnicaCompra ($referenceCode){

        $compraRetorno  = DB::table('compras') 
          ->join('users', 'compras.id_usuario', '=', 'users.id')
          ->select('compras.id','compras.referenceCode','users.name','compras.direccion','compras.valorCompra','compras.fecha')
          ->orderBy('compras.fecha', 'desc')
          ->whereRaw('compras.referenceCode = '."'$referenceCode'")
          ->paginate(1);
  
          return $compraRetorno ;
    }

    //Por este entra de la ruta 
    public function detalleCompras($referenceCode){
       $objEncCompra =  $this->cargueEncabezadoCompra($referenceCode);        
       $objDetCompra = $this->cargueDetalleCompra($objEncCompra[0]->id);
        //dd($objEncCompra);
        return view('ecommerce.detalleCompra',compact('objEncCompra','objDetCompra'));
    }
   

    public function cargueEncabezadoCompra ($referenceCode){

        $compraRetorno  = DB::table('compras') 
          ->join('users', 'compras.id_usuario', '=', 'users.id')
          ->join('pais', 'compras.pais', '=', 'pais.id_pais')
          ->join('departamento', 'compras.departamento', '=', 'departamento.id_departamento')
          ->join('provincia', 'compras.provincia', '=', 'provincia.id_provincia')
          ->join('municipio', 'compras.ciudad', '=', 'municipio.id_municipio')
          ->select('compras.id','compras.referenceCode','users.name','compras.direccion','compras.valorCompra','compras.fecha','compras.telefono','compras.valorProductos','compras.valorEnvio',
          DB::raw('pais.nombre as nombrePais'),
          DB::raw('departamento.nombre as nombreDepartamento'),
          DB::raw('provincia.nombre as nombreProvincia'),
          DB::raw('municipio.nombre as nombreMunicipio')
          )
          ->orderBy('compras.fecha', 'desc')
          ->whereRaw('compras.referenceCode = '."'$referenceCode'")
          ->paginate(1);
  
          return $compraRetorno ;
    }

    

    public function cargueDetalleCompra($idCompra){

       $detalleRetorno = DB::table('detallecompra') 
       ->join('clientes', 'detallecompra.id_asociado', '=', 'clientes.idCliente')
       ->join('productos', 'detallecompra.id_producto', '=', 'productos.id')
       ->select('detallecompra.nombre','detallecompra.cantidad','detallecompra.valorTotal','clientes.empresa',
       'productos.titulo','productos.titular'
       )  
       ->where('detallecompra.id_compra', '=', $idCompra)
       ->get();

        return  $detalleRetorno;
    }


}
