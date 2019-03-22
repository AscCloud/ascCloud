<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductosRequest;
use App\Http\Requests\UpdateProductosRequest;
use App\Repositories\ProductosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Response;
use App\Models\Categoria;
use App\Models\Sucursal;

class ProductosController extends AppBaseController
{
    /** @var  ProductosRepository */
    private $productosRepository;

    public function __construct(ProductosRepository $productosRepo)
    {
        $this->productosRepository = $productosRepo;
    }

    /**
     * Display a listing of the Productos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productos = $this->productosRepository->all();

        return view('productos.index')
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new Productos.
     *
     * @return Response
     */
    public function create()
    {
        $user=Auth::user();
        $rols=Sucursal::all();
        $rol=new Sucursal();
        $rol->id=0;
        $rol->nombre_categoria="---Seleccione---";
        $rols->push($rol);
        $papel=$rols->sortBy('id')->pluck('nombre_sucursal','id');
        $cats=Categoria::where('sucursal_id','=',1)->get();
        $cat=new Categoria();
        $cat->id=0;
        $cat->nombre_categoria="---Seleccione---";
        $cats->push($cat);
        $categorias=$cats->sortBy('id')->pluck('nombre_categoria','id');
        return view('productos.create');
    }

    /**
     * Store a newly created Productos in storage.
     *
     * @param CreateProductosRequest $request
     *
     * @return Response
     */
    public function store(CreateProductosRequest $request)
    {
        $input = $request->all();

        $productos = $this->productosRepository->create($input);

        Flash::success('Productos saved successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified Productos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('productos', $productos);
    }

    /**
     * Show the form for editing the specified Productos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        return view('productos.edit')->with('productos', $productos);
    }

    /**
     * Update the specified Productos in storage.
     *
     * @param int $id
     * @param UpdateProductosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductosRequest $request)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        $productos = $this->productosRepository->update($request->all(), $id);

        Flash::success('Productos updated successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified Productos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        $this->productosRepository->delete($id);

        Flash::success('Productos deleted successfully.');

        return redirect(route('productos.index'));
    }
}
