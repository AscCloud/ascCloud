<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSucursalRequest;
use App\Http\Requests\UpdateSucursalRequest;
use App\Repositories\SucursalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Flash;
use Response;
use App\Models\Empresa;
use App\Models\Sucursal;

class SucursalController extends AppBaseController
{
    /** @var  SucursalRepository */
    private $sucursalRepository;

    public function __construct(SucursalRepository $sucursalRepo)
    {
        $this->middleware('auth');
        $this->middleware('administrador');
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
        $empresas=Empresa::all();
        $empresa=new Empresa();
        $empresa->id=0;
        $empresa->nombre_empresa="---Seleccione---";
        $empresas->push($empresa);
        $emp=$empresas->sortBy('id')->pluck('nombre_empresa','id');
        return view('sucursals.create')->with('emp', $emp);
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
        // $input = $request->all();

        // $sucursal = $this->sucursalRepository->create($input);
        $sucursal = new Sucursal();
        if($request->hasFile('img_sucursal')){
            $path=Storage::disk('public')->put('image/sucursal',$request->file('img_sucursal'));
            $sucursal->img_sucursal=asset($path);
        }
        $sucursal->nombre_sucursal=$request->nombre_sucursal;
        $sucursal->direccion_sucursal=$request->direccion_sucursal;
        $sucursal->telefono_sucursal=$request->telefono_sucursal;
        $sucursal->establecimiento_sucursal=$request->establecimiento_sucursal;
        $sucursal->punto_emision_sucursal=$request->punto_emision_sucursal;
        $sucursal->empresa_id=$request->empresa_id;
        $sucursal->save();
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
        $empresas=Empresa::all();
        $empresa=new Empresa();
        $empresa->id=0;
        $empresa->nombre_empresa="---Seleccione---";
        $empresas->push($empresa);
        $emp=$empresas->sortBy('id')->pluck('nombre_empresa','id');

        if (empty($sucursal)) {
            Flash::error('Sucursal not found');

            return redirect(route('sucursals.index'));
        }

        return view('sucursals.edit')->with('sucursal', $sucursal)->with('emp', $emp);
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

        if($request->hasFile('img_sucursal')){
            $path=Storage::disk('public')->put('image/sucursal',$request->file('img_sucursal'));
            $sucursal->img_sucursal=asset($path);
        }
        $sucursal->nombre_sucursal=$request->nombre_sucursal;
        $sucursal->direccion_sucursal=$request->direccion_sucursal;
        $sucursal->telefono_sucursal=$request->telefono_sucursal;
        $sucursal->establecimiento_sucursal=$request->establecimiento_sucursal;
        $sucursal->punto_emision_sucursal=$request->punto_emision_sucursal;
        $sucursal->empresa_id=$request->empresa_id;
        $sucursal->save();

        // $sucursal = $this->sucursalRepository->update($request->all(), $id);

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

    public function empresas($id){
        $sucursales=Sucursal::where('empresa_id',$id)->get();
        if(empty($sucursales)){
            return "-1";
        }
        return $sucursales;//
    }
}
