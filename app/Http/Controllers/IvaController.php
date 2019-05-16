<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIvaRequest;
use App\Http\Requests\UpdateIvaRequest;
use App\Repositories\IvaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class IvaController extends AppBaseController
{
    /** @var  IvaRepository */
    private $ivaRepository;

    public function __construct(IvaRepository $ivaRepo)
    {
        $this->middleware('auth');
        $this->ivaRepository = $ivaRepo;
    }

    /**
     * Display a listing of the Iva.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ivas = $this->ivaRepository->all();

        return view('ivas.index')
            ->with('ivas', $ivas);
    }

    /**
     * Show the form for creating a new Iva.
     *
     * @return Response
     */
    public function create()
    {
        return view('ivas.create');
    }

    /**
     * Store a newly created Iva in storage.
     *
     * @param CreateIvaRequest $request
     *
     * @return Response
     */
    public function store(CreateIvaRequest $request)
    {
        $input = $request->all();

        $iva = $this->ivaRepository->create($input);

        Flash::success('Iva saved successfully.');

        return redirect(route('ivas.index'));
    }

    /**
     * Display the specified Iva.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $iva = $this->ivaRepository->find($id);

        if (empty($iva)) {
            Flash::error('Iva not found');

            return redirect(route('ivas.index'));
        }

        return view('ivas.show')->with('iva', $iva);
    }

    /**
     * Show the form for editing the specified Iva.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $iva = $this->ivaRepository->find($id);

        if (empty($iva)) {
            Flash::error('Iva not found');

            return redirect(route('ivas.index'));
        }

        return view('ivas.edit')->with('iva', $iva);
    }

    /**
     * Update the specified Iva in storage.
     *
     * @param int $id
     * @param UpdateIvaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIvaRequest $request)
    {
        $iva = $this->ivaRepository->find($id);

        if (empty($iva)) {
            Flash::error('Iva not found');

            return redirect(route('ivas.index'));
        }

        $iva = $this->ivaRepository->update($request->all(), $id);

        Flash::success('Iva updated successfully.');

        return redirect(route('ivas.index'));
    }

    /**
     * Remove the specified Iva from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $iva = $this->ivaRepository->find($id);

        if (empty($iva)) {
            Flash::error('Iva not found');

            return redirect(route('ivas.index'));
        }

        $this->ivaRepository->delete($id);

        Flash::success('Iva deleted successfully.');

        return redirect(route('ivas.index'));
    }
}
