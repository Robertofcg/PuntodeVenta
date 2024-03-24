<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\venta\VentaModel;
use App\Models\venta\DetalleVentaModel;
use App\Models\producto\ProductoModel;
use App\Rules\noDecimal;
use App\Rules\precio;
use Illuminate\Support\Facades\DB;
use App\util\productoUtil;
use App\Rules\nula;
class ventas extends Controller
{
    private $arr;
    private $dat;

    public function buscar(Request $p)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $p->validate
        ([
            'codigopro'  => 'required',
        ]);
        $sql="SELECT m.nombre as marca,
        p.nombre_producto as producto,p.codigo as codigo,p.precio_unitario as precio,
        p.stock,p.modelo,descripcion
        from marca as m, producto as p, proveedor as p2, categoria as c
        where m.idMarca = p.idMarca and p2.proveedor = p.proveedor and p.Categoria = c.codigo
        and p.nombre_producto LIKE '%$p->codigopro%'
        ORDER BY p.nombre_producto ASC";
        $lis= DB::select($sql);
        $p->validate
        ([
            'nulo'  => [new nula($lis)]
        ]);
        session(['value' => $lis]);
        $ver=[
            'opcion'=> session('value'),
            'lista' => session('arr')

        ];
        /*empleadoModel::select('idPersona','nombre','apellidoP',
        'apellidoM','telefono','correo','activo','puesto')->get();*/
        return view('Principal')->with('opcion',$ver);

    }
    public function vender(Request $p)
    {

        if(session('rol')<1)
        {
            return view('/nula');
        }
        $sql="SELECT m.nombre as marca,
        p.nombre_producto as producto,p.codigo as codigo,p.precio_unitario as precio, p.precio_compra as preciocom, 
        p.stock,p.modelo,descripcion
        from marca as m, producto as p, proveedor as p2, categoria as c
        where m.idMarca = p.idMarca and p2.proveedor = p.proveedor and p.Categoria = c.codigo
        and p.codigo = '$p->codigo'
        ORDER BY p.nombre_producto ASC";
        $dato=DB::select($sql);
        $nu=new productoUtil();
        $nu->marca=$dato[0]->marca;
        $nu->producto=$dato[0]->producto;
        $nu->codigo=$dato[0]->codigo;
        $nu->precio=$dato[0]->precio;
        $nu->preciocom=$dato[0]->preciocom;
        $nu->stock=$dato[0]->stock;
        $nu->modelo=$dato[0]->modelo;
        $nu->descripcion=$dato[0]->descripcion;
        $nu->cantida=$p->cantidad;
        $a=array($nu);


        if(!is_null(session('arr')))
        {
            foreach(session('arr') as $li)
            {
                $this->arr[]=$li;
                //$this->arr[]=session('arr')[0];
            }
        }
        $this->arr[]=$a[0];
        session(['monto' => session('monto')+($p->cantidad * $nu->precio)]);
        //session(['arr' => $this->arr[]=$a[0]]);
        session(['arr' => $this->arr]);
        $data=[
            'opcion'=> session('value'),
            'lista' => session('arr')
        ];
        $this->dat= $data;
        return view('Principal')->with('opcion',$data);
    }
    public function pventa()
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $prodp="0.0";
        $prod = ProductoModel::select('*')
        ->from('producto')
        ->where('codigo','0')
        ->first();
        if(is_null($prod))
	    {

	    }
        else
        {

        }
        return view('principal')->with('producto',$prod);
    }

    public function realizar(Request $p)
    {
        $p->validate
        ([
            'pago'  => 'required',
        ]);
        if(session('rol')<1)
        {
            return view('/nula');
        }
        VentaModel::create
        ([
            'fecha_venta' =>date("Y-m-d"),
            'idPersona' => session("emp")->getId()
        ]);
        $sql="SELECT count(last_insert_id()) as id from venta";
        $llave=DB::select($sql);

        $ql2="INSERT INTO detalle_venta (codigo, cantidad, idVenta, monto) VALUES ('00T', '5', '1', '500');";
        $venta= $llave[0]->id;
        foreach(session('arr') as $dato=>$x)
        {   


            $costo=$x->cantida * $x->precio;
            $ql2="INSERT INTO detalle_venta (codigo, cantidad, idVenta, monto) VALUES ($x->codigo,$x->cantida,$venta,$costo)";
            //echo $x->cantida;
            DB::select($ql2);
            //echo $ql2;
            $ql3="SELECT stock FROM producto where codigo = $x->codigo ";
            
            $prod= DB::select($ql3);
            
            $var = $prod[0]->stock;
            $cant= $x->cantida;
            
            $result= $var-$cant;
            
            $ql4="UPDATE producto set stock = '$result' where codigo = '$x->codigo'";
            DB::update($ql4);
        }
        session(['monto' => 0.0]);
        session(['arr' => null]);
        session(['value' => null]);
        /*foreach(session('arr') as $dato=>$x)
        {
            DetalleVentaModel::create
            ([
                'codigo' => $x->codigo,
                'cantidad' => $x->cantida,
                'idVenta' => $llave[0]->id,
                'monto' => $x->cantida * $x->precio
            ]);
        }*/
        return view('principal');
    }

    public function carrito(){
    if(!is_null(session('arr')))
    {
        foreach(session('arr') as $li)
        {
            $this->arr[]=$li;
            //$this->arr[]=session('arr')[0];
        }
    }

    session(['arr' => $this->arr]);
    $data=[
        'opcion'=> session('value'),
        'lista' => session('arr')
    ];
    $this->dat= $data;
    return view('carrito')->with('opcion',$data);
    }

    public function tic(){
        if(!is_null(session('arr')))
        {
            foreach(session('arr') as $li)
            {
                $this->arr[]=$li;
                //$this->arr[]=session('arr')[0];
            }
        }

        session(['arr' => $this->arr]);
        $data=[
            'opcion'=> session('value'),
            'lista' => session('arr')
        ];
        $this->dat= $data;
        return view('Ticket')->with('opcion',$data);
        }


}
