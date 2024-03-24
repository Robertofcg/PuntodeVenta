@extends('Registros')
@section('title')
<title>Registro de proveedor</title>
@endsection
@section('registro')
<!--Formulario--------------->
<div class="col-sm-12 col-lg-10 col-md-auto columna">
    <form novalidate action="{{ url('actualizaPro') }}" method="post" class="form  my-5 p-5" id="Formulario">
        @csrf
        <h2 class="font-weight-bold mb-3">Editar proveedores</h2>
        <div class="well m-4 my-5">
            <div class="row my-2">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input hidden type="text" name="id" value="{{old('id',$proveedor->proveedor)}}">
                        <label class="font-weight-bold"><strong>Nombre</strong></label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre"
                            value="{{old('nomb',$proveedor->nombre)}}">
                        @error('nombre')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Teléfono</strong></label>
                        <input type="number" class="form-control" name="telefono" placeholder="Telefono"
                            value="{{old('telefono',$proveedor->telefono)}}">
                        @error('telefono')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Correo</strong></label>
                        <input type="email" class="form-control" name="correo" placeholder="Correo"
                            value="{{old('nomb',$proveedor->correo)}}">
                        @error('correo')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-xs-4 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Dirección</strong></label>
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección"
                            value="{{old('nomb',$proveedor->direccion)}}">
                        @error('direccion')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success m-4 my-0" name="boton" value="Actualizar"><br><br>
    </form>
</div>
@endsection
