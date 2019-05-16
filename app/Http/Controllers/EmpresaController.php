<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Repositories\EmpresaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Flash;
use Response;

class EmpresaController extends AppBaseController
{
    /** @var  EmpresaRepository */
    private $empresaRepository;

    public function __construct(EmpresaRepository $empresaRepo)
    {
        $this->empresaRepository = $empresaRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Empresa.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $empresas = $this->empresaRepository->all();

        return view('empresas.index')
            ->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new Empresa.
     *
     * @return Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created Empresa in storage.
     *
     * @param CreateEmpresaRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpresaRequest $request)
    {
        // $input = $request->all();
        // $empresa = $this->empresaRepository->create($input);
        $empresa= new Empresa();
        if($request->hasFile('img_empresa')){
            $path=Storage::disk('public')->put('image/empresa',$request->file('img_empresa'));
            $empresa->img_empresa=asset($path);
        }
        $empresa->nombre_empresa=$request->nombre_empresa;
        $empresa->ruc_empresa=$request->ruc_empresa;
        $empresa->save();
        Flash::success('La Empresa ha sido creada satisfactoriamente.');
        return redirect(route('empresas.index'));
    }

    /**
     * Display the specified Empresa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empresa = $this->empresaRepository->find($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('empresas.index'));
        }

        return view('empresas.show')->with('empresa', $empresa);
    }

    private function rwTmpFile($data = null)
    {
        $temp_file = tempnam(sys_get_temp_dir(), 'YaMWS');
        if ($data !== null) {
            file_put_contents($temp_file, $data);
        }
        return $temp_file;
    }

    /**
     * Show the form for editing the specified Empresa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empresa = $this->empresaRepository->find($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('empresas.index'));
        }

        return view('empresas.edit')->with('empresa', $empresa);
    }

    /**
     * Update the specified Empresa in storage.
     *
     * @param int $id
     * @param UpdateEmpresaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpresaRequest $request)
    {
        $empresa = $this->empresaRepository->find($id);

        if (empty($empresa)) {
            Flash::error('Empresa no encontrada');

            return redirect(route('empresas.index'));
        }

        if($request->hasFile('img_empresa')){
            $path=Storage::disk('public')->put('image/empresa',$request->file('img_empresa'));
            $empresa->img_empresa=asset($path);
        }
        $empresa->nombre_empresa=$request->nombre_empresa;
        $empresa->ruc_empresa=$request->ruc_empresa;
        $empresa->save();
        // $empresa = $this->empresaRepository->update($request->all(), $id);

        Flash::success('Empresa a sido actualizada satisfactoriamente.');

        return redirect(route('empresas.index'));
    }

    /**
     * Remove the specified Empresa from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empresa = $this->empresaRepository->find($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('empresas.index'));
        }

        $this->empresaRepository->delete($id);

        Flash::success('Empresa deleted successfully.');

        return redirect(route('empresas.index'));
    }
}
