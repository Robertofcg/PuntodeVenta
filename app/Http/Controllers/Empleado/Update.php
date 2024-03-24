<?php

namespace App\Http\Controllers\Empleado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\empleado\empleadoModel;
use App\Rules\PassEquals;
class Update extends Controller
{
    public function Editar($usr)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $ver = empleadoModel::select('idPersona','nombre','apellidoP',
        'apellidoM','telefono','correo','puesto')
        ->from('persona')
        ->where('idPersona',$usr)->where("activo",1)
        ->first();
        return view('EditaEmpleado')->with('empleado',$ver);
    }
    public function actualizar(Request $p)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $p->validate
        ([
            'nombre'    => 'required',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'telefono'  => 'required|digits:10',
            'correo'    => 'required|email',
            'password'  => 'required',
            'confirma'  => 'required',
            'puesto'    => 'required'
        ]);
        $password  = md5($p->password);
        $confirma  = md5($p->confirma);
        $p->validate([
            'confirma' => [new PassEquals($confirma,$password)]
        ]);
        $nombre  = strtoupper($p->nombre);
        $ap_p =strtoupper($p->apellidop);
        $ap_m =strtoupper($p->apellidom);
        $cel    =  $p->telefono;
        $correo    = $p->correo;
        $puesto = strtoupper($p->puesto);

        empleadoModel::select('*')
        ->where('idPersona',$p->id)
        ->update
        ([
            'nombre' => $nombre,
            'apellidoP' =>$ap_p,
            'apellidoM' =>$ap_m,
            'telefono' =>$cel,
            'correo' => $correo,
            'password' => $password,
            'puesto' => $puesto
        ]);
        //return redirect()->to('/ListaEmp');
        return redirect()->to('/ListaEmp')->with("alert2"," ");
    }
    public function EliminarEmpleado($usr)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $bor=empleadoModel::select('*')->
        where('idPersona',$usr)
        ->delete();
        return redirect()->to('/ListaEmp')->with("alert"," ");
    }
    public function BajaEmpleado($usr)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        empleadoModel::select('*')
        ->where('idPersona',$usr)
        ->update
        ([
            'activo' => 0,
        ]);
        return redirect()->to('/ListaEmp');
    }
    public function RealtaEmpleado($usr)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        empleadoModel::select('*')
        ->where('idPersona',$usr)
        ->update
        ([
            'activo' => 1,
        ]);
        return redirect()->to('/ListaEmp');
    }
}
