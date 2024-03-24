@extends('Listas')
@section('title')
<title>Lista de Productos</title>
@endsection

@section('listas')
<!--Formulario--------------->
<div class="col-sm-12 col-lg-10 col-md-auto columna">
    <form novalidate action="{{ url('filtro') }}" method="get" class="formm  my-5 p-5" id="Formulario">
        @csrf
        @if (session('alert'))
        <div class="alert alert-success text-center h5" role="alert">
            El producto se ha eliminado con éxito
        </div>
        @endif
        @if (session('alert2'))
        <div class="alert alert-success text-center h5" role="alert" style="color:#000000; background-color: #ADD8E6;">
            El producto se ha actualizado con éxito
        </div>
        @endif
        @if(session('rol')>2)
        <h2 class="font-weight-bold mb-3">Modificar productos</h2>

        <select id="num" name = "num">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
       </select>
       @error('num')
       <small style="color:#FF0000 ">*{{$message}}</small><br>
        @enderror
        <input type="submit" class="btn btn-success" name="boto" value="filtra"><br/>
        @else
        <h2 class="font-weight-bold mb-3">Lista de productos</h2>
        <select id="num" name = "num">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="20">25</option>
        <option value="20">30</option>
        <option value="20">35</option>
       </select>
       @error('num')
       <small style="color:#FF0000 ">*{{$message}}</small><br>
        @enderror
        <input type="submit" class="btn" name="boto" value="filtra"><br/>

        @endif
        <div class="well">

        

            <div class="table-responsive">
                <table class="table">
                    <thead class="thead">
                        <tr>
                            <th style="text-align:center">No. </th>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">Descripción</th>
                            <th style="text-align:center">Precio.U</th>
                            <th style="text-align:center">Existencias</th>
                            <th style="text-align:center">Categoría</th>
                            <th style="text-align:center">Marca</th>
                            <th style="text-align:center">Modelo</th>
                            @if(session('rol')>2)
                            <th colspan="6" style="text-align:center">Acciones</th>
                            @endif
                    </thead>
                    <?php $con=1; ?>
                    @foreach ($producto as $x)
                    <tbody>
                        <tr>
                            <td><?php echo $con ?></td>
                            <td>{{$x->producto}}</td>
                            <td>{{$x->descripcion}}</td>
                            <td>${{number_format($x->precio,2, ".", ",")}}</td>
                            @if(($x->stock)<=3)
                                <td style="color:#FF0000">{{$x->stock}}</td>
                            @else
                                <td style="color: #000000">{{$x->stock}}</td>
                            @endif
                            <td>{{$x->categoria}}</td>
                            <td>{{$x->marca}}</td>
                            <td>{{$x->modelo}}</td>
                            @if(session('rol')>2)
                            <td><a title ="Editar" class="btn btn-warning active" aria-current="page" href="EditarPr/{{$x->codigo}}"
                                    type="submit"><i class="bi bi-pencil-square"></i></a></td>
                            <td><a title ="Eliminar" class="btn btn-danger active" aria-current="page" href="EliminarProd/{{$x->codigo}}"
                                    type="submit"><i class="bi bi-trash-fill"></i></a></td>
                            @endif
                        </tr>
                    </tbody>
                    <?php $con=$con+1; ?>
                    @endforeach
                </table>
                {!! $producto->links() !!}
            </div>
        </div>
        
        
    </form>
</div>

@endsection
