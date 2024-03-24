@extends('Listas')
@section('title')
<title>Carrito de compras</title>
@endsection
@section('listas')

<div class="col-sm-12 col-lg-10 col-md-auto columna" id="impr">
<div id ="imprr">
<?php
 $precio =0;
?>
<form novalidate action="{{ url('cobrar') }}" method="post" class="formm  my-5 p-5 mb-1" id="Formulario">

        <h2 class="font-weight-bold mb-3">Ticket de la venta</h2>
   
        @csrf
        <div class="well">
            <div class="table-responsive text-center">
                <table class="table" id= "tablaa">
                    <thead class="thead">
                        <tr>
                            <th style="text-align:center">Marca</th>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">Cantidad</th>
                            <th style="text-align:center">Precio</th>
                        </tr>
                    </thead>
                    @if(isset($opcion['lista']))
                    <tbody>
                        @foreach($opcion['lista'] as $x)
                        @if(!is_null($x))
                        <tr>
                            <th>{{$x->marca}}</th>
                            <th>{{$x->producto}}</th>
                            <th>{{$x->cantida}}</th>
                            <th>${{number_format($x->cantida * $x->precio,2, ".", ",")}}</th>
                            <?php
                            $precio += $x->cantida * $x->precio;
                            ?>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    @endif
                </table>
                <div class="d-flex justify-content-end">                    
                    <span class="pt-0"><strong>Total de compra: $</strong></label><input type="text" id="caja1"  name="total" value= "{{number_format($precio,2,'.',',')}}"  disabled class="text-center btn btn-gray text-dark fs-5" size=10>
                </div>        
                <div class="d-flex justify-content-end my-2"> 
                <span class="pt-0"><strong>Pagó: $</strong></label><input required type="numeric" name = "pago"id="caja2" placeholder="Ingresa el pago" class="text-center" size=17> 
                <br>
                @error('pago')
                <small style="color:#FF0000 ">*{{$message}}</small><br>
                 @enderror 
                </div>    
                
                <div class="d-flex justify-content-end my-2">                    
                    <span class="pt-0"><strong>Cambio: $</strong></label><input type="numeric" id="caja3" value='0.00' placeholder="Cambio" disabled class="text-center btn btn-gray" size=14>
                </div>  
                <script>
                    let precio1 = document.getElementById("caja1")
                    let precio2 = document.getElementById("caja2")
                    let precio3 = document.getElementById("caja3")      
                    const options2 = { style: 'currency', currency: 'USD' };
                    const varia1 = new Intl.NumberFormat('en-US', options2);


                    precio2.addEventListener("change", () => {
                        precio3.value = parseFloat(precio2.value) - parseFloat(precio1.value);
                        
                        localStorage.setItem("cambio", precio3.value);


                        localStorage.setItem("recibido",precio2.value);
                    })
                    
                </script>        
            </div>
        </div>
        <input type="submit" class="btn btn-success" name="boton" value="Realizar venta" id= "bot">
        </div>
    </form>
    <div>
        <form novalidate action="{{ url('tic') }}" method="post" class="formm  my-5 p-5" id="Formulario">
        @csrf
        <input type="submit" class="btn btn-success" name="boton" value="genera ticket" id= "bot">
    </form>

    </div>
</div>
@endsection
