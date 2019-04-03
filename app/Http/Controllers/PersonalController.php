<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use App\Repositories\PersonalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Flash;
use Response;
use DB;
use App\Models\Sucursal;
use App\Models\Empresa;
use App\Models\Personal;
use App\User;
use App\Roles;

class PersonalController extends AppBaseController
{
    /** @var  PersonalRepository */
    private $personalRepository;

    public function __construct(PersonalRepository $personalRepo)
    {
        $this->personalRepository = $personalRepo;
    }

    /**
     * Display a listing of the Personal.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $personals = $this->personalRepository->all();

        return view('personals.index')
            ->with('personals', $personals);
    }

    /**
     * Show the form for creating a new Personal.
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
        $rols=Roles::all();
        $rol=new Roles();
        $rol->id=0;
        $rol->nombre_rol='---Seleccione---';
        $rols->push($rol);
        $r=$rols->sortBy('id')->pluck('nombre_rol','id');
        return view('personals.create')->with('emp', $emp)->with('r', $r);
    }

    /**
     * Store a newly created Personal in storage.
     *
     * @param CreatePersonalRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonalRequest $request)
    {
        //$input = $request->all();
        $v=Validator::make($request->all(),[
            'ruc_personal'=>['required','string','max:20'],
            'nombre_personal'=>['required','string','max:20'],
            'telefono_personal'=>['required','string','min:10', 'max:10'],
            'email_personal' => ['required', 'string', 'email', 'max:100'],
            'img_personal'=>['required','image'],
            'nacimiento_personal'=>['required','date','max:20'],
            'sucursal_id'=>['required'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'rol_id'=>['required','integer'],
        ]);
        if($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }else{
            try{
                DB::beginTransaction();
                $personal= new Personal();
                $personal->ruc_personal=$request->ruc_personal;
                $personal->nombre_personal=$request->nombre_personal;
                $personal->telefono_personal=$request->telefono_personal;
                $personal->email_personal=$request->email_personal;
                if($request->hasFile('img_personal')){
                    $path=Storage::disk('public')->put('image/personal',$request->file('img_personal'));
                    $personal->img_personal=asset($path);
                }
                $personal->nacimiento_personal=$request->nacimiento_personal;
                $personal->sucursal_id=$request->sucursal_id;
                $usuario=new User();
                $detalle=[];
                $usuario->email=$request->email_personal;
                $usuario->username=$request->username;
                $usuario->password=Hash::make($request->password);
                $usuario->rol_id=$request->rol_id;
                $detalle[]=$usuario;
                $personal->save();
                $personal->user()->saveMany($detalle);
                //$personal = $this->personalRepository->create($input);
                DB::commit();
                Flash::success('Personal saved successfully.');
                return redirect(route('personals.index'));
            }catch(\Exception $e){
                DB::rollBack();
                Flash::error('error');
                return redirect(route('personals.create'));
                return $e;
            }
        }
    }

    /**
     * Display the specified Personal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }

        return view('personals.show')->with('personal', $personal);
    }

    /**
     * Show the form for editing the specified Personal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personal = $this->personalRepository->find($id);
        $empresas=Empresa::all();
        $empresa=new Empresa();
        $empresa->id=0;
        $empresa->nombre_empresa="---Seleccione---";
        $empresas->push($empresa);
        $emp=$empresas->sortBy('id')->pluck('nombre_empresa','id');
        $rols=Roles::all();
        $rol=new Roles();
        $rol->id=0;
        $rol->nombre_rol='---Seleccione---';
        $rols->push($rol);
        $r=$rols->sortBy('id')->pluck('nombre_rol','id');
        $sucursals=Sucursal::all();
        $sucursal=new Sucursal();
        $sucursal->id=0;
        $sucursal->nombre_sucursal="---Seleccione---";
        $sucursals->push($sucursal);
        $suc=$sucursals->sortBy('id')->pluck('nombre_sucursal','id');

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }

        return view('personals.edit')->with('personal', $personal)->with('emp', $emp)->with('r', $r)->with('suc', $suc);
    }

    /**
     * Update the specified Personal in storage.
     *
     * @param int $id
     * @param UpdatePersonalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonalRequest $request)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }
        $personal->ruc_personal=$request->ruc_personal;
        $personal->nombre_personal=$request->nombre_personal;
        $personal->telefono_personal=$request->telefono_personal;
        $personal->email_personal=$request->email_personal;
        if($request->hasFile('img_personal')){
            $path=Storage::disk('public')->put('image/personal',$request->file('img_personal'));
            $personal->img_personal=asset($path);
        }
        $personal->nacimiento_personal=$request->nacimiento_personal;
        $personal->sucursal_id=$request->sucursal_id;
        $personal->save();
        //$personal = $this->personalRepository->update($request->all(), $id);

        Flash::success('Personal updated successfully.');

        return redirect(route('personals.index'));
    }

    /**
     * Remove the specified Personal from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }

        $this->personalRepository->delete($id);

        Flash::success('Personal deleted successfully.');

        return redirect(route('personals.index'));
    }

    public function todos(Request $request){
        $personals = $this->personalRepository->all();
        if(empty($personals)){
            return "-1";
        }
        return $personals;

    }
}
