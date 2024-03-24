<?php

namespace App\Http\Controllers\Empleado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\empleado\empleadoModel;
use App\Rules\inactivo;
use App\Rules\login as RulesLogin;
use App\Rules\PassEquals;
use App\util\empleado;

class login extends Controller
{

    public function acceso(request $p)
    {   session(['ver' => 5]);
        session(['verprov' => 3]);
        session(['veremp' => 3]);
        $p->validate
        (
            [
                'usuario' => 'required',
                'password'=> 'required'
            ]
        );
        $user = $p->usuario;
        $pass = md5($p->password);

        $ver = empleadoModel::select('idPersona','password','activo','puesto','nombre')
        ->from('persona')
        ->where('idPersona',$user)
        ->first();


        $p->validate
        (
            [
                'denegado' => [new RulesLogin($ver!=null)]
            ]
        );
        $p->validate
        (
            [
                'denegado' => [new PassEquals($ver->password,$pass)]
            ]
        );
        $p->validate
        (
            [
                'denegado' => [new inactivo($ver->activo)]
            ]
        );
        session(['emp' => new empleado($ver->idPersona,$ver->nombre)]);
        switch ($ver->puesto)
        {
            case "ADMINISTRADOR":
                session(['rol' => 3]);
                break;
            case "VENDEDOR":
                session(['rol' => 2]);
                break;
            case "REPARTIDOR":
                session(['rol' => 1]);
                break;
            default:
                return 'no enconctrado';
        }
        if(session('rol')>1)
        {
            session(['monto' => 0.0]);
            session(['arr' => null]);
            session(['value' => null]);
            return redirect()->to('/principal#no-back-button');
        }
        else
            return redirect()->to('/listaProducto#no-back-button');
    }
    public function salir()
    {
        session(['rol' => 0]);
        session(['emp' => null]);
        return redirect()->to('/#no-back-button');
    }

}
