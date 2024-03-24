<?php

namespace App\Http\Controllers\producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria\categoriaModel;
use App\Models\marca\MarcaModel;
use App\Models\Proveedor\proveedorModel;
use App\Models\producto\ProductoModel;
use App\Rules\noDecimal;
use App\Rules\precio;
use Illuminate\Support\Facades\DB;
class Producto extends Controller
{
    public function llenado()
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $marca=MarcaModel::select('nombre','idMarca')->get();
        $proveedor=proveedorModel::select('nombre','proveedor')->get();
        $categoria=categoriaModel::select('codigo','nombreCat')->get();
        $ver=[
            'cat' => $categoria,
            'mar' => $marca,
            'prov' =>$proveedor
        ];
        return view('/ProductosR')->with('datos',$ver);
    }
    public function Registro(Request $p)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $p->validate
        ([
            'nombre'  => 'required',
            'descripcion' => 'required',
            'punitario'  => 'required',
            'stock'    => 'required',
            'pcompra'    => 'required',
            'categoria'     => 'required',
            'provee'    => 'required',
            'marca'  => 'required',
            'modelo'  => 'required'
        ]);
        $p->validate
        ([
            'stock'    => new noDecimal(),
            'pcompra'  => new precio(number_format($p->pcompra), number_format($p->punitario,2))
        ]);
        $nombre     = $p->nombre;
        $descrip    = $p->descripcion;
        $punitario  = number_format($p->punitario,2);
        $stock      = (int)$p->stock;
        $pcompra    = number_format($p->pcompra);
        $categoria  = $p->categoria;
        $provee     = $p->provee;
        $marca      = $p->marca;
        $modelo     = $p->modelo;
        $idPro='0';
        if(strlen($modelo)< 5)
        {
            $idPro=substr($nombre, 0, 5).$modelo.$categoria.$marca;
        }
        else{
            $idPro=substr($nombre, 0, 5).substr($modelo, 0, 5).$categoria.$marca;
        }

        ProductoModel::create
        ([
            'codigo'            =>$idPro,
            'descripcion'       =>$descrip,
            'proveedor'         =>$provee,
            'idMarca'           =>$marca,
            'modelo'            =>$modelo,
            'nombre_producto'   =>$nombre,
            'precio_unitario'   =>$punitario,
            'stock'             =>$stock,
            'precio_compra'     =>$pcompra,
            'Categoria'         =>$categoria
        ]);
        return redirect()->to('/RegistroP')->with('alert'," registrado");
    }

    public function EliminarProducto($prod)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $bor=ProductoModel::select('*')->
        where('codigo',$prod)
        ->delete();
        return redirect()->to('/listaProducto')->with('alert'," ");
    }

    public function cambia(Request $p){
        $p->validate
        ([
            'num' => 'required'
        ]);
        session(['ver' => $p->num]);
        return redirect()->to('/listaProducto');
    }


    public function listar()
    {   
        $ver = session('ver');
        if(session('rol')<1)
        {
            return view('/nula');
        }
        /*$sql="SELECT m.nombre as marca,p2.nombre as proveedor,
        p.nombre_producto as producto,p.codigo as codigo,p.precio_unitario as precio,
        p.stock, c.nombreCat as categoria,p.modelo,descripcion
        from marca as m, producto as p, proveedor as p2, categoria as c
        where m.idMarca = p.idMarca and p2.proveedor = p.proveedor and p.Categoria = c.codigo
        ORDER BY p.nombre_producto ASC";
        $ver=DB::select($sql);
        //$ver=DB::table('marca')->paginate(2);
        //paginate($ver);
        //return $ver;
        //$ver->paginate(15);*/

        $producto = DB::table('producto')
        ->join('marca', 'marca.idMarca', '=', 'producto.idMarca')
        ->join('proveedor', 'producto.proveedor', '=', 'proveedor.proveedor')
        ->join('categoria', 'categoria.codigo', '=', 'producto.Categoria')
        ->select('marca.nombre as marca','proveedor.nombre as proveedor',
        'producto.nombre_producto as producto','producto.codigo as codigo','producto.precio_unitario as precio',
        'producto.stock', 'categoria.nombreCat as categoria','producto.modelo','producto.descripcion')
        ->orderBy('producto')
        ->paginate($ver);
        return view('ProductosEl',compact('producto'));//->with('producto',compact('ver'));
    }

    public function EditarProducto($prod)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        /*$produc = ProductoModel::select('*')
        ->from('producto')
        ->where('codigo',$prod)
        ->first();*/
        /*$sql="SELECT m.nombre as marca,p2.nombre as proveedor,
        p.nombre_producto as prod,p.codigo as codigo,p.precio_unitario as precio,
        p.stock, c.nombreCat as categoria,p.modelo,descripcion,
        p.precio_compra as compra,
        p.Categoria as idCat, p.idMarca, p.proveedor as idProv
        from marca as m, producto as p, proveedor as p2, categoria as c
        where p.codigo=$prod and m.idMarca = p.idMarca and p2.proveedor = p.proveedor and p.Categoria = c.codigo
        ORDER BY p.nombre_producto ASC";
        $produc=DB::select($sql);*/

        $sql="SELECT m.nombre as marca,p2.nombre as proveedor,
        p.nombre_producto as prod,p.codigo as codigo,p.precio_unitario as precio,
        p.stock, c.nombreCat as categoria,p.modelo,descripcion,
        p.precio_compra as compra,
        p.Categoria as idCat, p.idMarca, p.proveedor as idProv
        from marca as m, producto as p, proveedor as p2, categoria as c
        where p.codigo=? and m.idMarca = p.idMarca and p2.proveedor = p.proveedor and p.Categoria = c.codigo
        ORDER BY p.nombre_producto ASC";
        $produc=DB::select($sql,[$prod]);

        $marca=MarcaModel::select('nombre','idMarca')->get();
        $proveedor=proveedorModel::select('nombre','proveedor')->get();
        $categoria=categoriaModel::select('codigo','nombreCat')->get();
        $ver=[
            "producto" => $produc,
            'cat' => $categoria,
            'mar' => $marca,
            'prov' =>$proveedor
        ];
        return view('ProductosE')->with('producto',$ver);
    }
    public function ActualizaProducto(Request $pr)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $pr->validate
        ([
            'nombre'  => 'required',
            'descripcion' => 'required',
            'punitario'  => 'required',
            'stock'    => 'required',
            'pcompra'    => 'required',
            'categoria'     => 'required',
            'provee'    => 'required',
            'marca'  => 'required',
            'modelo'  => 'required'
        ]);
        $pr->validate
        ([
            'stock'    => new noDecimal(),
            'pcompra'  => new precio(number_format($pr->pcompra), number_format($pr->punitario,2))
        ]);
        $nombre     = $pr->nombre;
        $descrip    = $pr->descripcion;
        $punitario  = number_format($pr->punitario,2);
        $stock      = (int)$pr->stock;
        $pcompra    = number_format($pr->pcompra);
        $categoria  = $pr->categoria;
        $provee     = $pr->provee;
        $marca      = $pr->marca;
        $modelo     = $pr->modelo;
        $idPro='0';
        if(strlen($modelo)< 5)
        {
            $idPro=substr($nombre, 0, 5).$modelo.$categoria.$marca;
        }
        else{
            $idPro=substr($nombre, 0, 5).substr($modelo, 0, 5).$categoria.$marca;
        }
        //'codigo','proveedor','descripcion','idMarca','modelo','nombre_producto',
    //'precio_unitario','stock','precio_compra','Categoria'
        $sql="UPDATE producto
        set
        proveedor = ?,
        descripcion = ?,
        idMarca = ?,
        modelo = ?,
        nombre_producto = ?,
        precio_unitario = ?,
        stock = ?,
        precio_compra = ?,
        Categoria = ?
        where codigo = ?";
        DB::update($sql, [$provee,$descrip,$marca,$modelo,$nombre,$punitario,$stock,$pcompra,$categoria,$pr->id]);
        /*$updating= DB::table('producto')
        ->where('codigo',$codigo)
        ->update([

            'proveedor'         =>$provee,
            'idMarca'           =>$marca,
            'modelo'            =>$modelo,
            'nombre_producto'   =>$nombre,
            'precio_unitario'   =>$punitario,
            'stock'             =>$stock,
            'precio_compra'     =>$pcompra,
            'Categoria'         =>$categoria

        ]);*/

        //return redirect()->to('/listaProducto');
        return redirect()->to('/listaProducto')->with('alert2'," ");
    }
    /*public function buscar(Request $p)
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $p->validate
        ([
            'codigopro'  => 'required',
            'stock'  => 'required'
        ]);
        return $p;
        /*
        $prodp="0";
        $p->validate
        ([
            'codigopro'  => 'required',
            'stock'    => 'required'
        ]);
        $p->validate
        ([
            'stock'    => new noDecimal(),
        ]);
        $codigopro     = $p->codigopro;
        $stock      = (int)$p->stock;

        $prod = ProductoModel::select('*')
        ->from('producto')
        ->where('codigo',$codigopro)
        ->first();
        return view('principal')->with('producto',$prodp);
    }*/

    /*public function pventa()
    {
        if(session('rol')<1)
        {
            return view('/nula');
        }
        $prodp="0.0";
        //guarda();
        return view('principal')->with('producto',$prodp);
    }*/

}
?>

