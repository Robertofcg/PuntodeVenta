<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Acceso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <SCRIPT LANGUAGE="JavaScript">
    history.forward()
    </SCRIPT>
    <script type="text/javascript" src={{asset("js/custom.js")}}></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href={{asset("css/login.css")}}>
</head>

<body onload="nobackbutton();">
    <div class="navegador">
        <ul>
            <li>
                <p>Ferretería RM</p>
            </li>
        </ul>
    </div>
    <div class="container">
        <form action="{{ url('validar') }}" method="post"
            class="body d-md-flex align-items-center justify-content-between">
            <div class="box-1 mt-md-0 mt-5"> <img
                    src="https://images.pexels.com/photos/5095279/pexels-photo-5095279.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
                    class="" alt=""> </div>
            <div class=" box-2 d-flex flex-column h-100">
                <div class="mt-5">
                    <p class="mb-1 h-1">Iniciar Sesión</p><br>
                    @csrf
                    <input hidden type="text" name="denegado">
                    @error('denegado')
                    <small style="color:#FF0000 ">*{{$message}}</small><br>
                    @enderror
                    <div class="row my-2">
                        <div class="col-xs-4 col-sm-12 col-md-12">
                            <div class="form-group" id="user-group">
                                <input hidden type="text" name="id" value="">
                                <label class="font-weight-bold">Usuario <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="usuario" placeholder="Ingresa tu usuario" id="usuario"/>

                                @error('usuario')
                                <small style="color:#FF0000 ">*{{$message}}</small><br>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-xs-4 col-sm-12 col-md-12">
                            <div class="form-group" id="contraseña-group">
                                <input hidden type="text" name="id" value="">
                                <label class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" placeholder="Ingresa tu contraseña"
                                    name="password" />
                                @error('password')
                                <small style="color:#FF0000 ">*{{$message}}</small><br>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div><br>
                <input type="submit" value="Ingresar" class="button">
            </div>
    
    </div>
</body>

</html>
