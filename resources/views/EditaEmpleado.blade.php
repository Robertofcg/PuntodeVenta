@extends('Registros')
@section('title')
<title>Edicion de empleados</title>
@endsection
@section('registro')
<!--Formulario--------------->
<div class="col-sm-12 col-lg-10 col-md-auto columna">
    <form novalidate action="{{ url('actualizaEmp') }}" method="post" class="form  my-5 p-5" id="Formulario">
        @csrf
        <h2 class="font-weight-bold mb-3">Editar empleados</h2>
        <div class="well m-4 my-5">
            @csrf
            <div class="row my-2">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input hidden type="text" name="id" value="{{old('id',$empleado->idPersona)}}">
                        <label class="font-weight-bold"><strong>Nombre completo</strong><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nombre" placeholder="Tu nombre"
                            value="{{old('nombre',$empleado->nombre)}}">
                        @error('nombre')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Apellido paterno</strong><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="apellidop" placeholder="Tu primer apellido"
                            value="{{old('apellidop',$empleado->apellidoP)}}">
                        @error('apellidop')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Apellido materno</strong><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="apellidom" placeholder="Tu segundo apellido"
                            value="{{old('apellidom',$empleado->apellidoM)}}">
                        @error('apellidom')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Teléfono</strong><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="telefono" placeholder="Tu número de teléfono"
                            value="{{old('telefono',$empleado->telefono)}}">
                        @error('telefono')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Correo electrónico</strong><span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="correo"
                            placeholder="Ingresa tu correo electrónico" value="{{old('correo',$empleado->correo)}}">
                        @error('correo')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Contraseña</strong><span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password"
                            placeholder="Ingresa una contraseña">
                        @error('password')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Confirmar contraseña</strong><span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="confirma"
                            placeholder="Confirma tu contraseña">
                        @error('confirma')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Puesto</strong><span class="text-danger">*</span></label>
                        <select class="form-control" name="puesto">
                            <option value={{$empleado->puesto}}>{{$empleado->puesto}}</option>
                            <option value="Vendedor">Vendedor</option>
                            <option value="Repartidor">Repartidor</option>
                            <option value="Administrador">Administrador</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success m-4 my-0" name="boton" value="Actualizar"><br></br>
    </form>
</div>
@endsection
