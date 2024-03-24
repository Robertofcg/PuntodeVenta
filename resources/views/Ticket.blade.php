<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width">
  <meta name=”keywords” content=”HTML5, CSS3, Javascript”>
  <link rel="stylesheet" type="text/css" href="css/ticket.css">
  <title>Punto de venta</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>

<?php
 $precio =0;
?>
<?php
 $total ="   ";
?>
 <div class="container w-75" id= "imp">
    <div class="col-sm-12 col-lg-12 col-md-auto columna">
    <form class="form  my-5 p-5" id="Formulario">
    @csrf
        <div class="text-center">
            <span>Cadena de Ferreterias S.A de C.V</span>
        </div>
        <div class="text-center">
            <label class="font-weight-bold fs-4 text-center">San Pedro Ixtlahuaca</span>
        </div>
        <div class="text-center">
            <h1 class="font-weight-bold text-center">FerreteriaRM</h1>
        </div>
        <div class="text-left">
            <span class="fs-5 text-left">Lista de compra:</span>
        </div>    
        <div class="text-left">
            <span class="fs-5 text-left">--------------------------------------------------------------------------</span>
        </div> 
        
        <div class="well">
                <table class="table ">
                    <thead class="thead">
                        <tr>
                            <th style="text-align:center">Producto</th>
                            <th style="text-align:center">Descripcion</th>
                            <th style="text-align:center">Cantidad</th>
                            <th style="text-align:center">Total</th>
                    </thead>
                    @if(isset($opcion['lista']))
                    <tbody>
                    @foreach($opcion['lista'] as $x)
                        @if(!is_null($x))
                        <tr>
                          <td style="text-align:center">{{$x->producto}}</td>
                          <td style="text-align:center">{{$x->descripcion}}</td>
                          <td style="text-align:center">{{$x->cantida}}</td>
                          <td style="text-align:center">${{$x->cantida * $x->precio}}</td>
                          <?php
                            $precio += $x->cantida * $x->precio;
                            ?>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    @endif
                </table>   
                <div class= "d-flex justify-content-end" id= "tota">
                <?php
                 $total ="  ";
                 ?>
                  <label id="totalventa"><b>Total de la venta:   </b><span class="fs-6">${{number_format($precio,2,'.',',')}}</span></label>
                  </div>  
                  <div class= "d-flex justify-content-end" id= "total">
                     <label class="pt-0"><b>Pago: $<input type="numeric" id="recibido" class="text-center border-0" size=1></b></label>
                  </div>  
                  <div class= "d-flex justify-content-end" id= "total">
                  <span class="pt-0"><b>Cambio: $<input type="numeric" id="cambio" step='0.01' class="text-center border-0" size=1></b></label>
                  </div>       
        </div>
        <br>
        <div class="text-center">
            <span><b>
                *Muchas gracias por realizar su compra*
            </b></span> 
        </div>
        <br>
        <div class="text-center">
            <span><b>
                *Todos los productos de la marca truper tienen garantia, presentar ticket de compra*
            </b></span> 
        </div>
    </form>
    </div>
</div>

<script>
    document.getElementById("recibido").value = localStorage.getItem("recibido");
 document.getElementById("cambio").value = localStorage.getItem("cambio");
</script>
<script>
 window.print('imp');
</script>

<script src="main.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>