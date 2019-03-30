<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Repositories\ProductoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Sucursal;
use App\Models\Categoria;
use App\Models\Producto;

class ProductoController extends AppBaseController
{
    /** @var  ProductoRepository */
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepo)
    {
        $this->productoRepository = $productoRepo;
    }

    /**
     * Display a listing of the Producto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productos = $this->productoRepository->all();

        return view('productos.index')
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new Producto.
     *
     * @return Response
     */
    public function create()
    {
        $sucursals=Sucursal::all();
        $sucursal=new Sucursal();
        $sucursal->id=0;
        $sucursal->nombre_sucursal="---Seleccione---";
        $sucursals->push($sucursal);
        $suc=$sucursals->sortBy('id')->pluck('nombre_sucursal','id');
        $categorias=Categoria::all();
        $categoria=new Categoria();
        $categoria->id=0;
        $categoria->nombre_categoria="---Seleccione---";
        $categorias->push($categoria);
        $cat=$categorias->sortBy('id')->pluck('nombre_categoria','id');
        return view('productos.create')->with('suc', $suc)->with('cat', $cat);
    }

    /**
     * Store a newly created Producto in storage.
     *
     * @param CreateProductoRequest $request
     *
     * @return Response
     */
    public function store(CreateProductoRequest $request)
    {
        //$input = $request->all();
        $producto=new Producto();
        $producto->nombre_producto=$request->nombre_producto;
        $producto->precio_producto=$request->precio_producto;
        if($request->hasFile('img_producto')){
            $personal->img_producto=$request->file('img_producto')->store('public');
        }
        $producto->iva_id=$request->iva_id;
        $producto->sucursal_id=$request->sucursal_id;
        $producto->categoria_id=$request->categoria_id;
        $producto->save();

        //$producto = $this->productoRepository->create($input);

        Flash::success('Producto saved successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified Producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified Producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $producto = $this->productoRepository->find($id);
        $sucursals=Sucursal::all();
        $sucursal=new Sucursal();
        $sucursal->id=0;
        $sucursal->nombre_sucursal="---Seleccione---";
        $sucursals->push($sucursal);
        $suc=$sucursals->sortBy('id')->pluck('nombre_sucursal','id');
        $categorias=Categoria::all();
        $categoria=new Categoria();
        $categoria->id=0;
        $categoria->nombre_categoria="---Seleccione---";
        $categorias->push($categorias);
        $cat=$categorias->sortBy('id')->pluck('nombre_categoria','id');
        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }

        return view('productos.edit')->with('producto', $producto)->with('suc', $suc)->with('cat', $cat);
    }

    /**
     * Update the specified Producto in storage.
     *
     * @param int $id
     * @param UpdateProductoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductoRequest $request)
    {
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }

        $producto->nombre_producto=$request->nombre_producto;
        $producto->precio_producto=$request->precio_producto;
        if($request->hasFile('img_producto')){
            $personal->img_producto=$request->file('img_producto')->store('public');
        }
        $producto->iva_id=$request->iva_id;
        $producto->sucursal_id=$request->sucursal_id;
        $producto->categoria_id=$request->categoria_id;
        $producto->save();

        //$producto = $this->productoRepository->update($request->all(), $id);

        Flash::success('Producto updated successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified Producto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }

        $this->productoRepository->delete($id);

        Flash::success('Producto deleted successfully.');

        return redirect(route('productos.index'));
    }
}
