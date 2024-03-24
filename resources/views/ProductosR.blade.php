@extends('Registros')
@section('title')
<title>Registro de productos</title>
@endsection
@section('registro')
<!--Formulario--------------->
<div class="col-sm-12 col-lg-10 col-md-auto columna">
    <form novalidate action="{{ url('registroProducto') }}" method="post" class="form  my-5 p-5" id="Formulario">
        @csrf
        @if (session('alert'))
        <div class="alert alert-success text-center h5" role="alert">
            El producto se ha registrado con éxito
        </div>
        @endif
        @if (session('alert2'))
        <div class="alert alert-success text-center h5" role="alert" style="color:#ffffff; background-color: #ADD8E6;">
            El producto se ha actualizado con éxito
        </div>
        @endif
        <h2 class="font-weight-bold mb-3">Registro de productos</h2>
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
                        <label class="font-weight-bold"><strong>Descripción</strong><span class="text-danger">*</span></label>
                        <textarea style="resize: none;" rows="1" class="form-control" name="descripcion"
                            placeholder="Descripción" value={{old('descripcion')}}></textarea>
                        @error('descripcion')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Precio unitario $</strong><span class="text-danger">*</span></label>
                        <input type="number" step="0.01" min='0' class="form-control" name="punitario"
                            placeholder="Agregue el precio unitario" value={{old('punitario')}}>
                        @error('punitario')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Stock</strong><span class="text-danger">*</span></label>
                        <input type="number" min="0" class="form-control" name="stock" placeholder="existencia"
                            value={{old('stock')}}>
                        @error('stock')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Precio de compra $</strong><span class="text-danger">*</span></label>
                        <input type="number" step="0.01" min='0' class="form-control" name="pcompra" placeholder="$"
                            value={{old('pcompra')}}>
                        @error('pcompra')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Categoría</strong><span class="text-danger">*</span></label>
                        <select class="form-control" name="categoria" value={{old('categoria')}}>
                            @foreach ($datos['cat'] as $c)
                            <option value={{$c->codigo}}>{{$c->nombreCat}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Proveedor</strong><span class="text-danger">*</span></label>
                        <select class="form-control" name="provee" value={{old('provee')}}>
                            @foreach ($datos['prov'] as $p)
                            <option value={{$p->proveedor}}>{{$p->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Marca</strong><span class="text-danger">*</span></label>
                        <select class="form-control" name="marca" value={{old('marca')}}>
                            @foreach ($datos['mar'] as $m)
                            <option value={{$m->idMarca}}>{{$m->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Modelo</strong><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="modelo" placeholder="modelo"
                            value={{old('modelo')}}>
                        @error('modelo')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary m-4 my-0" name="boton" value="Registrar"><br><br>
    </form>
</div>
@endsection
