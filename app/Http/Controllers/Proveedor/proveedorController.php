<?php

namespace App\Http\Controllers\Proveedor;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedor\proveedorModel;
class proveedorController extends Controller
{

    //Registrar proveedores
    public function regisPro(Request $p)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
            $p->validate
            ([
                'nombre'  => 'required',
                'telefono'    => 'required|digits:10',
                'correo'    => 'required|email',
                'direccion'  => 'required'
            ]);

            $nombre  = strtoupper($p->nombre);
            $cel    =  $p->telefono;
            $correo    = $p->correo;
            $direccion =strtoupper($p->direccion);

            $proveedor= proveedorModel::select('*')->
            orderBy('NumeroRegistro','DESC')
            ->first();
            if (empty($proveedor)) {
                $numero = 1;
            }
            else{$numero = $proveedor->NumeroRegistro+1;}
            proveedorModel::create
            ([
                'proveedor'   => "PROV".$numero,
                'nombre'        => $nombre,
                'telefono'      => $cel,
                'correo'        => $correo,
                'direccion'      => $direccion,
            ]);
            return redirect()->to('/RegistroProvee')->with('alert',"Proveedor registrado");
        }



        public function cambia(Request $p){
            $p->validate
            ([
                'num' => 'required'
            ]);
            session(['verprov' => $p->num]);
            return redirect()->to('/EliminarProvee');
        }

    //Modificar proveedor
    public function EditarPro($pro)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $prove = proveedorModel::select('proveedor','nombre','telefono',
        'correo','direccion')
        ->from('proveedor')
        ->where('proveedor',$pro)
        ->first();
        return view('ProveedorE')->with('proveedor',$prove);
    }


    public function ActualizaPro(Request $pr)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $pr->validate
        ([
            'nombre'    => 'required',
            'telefono'  => 'required|digits:10',
            'correo'    => 'required|email',
            'direccion'  => 'required'
        ]);
        $nombre  = strtoupper($pr->nombre);
        $cel    =  $pr->telefono;
        $correo    = $pr->correo;
        $direccion = strtoupper($pr->direccion);
        proveedorModel::select('*')
        ->where('proveedor',$pr->id)
        ->update
        ([
            'nombre' => $nombre,
            'telefono' =>$cel,
            'correo' => $correo,
            'direccion' => $direccion
        ]);
        //return redirect()->to('/EliminarProvee');
        return redirect()->to('/EliminarProvee')->with('alert2'," ");;
    }

    //Eliminar proveedor
    public function EliminarProveedor($pro)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }

        $bor=proveedorModel::select('*')->
        where('proveedor',$pro)
        ->delete();
        return redirect()->to('/EliminarProvee')->with('alert'," ");
    }


    //Mostrar proveedores
    public function Mostrar()
    {
        $ver = session('verprov');
        if(session('rol')<1)
        {
            return view('/nula');
        }

        
        $proveedor=proveedorModel::select('proveedor','nombre','telefono',
        'correo','direccion')-> orderBy('NumeroRegistro','ASC')
        ->paginate($ver);
        return view('ProveedorEl', compact('proveedor'));

    }
}
