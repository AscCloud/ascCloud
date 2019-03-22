<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSucursalRequest;
use App\Http\Requests\UpdateSucursalRequest;
use App\Repositories\SucursalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SucursalController extends AppBaseController
{
    /** @var  SucursalRepository */
    private $sucursalRepository;

    public function __construct(SucursalRepository $sucursalRepo)
    {
        $this->sucursalRepository = $sucursalRepo;
    }

    /**
     * Display a listing of the Sucursal.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sucursals = $this->sucursalRepository->all();

        return view('sucursals.index')
            ->with('sucursals', $sucursals);
    }

    /**
     * Show the form for creating a new Sucursal.
     *
     * @return Response
     */
    public function create()
    {
        return view('sucursals.create');
    }

    /**
     * Store a newly created Sucursal in storage.
     *
     * @param CreateSucursalRequest $request
     *
     * @return Response
     */
    public function store(CreateSucursalRequest $request)
    {
        $input = $request->all();

        $sucursal = $this->sucursalRepository->create($input);

        Flash::success('Sucursal saved successfully.');

        return redirect(route('sucursals.index'));
    }

    /**
     * Display the specified Sucursal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sucursal = $this->sucursalRepository->find($id);

        if (empty($sucursal)) {
            Flash::error('Sucursal not found');

            return redirect(route('sucursals.index'));
        }

        return view('sucursals.show')->with('sucursal', $sucursal);
    }

    /**
     * Show the form for editing the specified Sucursal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sucursal = $this->sucursalRepository->find($id);

        if (empty($sucursal)) {
            Flash::error('Sucursal not found');

            return redirect(route('sucursals.index'));
        }

        return view('sucursals.edit')->with('sucursal', $sucursal);
    }

    /**
     * Update the specified Sucursal in storage.
     *
     * @param int $id
     * @param UpdateSucursalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSucursalRequest $request)
    {
        $sucursal = $this->sucursalRepository->find($id);

        if (empty($sucursal)) {
            Flash::error('Sucursal not found');

            return redirect(route('sucursals.index'));
        }

        $sucursal = $this->sucursalRepository->update($request->all(), $id);

        Flash::success('Sucursal updated successfully.');

        return redirect(route('sucursals.index'));
    }

    /**
     * Remove the specified Sucursal from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sucursal = $this->sucursalRepository->find($id);

        if (empty($sucursal)) {
            Flash::error('Sucursal not found');

            return redirect(route('sucursals.index'));
        }

        $this->sucursalRepository->delete($id);

        Flash::success('Sucursal deleted successfully.');

        return redirect(route('sucursals.index'));
    }
}
