@extends('Registros')
@section('title')
<title>Edicion de productos</title>
@endsection
@section('registro')
<!--Formulario--------------->
<div class="col-sm-12 col-lg-10 col-md-auto columna">
    <form novalidate action="{{ url('actualizaProd') }}" method="post" class="form  my-5 p-5" id="Formulario">
        @csrf
        @if (session('alert'))
        <div class="alert alert-success text-center h5" role="alert">
            El producto se ha Actualizado con éxito
        </div>
        @endif
        <h2 class="font-weight-bold mb-3">Editar productos</h1>
            <div class="well m-4 my-5">
                @foreach($producto['producto'] as $p)
                <div class="row my-2">
                    <input type="hidden" name="id" value="{{$p->codigo}}" placeholder="id">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold"><strong>Nombre</strong></label>
                            <input type="text" class="form-control" name="nombre" value="{{$p->prod}}"
                                placeholder="nombre">
                            @error('nombre')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold"><strong>Descripción</strong></label>
                            <input type="text" class="form-control" name="descripcion" value="{{$p->descripcion}}"
                                placeholder="descripcion">
                            @error('descripcion')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold"><strong>Precio unitario $</strong></label>
                            <input type="number" step="0.01" min='0' class="form-control" name="punitario"
                                value="{{$p->precio}}" placeholder="precio de venta">
                            @error('punitario')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold"><strong>Stock</strong></label>
                            <input type="number" min="0" class="form-control" name="stock" value="{{$p->stock}}"
                                placeholder="existencia">
                            @error('stock')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold"><strong>Precio de compra $</strong></label>
                            <input type="number" step="0.01" min='0' class="form-control" name="pcompra"
                                value="{{$p->compra}}" placeholder="precio de compra">
                            @error('pcompra')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold"><strong>Categoría</strong></label>
                            <select class="form-control" name="categoria" value={{old('categoria')}}>
                                <option value={{$p->idCat}}>{{$p->categoria}}</option>
                                @foreach($producto['cat'] as $c)
                                <option value={{$c->codigo}}>{{$c->nombreCat}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold"><strong>Proveedor</strong></label>
                            <select class="form-control" name="provee" value={{old('provee')}}>
                                <option value={{$p->idProv}}>{{$p->proveedor}}</option>
                                @foreach ($producto['prov'] as $pr)
                                <option value={{$pr->proveedor}}>{{$pr->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold"><strong>Marca</strong></label>
                            <select class="form-control" name="marca" value={{old('marca')}}>
                                <option value={{$p->idMarca}}>{{$p->marca}}</option>
                                @foreach ($producto['mar'] as $m)
                                <option value={{$m->idMarca}}>{{$m->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold"><strong>Modelo</strong></label>
                            <input type="text" class="form-control" name="modelo" placeholder="modelo"
                                value={{$p->modelo}}>
                            @error('modelo')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                            @enderror
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <input type="submit" class="btn btn-success m-4 my-0" value="Actualizar"><br></br>
    </form>
</div>
@endsection
