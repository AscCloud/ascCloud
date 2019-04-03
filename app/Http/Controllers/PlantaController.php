<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlantaRequest;
use App\Http\Requests\UpdatePlantaRequest;
use App\Repositories\PlantaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Sucursal;

class PlantaController extends AppBaseController
{
    /** @var  PlantaRepository */
    private $plantaRepository;

    public function __construct(PlantaRepository $plantaRepo)
    {
        $this->plantaRepository = $plantaRepo;
    }

    /**
     * Display a listing of the Planta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $plantas = $this->plantaRepository->all();

        return view('plantas.index')
            ->with('plantas', $plantas);
    }

    /**
     * Show the form for creating a new Planta.
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
        return view('plantas.create')->with('suc', $suc);
    }

    /**
     * Store a newly created Planta in storage.
     *
     * @param CreatePlantaRequest $request
     *
     * @return Response
     */
    public function store(CreatePlantaRequest $request)
    {
        $input = $request->all();

        $planta = $this->plantaRepository->create($input);

        Flash::success('Planta saved successfully.');

        return redirect(route('plantas.index'));
    }

    /**
     * Display the specified Planta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $planta = $this->plantaRepository->find($id);

        if (empty($planta)) {
            Flash::error('Planta not found');

            return redirect(route('plantas.index'));
        }

        return view('plantas.show')->with('planta', $planta);
    }

    /**
     * Show the form for editing the specified Planta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $planta = $this->plantaRepository->find($id);
        $sucursals=Sucursal::all();
        $sucursal=new Sucursal();
        $sucursal->id=0;
        $sucursal->nombre_sucursal="---Seleccione---";
        $sucursals->push($sucursal);
        $suc=$sucursals->sortBy('id')->pluck('nombre_sucursal','id');

        if (empty($planta)) {
            Flash::error('Planta not found');

            return redirect(route('plantas.index'));
        }

        return view('plantas.edit')->with('planta', $planta)->with('suc', $suc);
    }

    /**
     * Update the specified Planta in storage.
     *
     * @param int $id
     * @param UpdatePlantaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlantaRequest $request)
    {
        $planta = $this->plantaRepository->find($id);

        if (empty($planta)) {
            Flash::error('Planta not found');

            return redirect(route('plantas.index'));
        }

        $planta = $this->plantaRepository->update($request->all(), $id);

        Flash::success('Planta updated successfully.');

        return redirect(route('plantas.index'));
    }

    /**
     * Remove the specified Planta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $planta = $this->plantaRepository->find($id);

        if (empty($planta)) {
            Flash::error('Planta not found');

            return redirect(route('plantas.index'));
        }

        $this->plantaRepository->delete($id);

        Flash::success('Planta deleted successfully.');

        return redirect(route('plantas.index'));
    }
}
