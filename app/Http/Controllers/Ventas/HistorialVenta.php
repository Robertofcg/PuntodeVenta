<?php

namespace App\Http\Controllers\Ventas;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\venta\ventaModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Rules\nula;
class HistorialVenta extends Controller
{
    public function listar()
    { 
        if(session('rol')<1)
        {
            return view('/nula');
        }

        $venta=DB::table('persona')
        ->join('venta', 'venta.idPersona', '=', 'persona.idPersona')
        ->join('detalle_venta', 'detalle_venta.idVenta', '=', 'venta.idVenta')
        ->select('codigo','venta.idVenta','nombre','fecha_venta','cantidad','monto')
        ->paginate(1);

        return view('Historial',compact('venta'));

    }

    public function filtrar(Request $p)
    {
        session(['total' => 0]);
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $p->validate
        ([
            'txtfech' => 'required'
        ]);
        $sql="SELECT d.codigo,v.idVenta,nombre,fecha_venta,cantidad,monto, pr.precio_compra
        from detalle_venta as d,venta as v , persona as p, producto as pr
        where d.codigo= pr.codigo and v.idVenta = d.idVenta and v.idPersona = p.idPersona and fecha_venta = '$p->txtfech'";
        //$sql="SELECT codigo,venta.idVenta,nombre,fecha_venta,cantidad,monto
        //FROM venta
        //INNER JOIN detalle_venta ON venta.idVenta = detalle_venta.idVenta";
        $mos=DB::select($sql);
        $total=0;
        $vendi=0;
        foreach($mos as $li)
            {

                $total += $li->monto;
                $vendi += $li->precio_compra;
            }
            session(['total' => $total]);
            session(['vendi' => $vendi]);
        return view('Historial')->with('venta',$mos);
    }


    public function filtrarrango(Request $p)
    {
        session(['total' => 0]);
        session(['vendi' => 0]);
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $p->validate
        ([
            'txtfechai' => 'required',
            'txtfechaf' => 'required'
        ]);
        $sql="SELECT d.codigo, v.idVenta,nombre,fecha_venta,cantidad,monto, pr.precio_compra
        from detalle_venta as d,venta as v , persona as p , producto as pr
        where d.codigo= pr.codigo and v.idVenta = d.idVenta and v.idPersona = p.idPersona and fecha_venta between '$p->txtfechai' and '$p->txtfechaf'";

        //$sqll="SELECT codigo, pr.precio_unitario
        //from detalle_venta as d,producto as pr
        //where d.codigo = pr.codigo and v.idPersona = p.idPersona and fecha_venta between '$p->txtfechai' and '$p->txtfechaf'";


        //$sql="SELECT codigo,venta.idVenta,nombre,fecha_venta,cantidad,monto
        //FROM venta
        //INNER JOIN detalle_venta ON venta.idVenta = detalle_venta.idVenta";
        $mos=DB::select($sql);
        $total=0;
        $vendi=0;
        foreach($mos as $li)
            {

                $total += $li->monto;
               // $vendi += $li->precio_compra;
            }
            session(['total' => $total]);
            session(['vendi' => $vendi]);
        return view('Historial')->with('venta',$mos, 'total',$total);
    }



    


}
