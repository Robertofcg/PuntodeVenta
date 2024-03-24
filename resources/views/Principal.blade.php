@extends('Listas')
@section('title')
<title>Punto de venta</title>
@endsection
@section('listas')
<div class="col-sm-12 col-lg-10 col-md-auto columna">
    <div>
    <form novalidate action="{{ url('buscar') }}" method="get" class="formm  my-5 p-5 mb-1" id="Formulario">
        @csrf
        <h2 class="font-weight-bold mb-3">Información de la venta</h2>
        <div class="well">
            <div class="row">
                <div class="col-xs-4 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Empleado</strong></label>
                        <input type="text" class="form-control" name="empleado" value={{session('emp')->getNombre()}} id="emp" disabled>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for=""><strong>Fecha</strong></label>
                        <input  disabled type="text" id="txtfecha" class="form-control" name="txtfecha"
                            value="<?php echo date("d/m/Y"); ?>" required />
                            @error('fecha')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Producto</strong></label>
                        <input type="text" class="form-control" name="codigopro" id="codigopro" placeholder="Producto" value="">
                        @error('codigopro')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold"><strong>Monto</strong></label>
                        <input type="text" class="form-control" name="monto" value="${{number_format(session('monto'),2,'.',',')}}" id="monto" disabled>
                    </div>
                </div>
            </div>
            <br/>
        </div>
        <input hidden type="text" class="form-control" name="nulo" value="nulo" >
        <input type="submit" class="btn btn-success" name="boton" value="buscar">
        <a title ="Carrito" class="btn btn-warning" aria-current="page" href="carrito/" type="submit"><i class="bi bi-cart-check-fill"></i></a></a>
        <br/>
        @error('nulo')
            <small style="color:#FF0000 ">*{{$message}}</small><br>
        @enderror
        <br/>
    <form class="Busq" id="FormBusque">
        <div class="well">
            <div class="table-responsive text-center">
                <table class="table" id= "tablaa">
                    <thead class="thead">
                        <tr>
                            <th style="text-align:center">Modelo</th>
                            <th style="text-align:center">Marca</th>
                            <th style="text-align:center"width="200">Nombre</th>
                            <th style="text-align:center">Existencia</th>
                            <th style="text-align:center">Cantidad</th>
                            <th style="text-align:center">Precio</th>
                            <th style="text-align:center"width="200">Descripción</th>
                            <th style="text-align:center">Acción</th>
                    </thead>
                    <!-- no eliminar este formulario -->
                    <form novalidate action="{{url('x')}}" method="POST">
                        @csrf
                    </form>
                    @error('cantidad')
                        <small style="color:#FF0000 ">*{{$message}}</small><br>
                    @enderror
                    <!-- no eliminar el formulario anterior-->
                    @if(isset($opcion['opcion']))
                        @foreach($opcion['opcion'] as $x)
                            <tbody>
                                <form action="{{url('/vender')}}" method="post">
                                @csrf
                                <tr>
                                    <td hidden><input type="text" name="codigo" value="{{$x->codigo}}" id="emp"></td>
                                    <td style="width : 60px">{{$x->modelo}}</td>
                                    <td>{{$x->marca}}</td>
                                    <td style="width : 100px">{{$x->producto}}</td>
                                    @if(($x->stock)<=3)
                                    <td style=" width :100px; color:#FF0000;">{{$x->stock}}</td>
                                    @else
                                    <td style=" width :100px; color: #000000;">{{$x->stock}}</td>
                                    @endif
                                    <td><input style="width : 60px; heigth : 1px" max="{{$x->stock}}" type="number" name="cantidad" required></td>
                                    <td> ${{number_format($x->precio,2)}}         </td>
                                    <td style="width : 100px">{{$x->descripcion}}</td>
                                    <td><input type="submit" class="btn btn-success" name="boton" value="vender"></td>
                                </tr>
                                </form>
                            </tbody>
                        @endforeach
                </table>
                @endif
            </div>
        </div>
    </form>
    </div>
    <!--<a class="btn btn-warning" aria-current="page" href="carrito/" type="submit"><i class="bi bi-cart-check-fill"></i></a></a>-->
</div>
@endsection
