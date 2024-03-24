@extends('Listas')
@section('title')
<title>Historial de ventas</title>
@endsection

@section('listas')
<div class="col-sm-12 col-lg-10 col-md-auto columna" id= "imp">
<form novalidate action="{{ url('filtrar') }}" method="post" class="formm  my-5 p-5" id="Formulario">
        @csrf
        <div class="well">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-8">
                    <div class="form-group">
                    <h2 class="font-weight-bold mb-3">Ventas realizadas</h2>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">

                    </div>
                </div>
            </div>
        </div>
        <div class="well m-4 my-5">
            <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="">Filtrar por fecha</label>
                        <input type="date" id="txtfecha" class="border-2" name="txtfech"
                            value="<?php echo date("d/m/Y"); ?>" required />
                        @error('txtfech')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                        <input type="submit" class="btn" name="boto" value="busca"><br/>
                    </div>
                </div>
                <div>
    <br>
            <div class="table-responsive">
                <table class="table ">
                    <thead class="thead">
                        <tr>
                            <th style="text-align:center">Num.Venta</th>
                            <th style="text-align:center">Código</th>
                            <th style="text-align:center">Nombre del empleado</th>
                            <th style="text-align:center">Fecha Venta</th>
                            <th style="text-align:center">Cantidad</th>
                            <th style="text-align:center">Monto total</th>
                    </thead>
                    @foreach ($vent as $x)
                    <tbody>
                        <tr>
                          <td style="text-align:center">{{$x->idVenta}}</td>
                          <td style="text-align:center">{{$x->codigo}}</td>
                          <td style="text-align:center">{{$x->nombre}}</td>
                          <td style="text-align:center">{{$x->fecha_venta}}</td>
                          <td style="text-align:center">{{$x->cantidad}}</td>
                          <td style="text-align:center">${{$x->monto}}</td>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <label class="font-weight-bold">Total de las ventas realizadas</label>
        <input type="text" class="form-control" name="codigopro" id="codigopro" value="" disable placeholder="$" >
    </form>
</div>
@endsection
