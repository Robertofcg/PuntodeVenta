<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="HTML5, CSS3, Javascript">
    <link rel="stylesheet" type="text/css" href={{asset("css/estilos.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/formulario.css")}}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    @yield("title")
</head>

<body onload="nobackbutton();">
    <!-- Menu -->
    <div class="container-fluid" id="Navegacion">
        <header>
            <h1 class="fant">FerreteriaRM</h1>
        </header>
    </div>
    <!-- Contenido -->
    <div class="container-fluid w-100" id="Contenido">
        <div class="row">
            <div class="col-sm-12 col-lg-2 col-md-auto  p-0" id="columna">
                <nav class="nav">
                    <ul class="list">
                        @if(session('rol')>1)
                        <li class="list__item">
                            <div class="list__button">
                                <img src={{asset("assets/dashboard.svg")}} class="list__img">
                                <a href="{{url('principal')}}" class="nav__link">Venta</a>
                            </div>
                        </li>
                        @endif
                        @if(session('rol')>2)
                        <li class="list__item">
                            <div class="list__button">
                                <img src={{asset("assets/dashboard.svg")}} class="list__img">
                                <a href="{{url('historialProd')}}" class="nav__link">Historial</a>
                            </div>
                        </li>
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src={{asset("assets/docs.svg")}} class="list__img">
                                <a href="#" class="nav__link">Producto</a>

                            </div>
                            @endif
                            <ul class="list__show">
                                @if(session('rol')>2)
                                <li class="list__inside">
                                    <a href="{{url('RegistroP')}}" class="nav__link nav__link--inside">Registrar</a>
                                </li>
                                <li class="list__inside">
                                    <a href="{{url('listaProducto')}}" class="nav__link nav__link--inside">Modificar</a>
                                </li>
                                @else
                                @if(session('rol')>0)
                                <li class="list__item">
                                    <div class="list__button">

                                        <a href="{{url('listaProducto')}}" class="nav__link"></a>
                                    </div>
                                </li>
                                @endif
                                @endif
                            </ul>
                        </li>
                        @if(session('rol')>1)
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src={{asset("assets/docs.svg")}} class="list__img">
                                <a href="#" class="nav__link">Proveedores</a>
                            </div>
                            <ul class="list__show">
                                @if(session('rol')>2)
                                <li class="list__inside">
                                    <a href="{{url('RegistroProvee')}}"
                                        class="nav__link nav__link--inside">Registrar</a>
                                </li>
                                <li class="list__inside">
                                    <a href="{{url('EliminarProvee')}}"
                                        class="nav__link nav__link--inside">Modificar</a>
                                </li>
                                @else
                                <li class="list__inside">
                                    <a href="{{url('EliminarProvee')}}" class="nav__link nav__link--inside">Lista</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if(session('rol')>1)
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src={{asset("assets/docs.svg")}} class="list__img">
                                <a href="#" class="nav__link">Empleados</a>
                            </div>
                            <ul class="list__show">
                                @if(session('rol')>2)
                                <li class="list__inside">
                                    <a href="{{url('alta')}}" class="nav__link nav__link--inside">Registrar</a>
                                </li>
                                <li class="list__inside">
                                    <a href="{{url('ListaEmp')}}" class="nav__link nav__link--inside">Modificar</a>
                                </li>
                                @else
                                <li class="list__inside">
                                    <a href="{{url('ListaEmp')}}" class="nav__link nav__link--inside">Lista</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        <li class="list__item">
                            <div class="list__button">
                                <img src={{asset("assets/arrow.svg")}} class="list__img">
                                <a href="{{url('salir')}}" class="nav__link">Salir</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            @yield('listas')
            <script src={{asset("js/main.js")}}></script>
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>
</body>

</html>