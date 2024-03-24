@extends('Listas')
@section('title')
<title>Listas de empleados</title>
@endsection

@section('listas')
<!--Formulario--------------->
<div class="col-sm-12 col-lg-10 col-md-auto columna">
<form  novalidate action="{{ url('filtroemp') }}" method="get" class="formm  my-5" id="Formulario">
    <div class="formm  my-5" id="Formulario">
        @csrf
        @if (session('alert'))
        <div class="alert alert-success text-center h5" role="alert">
            El empleado se ha eliminado con éxito
        </div>
        @endif
        @if (session('alert2'))
        <div class="alert alert-success text-center h5" role="alert" style="color:#000000; background-color: #ADD8E6;">
            El empleado se ha actualizado con éxito
        </div>
        @endif
        <h2 class="font-weight-bold mb-3">Modificar Empleados</h2>

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
                            <th style="text-align:center">Num</th>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">Ap Paterno</th>
                            <th style="text-align:center">Ap Materno</th>
                            <th style="text-align:center">Correo</th>
                            <th style="text-align:center">Teléfono</th>
                            <th style="text-align:center">Puesto</th>
                            @if(session('rol')>2)
                                <th colspan="6" style="text-align:center">Acciones</th>
                            @endif
                    </thead>
                    <?php $con=1; ?>
                    @foreach ($empleado as $x)
                    <tbody>
                        <tr>
                            <td><?php echo $con ?></td>
                            <td>{{$x->nombre}}</td>
                            <td>{{$x->apellidoP}}</td>
                            <td>{{$x->apellidoM}}</td>
                            <td>{{$x->telefono}}</td>
                            <td>{{$x->correo}}</td>
                            <td>{{$x->puesto}}</td>
                            @if(session('rol')>2)
                                <td><a title ="Editar" class="btn btn-warning active" aria-current="page"  href="editarE/{{$x->idPersona}}" type="submit"><i class="bi bi-pencil-square"></i></a></td>
                                @if($x->activo)
                                    <td><a title ="Dar de baja" class="btn btn-primary active" aria-current="page" href="BajaEmp/{{$x->idPersona}}" type="submit"><i class="bi bi-x-square-fill"></i></a></td>
                                @else
                                    <td><a title ="Dar de alta" class="btn btn-success active" aria-current="page" href="RealtaEmp/{{$x->idPersona}}" type="submit"><i class="bi bi-check-lg"></i></a></td>
                                @endif
                                    <td><a title ="Eliminar" class="btn btn-danger active" aria-current="page" href="EliminarEmp/{{$x->idPersona}}" type="submit"><i class="bi bi-trash-fill"></i></a></td>
                            @endif
                        </tr>
                    </tbody>
                    <?php $con=$con+1; ?>
                    @endforeach
                </table>
                {!! $empleado->links() !!}
                
                
                

            </div>
        </div>
    </div>
    </form>
</div>
@endsection
