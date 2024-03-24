<?php

namespace App\Http\Controllers\Empleado;
use App\Http\Controllers\Controller;
use App\Models\empleado\empleadoModel;
use Illuminate\Http\Request;
class ListaEmpleado extends Controller
{
    public function listar()
    {   $ver = session('veremp');
        if(session('rol')<1)
        {
            return view('/nula');
        } 
        $empleado=empleadoModel::select('idPersona','nombre','apellidoP',
        'apellidoM','telefono','correo','activo','puesto')
        ->paginate($ver);
        return view('EmpleadosEl', compact('empleado'));;
    }


    public function cambia(Request $p){
        $p->validate
        ([
            'num' => 'required'
        ]);
        session(['veremp' => $p->num]);
        return redirect()->to('/ListaEmp');
    }
}
