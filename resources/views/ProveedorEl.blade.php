@extends('Listas')
@section('title')
<title>Listas de proveedor</title>
@endsection

@section('listas')
<!--Formulario--------------->
<div class="col-sm-12 col-lg-10 col-md-auto columna">
    <form novalidate action="{{ url('filtroprov') }}" method="get" class="formm  my-5 p-5" id="Formulario">
        @csrf
        @if (session('alert'))
        <div class="alert alert-success text-center h5" role="alert">
            El proveedor se ha eliminado con éxito
        </div>
        @endif
        @if (session('alert2'))
        <div class="alert alert-success text-center h5" role="alert" style="color:#000000; background-color: #ADD8E6;">
            El proveedor se ha actualizado con éxito
        </div>
        @endif

        
        <h2 class="font-weight-bold mb-3">Modificar proveedores</h2>
        <select id="num" name = "num">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
       </select>
       @error('num')
       <small style="color:#FF0000 ">*{{$message}}</small><br>
        @enderror
        <input type="submit" class="btn btn-success" name="boto" value="filtra"><br/>

        <div class="well">
            <div class="table-responsive">
                <table class="table ">
                    <thead class="thead">
                        <tr>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">Teléfono</th>
                            <th style="text-align:center">Correo</th>
                            <th style="text-align:center">Dirección</th>
                            @if(session('rol')>2)
                                <th colspan="4" style="text-align:center">Acciones</th>
                            @endif
                    </thead>
                    <tbody>
                        @foreach($proveedor as $provee)
                        <tr>
                            <td>{{$provee->nombre}}</td>
                            <td>{{$provee->telefono}}</td>
                            <td>{{$provee->correo}}</td>
                            <td>{{$provee->direccion}}</td>
                            @if(session('rol')>2)
                                <td>
                                    <a title ="Editar" class="btn btn-warning active" aria-current="page" href="EditarPro/{{$provee->proveedor}}" type="submit"><i class="bi bi-pencil-square"></i></a>
                                </td>
                                <td>
                                    <a title ="Eliminar" class="btn btn-danger active" aria-current="page" href="EliminarPro/{{$provee->proveedor}}" type="submit"><i class="bi bi-trash-fill"></i></a></a>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $proveedor->links() !!}
            </div>
        </div>
    </form>
</div>
@endsection
