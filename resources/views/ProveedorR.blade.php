@extends('Registros')
@section('title')
<title>Registro de proveedor</title>
@endsection
@section('registro')
<!--Formulario--------------->
<div class="col-sm-12 col-lg-10 col-md-auto columna">
    <form novalidate action="{{ url('regisPro') }}" method="post" class="form  my-5 p-5" id="Formulario">
        @csrf
        @if (session('alert'))
        <div class="alert alert-success text-center h5" role="alert">
            El Proveedor se ha registrado con éxito
        </div>
        @endif
        <h2 class="font-weight-bold mb-3">Registro de proveedores</h2>
        <div class="well m-4 my-5">
            <div class="row my-2">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Nombre</strong><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nombre" placeholder="nombre"
                            value={{old('nombre')}}>
                        @error('nombre')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Teléfono</strong><span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="telefono" placeholder="telefono"
                            value={{old('telefono')}}>
                        @error('telefono')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Correo</strong><span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="correo" placeholder="correo"
                            value={{old('correo')}}>
                        @error('correo')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-xs-4 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Dirección</strong><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="direccion" placeholder="dirección"
                            value={{old('direccion')}}>
                        @error('direccion')
                        <small style="color:#04253a ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary m-4 my-0" name="boton" value="Registrar"><br><br>
</div>
</form>
</div>
@endsection
