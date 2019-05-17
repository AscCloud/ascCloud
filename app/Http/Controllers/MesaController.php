<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMesaRequest;
use App\Http\Requests\UpdateMesaRequest;
use App\Repositories\MesaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mesa;
use Flash;
use Response;
use App\Models\Planta;
use App\Models\Sucursal;

class MesaController extends AppBaseController
{
    /** @var  MesaRepository */
    private $mesaRepository;

    public function __construct(MesaRepository $mesaRepo)
    {
        $this->middleware('auth');
        $this->middleware('administrador');
        $this->mesaRepository = $mesaRepo;
    }

    /**
     * Display a listing of the Mesa.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $personal=Auth::user();
        $mesas = Mesa::where('sucursal_id','=',$personal->personal->sucursal_id)->get();

        return view('mesas.index')
            ->with('mesas', $mesas);
    }

    /**
     * Show the form for creating a new Mesa.
     *
     * @return Response
     */
    public function create()
    {
        $personal=Auth::user();
        $plantas=Planta::where('sucursal_id','=',$personal->personal->sucursal_id)->get();
        $planta= new Planta();
        $planta->id=0;
        $planta->nombre_planta="---Selecione---";
        $plantas->push($planta);
        $plant=$plantas->sortBy('id')->pluck('nombre_planta','id');
        $sucursals=Sucursal::all();
        $sucursal=new Sucursal();
        $sucursal->id=0;
        $sucursal->nombre_sucursal="---Seleccione---";
        $sucursals->push($sucursal);
        $suc=$sucursals->sortBy('id')->pluck('nombre_sucursal','id');
        return view('mesas.create')->with('plant',$plant)->with('suc', $suc);
    }

    /**
     * Store a newly created Mesa in storage.
     *
     * @param CreateMesaRequest $request
     *
     * @return Response
     */
    public function store(CreateMesaRequest $request)
    {
        $input = $request->all();

        $mesa = $this->mesaRepository->create($input);

        Flash::success('Mesa saved successfully.');

        return redirect(route('mesas.index'));
    }

    /**
     * Display the specified Mesa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mesa = $this->mesaRepository->find($id);

        if (empty($mesa)) {
            Flash::error('Mesa not found');

            return redirect(route('mesas.index'));
        }

        return view('mesas.show')->with('mesa', $mesa);
    }

    /**
     * Show the form for editing the specified Mesa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personal=Auth::user();
        $mesa = $this->mesaRepository->find($id);
        $plantas=Planta::where('sucursal_id','=',$personal->personal->sucursal_id)->get();
        $planta= new Planta();
        $planta->id=0;
        $planta->nombre_planta="---Selecione---";
        $plantas->push($planta);
        $plant=$plantas->sortBy('id')->pluck('nombre_planta','id');
        $sucursals=Sucursal::all();
        $sucursal=new Sucursal();
        $sucursal->id=0;
        $sucursal->nombre_sucursal="---Seleccione---";
        $sucursals->push($sucursal);
        $suc=$sucursals->sortBy('id')->pluck('nombre_sucursal','id');
        if (empty($mesa)) {
            Flash::error('Mesa not found');

            return redirect(route('mesas.index'));
        }

        return view('mesas.edit')->with('mesa', $mesa)->with('plant',$plant)->with('suc', $suc);
    }

    /**
     * Update the specified Mesa in storage.
     *
     * @param int $id
     * @param UpdateMesaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMesaRequest $request)
    {
        $mesa = $this->mesaRepository->find($id);

        if (empty($mesa)) {
            Flash::error('Mesa not found');

            return redirect(route('mesas.index'));
        }

        $mesa = $this->mesaRepository->update($request->all(), $id);

        Flash::success('Mesa updated successfully.');

        return redirect(route('mesas.index'));
    }

    /**
     * Remove the specified Mesa from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mesa = $this->mesaRepository->find($id);

        if (empty($mesa)) {
            Flash::error('Mesa not found');

            return redirect(route('mesas.index'));
        }

        $this->mesaRepository->delete($id);

        Flash::success('Mesa deleted successfully.');

        return redirect(route('mesas.index'));
    }
}
