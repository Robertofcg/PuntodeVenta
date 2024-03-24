<?php

namespace App\Http\Controllers\Empleado;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\empleado\empleadoModel;
use App\Rules\PassEquals;
use App\Rules\lenPass;
class altaEmpleado extends Controller
{
    public function altaP(Request $p)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $p->validate
        ([
            'user'  => 'required',
            'nombre'  => 'required',
            'apellidop'    => 'required',
            'apellidom'    => 'required',
            'telefono'     => 'required|digits:10',
            'correo'    => 'required|email',
            'password'  => 'required',
            'confirma'  => 'required',
            'puesto'  => 'required'
        ]);
        $password  = md5($p->password);
        $confirma  = md5($p->confirma);
        $p->validate([
            'password' => [new lenPass()],
            'confirma' => [new PassEquals($confirma,$password)]
        ]);
        $usuario = $p->user;
        $nombre  = strtoupper($p->nombre);
        $ap_p =strtoupper($p->apellidop);
        $ap_m =strtoupper($p->apellidom);
        $cel    =  $p->telefono;
        $correo    = $p->correo;
        $puesto = strtoupper($p->puesto);

        empleadoModel::create
        ([
            'idPersona'     => $usuario,
            'nombre'        => $nombre,
            'apellidoP'     => $ap_p,
            'apellidoM'     => $ap_m,
            'telefono'      => $cel,
            'correo'        => $correo,
            'password'      => $password,
            'activo'        => "1",
            'puesto'        => $puesto
        ]);
        return redirect()->to('/alta')->with('alert'," ");
    }
}
