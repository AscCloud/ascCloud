<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Repositories\CategoriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Sucursal;

class CategoriaController extends AppBaseController
{
    /** @var  CategoriaRepository */
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepo)
    {
        $this->middleware('auth');
        $this->middleware('administrador');
        $this->categoriaRepository = $categoriaRepo;
    }

    /**
     * Display a listing of the Categoria.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $personal=Auth::user();
        $categorias = Categoria::where('sucursal_id','=',$personal->personal->sucursal_id)->get();

        return view('categorias.index')
            ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new Categoria.
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
        return view('categorias.create')->with('suc', $suc);
    }

    /**
     * Store a newly created Categoria in storage.
     *
     * @param CreateCategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaRequest $request)
    {
        $input = $request->all();

        $categoria = $this->categoriaRepository->create($input);

        Flash::success('Categoria saved successfully.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified Categoria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified Categoria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoria = $this->categoriaRepository->find($id);
        $sucursals=Sucursal::all();
        $sucursal=new Sucursal();
        $sucursal->id=0;
        $sucursal->nombre_sucursal="---Seleccione---";
        $sucursals->push($sucursal);
        $suc=$sucursals->sortBy('id')->pluck('nombre_sucursal','id');
        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categoria', $categoria)->with('suc', $suc);
    }

    /**
     * Update the specified Categoria in storage.
     *
     * @param int $id
     * @param UpdateCategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaRequest $request)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('categorias.index'));
        }

        $categoria = $this->categoriaRepository->update($request->all(), $id);

        Flash::success('Categoria updated successfully.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified Categoria from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('categorias.index'));
        }

        $this->categoriaRepository->delete($id);

        Flash::success('Categoria deleted successfully.');

        return redirect(route('categorias.index'));
    }
}
