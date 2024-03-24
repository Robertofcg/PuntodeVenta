@extends('Listas')
@section('title')
<title>Historial de ventas</title>
@endsection

@section('listas')  
<?php
$total=0;
$compra=0;
$ganancia=0;
?>

<div class="col-sm-12 col-lg-10 col-md-auto columna">
<form novalidate action="{{ url('filtrar') }}" method="get" class="formm  my-5 p-5" id="Formulario">
        @csrf
        <div class="well">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-8">
                    <div class="form-group">
                    <h2 class="font-weight-bold mb-3">Historial de ventas</h2>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="">Fecha</label>
                        <input  disabled type="text" id="txtfecha" class="border-2" name="txtfecha"
                            value="<?php echo date("d/m/Y"); ?>" required />
                        @error('txtfecha')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="well m-4 my-5">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-8">
                    <div class="form-group">
                        <label for=""><b>Filtrar por fecha</b></label>
                        <input type="date" id="txtfecha" class="border-2 text-center" name="txtfech"
                            value="<?php echo date("d/m/Y"); ?>" required max ="<?php echo date("Y-m-d"); ?>"/><br/>
                        @error('txtfech')
                            <small style="color:#FF0000 ">*{{$message}}</small><br>
                        @enderror
                        <input type="submit" class="btn btn-primary my-2" name="boto" id="BtnBuscar" value="busca"><br/>
                    </div>
                </div>
                    <div class="d-flex justify-content-end">
                                <button type="button" onclick="javascript:imprim2();" class="btn btn-primary">Imprimir</button>
                    </div>  
            <div>
<br>
            <div class="table-responsive" id="muestra">
                <table class="table" id="muestra">
                    <thead class="thead">
                        <tr>
                            <th style="text-align:center">Num.Venta</th>
                            <th style="text-align:center">Código</th>
                            <th style="text-align:center">Nombre del empleado</th>
                            <th style="text-align:center">Fecha Venta</th>
                            <th style="text-align:center">Cantidad</th>
                            <th style="text-align:center">Monto total</th>
                    </thead>
                    @if(isset($venta))
                        @if(!is_null($venta))
                            @foreach ($venta as $x)
                            <tbody>
                                <tr>
                                <td style="text-align:center">{{$x->idVenta}}</td>
                                <td style="text-align:center">{{$x->codigo}}</td>
                                <td style="text-align:center">{{$x->nombre}}</td>
                                <td style="text-align:center">{{$x->fecha_venta}}</td>
                                <td style="text-align:center">{{$x->cantidad}}</td>
                                <td style="text-align:center"> ${{number_format($x->monto,2, ".", ",")}}</td>
                                <?php
                                $total+=$x->monto;
                                $compra += $x->precio_compra * $x->cantidad;
                                ?>
                            </tr>
                            </tbody>
                            @endforeach
                                <?php
                                $ganancia = $total-$compra;
                                ?>
                        @endif
                    @endif
                </table>
                <div class="etiquetas">
                <div class="container">
                <label class="font-weight-bold"><b>Total de las ventas realizadas</b></label>
                <input type="text" class="form-control" name="codigopro" id="codigopro" value="${{number_format($total,2,'.',',')}}" disabled placeholder="$" >
                </div>
                <div class="container">
                <label class="font-weight-bold"><b>Ganancias</b></label>
                <input type="text" class="form-control" name="codigopro" id="codigopro" value="${{number_format($ganancia,2,'.',',')}}" disabled placeholder="$" >
                </div>
                </div>
            </div>
            
    </div>
       
        
    </form>



    </div>
    <form novalidate action="{{ url('filtrando') }}" method="get" class="formmm  my-5 p-5" id="FormularioRango">
        @csrf       
        <div class="well m-4 my-5">
        <div class="row my-2">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group text-center">
                        <label class="font-weight-bold"><b>Filtrar rango de fechas</b></label>
                    </div>
                </div>
        </div>
        <div class="row my-2">    
                <div class="col-xs-4 col-sm-4 col-md-3">
                    <div class="form-group text-center">
                        <label><b>Filtrar desde</b></label>
                        <input type="date" id="txtfecha" class="border-2 text-center" name="txtfechai"
                            value="<?php echo date("d/m/Y"); ?>" required max ="<?php echo date("Y-m-d"); ?>"/>
                        @error('txtfechai')
                            <small style="color:#FF0000 ">*{{$message}}</small>                            
                        @enderror
                    </div>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-3">
                    <div class="form-group text-center">
                        <label><b>Filtrar hasta</b></label>
                        <input type="date" id="txtfecha" class="border-2 text-center" name="txtfechaf"
                            value="<?php echo date("d/m/Y"); ?>" required max ="<?php echo date("Y-m-d"); ?>"/>
                        @error('txtfechaf')
                            <small style="color:#FF0000 ">*{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-1 my-3">
                    <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary mp-2" name="boto" value="busca"><br/>
                    </div>
                </div>
        </div>
    </div>
    </form>


    
<script>
function imprim2(){
    var mywindow = window.open('', 'PRINT');
    mywindow.document.write('<html><head>');
    mywindow.document.write('<h1 class="fs-1">Reporte de Venta</h1>');
	mywindow.document.write('<style>.table{width:100%;border-collapse:collapse;margin:16px 0 16px 0;font-size:22px;}.tabla th{border:1px solid #ddd;padding:4px;background-color:#d4eefd;text-align:left;}.tabla td{border:1px solid #ddd;text-align:left;padding:6px;}</style>');  
    mywindow.document.write('<style>.etiquetas{width:100%;border-collapse:collapse;margin:16px 0 16px 0;font-size:22px;padding-left:60px;}</style>');  
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById('muestra').innerHTML);
    mywindow.document.write('</body></html>');
    mywindow.document.close(); // necesario para IE >= 10
    mywindow.focus(); // necesario para IE >= 10
    mywindow.print();
    mywindow.close();
    return true;}
</script>
@endsection
