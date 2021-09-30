<div class="container-fluid header">
    
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="col-md-2 contenedorLogo">
                    @guest    
                    <a href="{{ url('/') }}">
                    @else
                    <a href="{{ url('/home') }}">
                    @endguest
                    <img class="col-xs-12 noPad logoImagen" src="{{$urlZaabra}}img/LogoZaabraHeader.png">
                    </a>    
                    </div>

                </div>
                <div class="col-md-2">
                            <div class = "row">
                                <div class="contenedorIconos flex-column noPad">
                                    <div class="bloqueA noPad">
                                    @guest
                                        <div class="dropdown iconoIniciarSesion">
                                            <a class="dropdown-toggle"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <div class="icon_user"></div>
                                            </a>
                                            <div class="dropdown-menu modalInicioSesion" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('login') }}" >
                                                    Iniciar sesión
                                                </a>
                                                <a class="dropdown-item" href="{{ route('register') }}" >
                                                    Crear cuenta
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                    <div class="nav-item dropdown iconoSesionIniciada">
                                        <!--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span></a>-->
                                        <a class="dropdown-toggle"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="icon_user"></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left modalInicioSesion" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item col-xs-12" href="{{ url('miCuenta') }}">
                                                Mi Cuenta
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                    @endguest
                                    </div>    
                                </div>
                            </div>
                        </div>


            
                </div>
            </div>    
        </div>
    
</div>