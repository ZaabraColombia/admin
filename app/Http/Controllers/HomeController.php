<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\compras;


class HomeController extends Controller
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
        return view('home');
    }
    public function cargarAreas(){
        return db::select('SELECT * FROM `areas` ORDER BY `orden` asc');
    }
    public function cargarProfesiones(){
        return db::select('SELECT * FROM profesiones');
    }
    public function cargarEspecialidades(){
        return db::select('SELECT * FROM especialidades');
    }


}
