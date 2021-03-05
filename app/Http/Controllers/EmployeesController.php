<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//Modelos
use App\Model\Employees;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employees::withoutTrashed()->get();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Validacion para saber si los datos vienen vacios
        if($request->all() == [] || is_null($request->all())){
            return [
                'message' => 'Debe enviar los campos a guardar',
                'type' => 'error'
            ];
        }
        try {
            //Inicia la transaccion
            DB::beginTransaction();
                foreach ($request->all() as $data) {
                    $employees = new Employees();
        
                    $employees->name = $data['name'];
                    $employees->phone = $data['phone']; 
                    $employees->address = $data['address']; 
                    $employees->types_id = $data['types_id']; 
        
                    $employees->save();
                }
            //Termina la treansaccion
            DB::commit();
            
            return [
                'message' => 'Empleado guardado con exito',
                'type' => 'success'
            ];
        } catch (\Throwable $th) {
            //Termina la treansaccion con error
            DB::rollBack();
            return [
                'message' => "Algo ha salido mal, intenta de nuevo",
                'type' => 'error'
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Validacion para saber si los datos vienen vacios
        if($id == [] || is_null($id)){
            return [
                'message' => 'Debe enviar el empleado',
                'type' => 'error'
            ];
        }

        $data = Employees::find($id);

        if(is_null($data)){
            return [
                'message' => 'No se encontro el empleado',
                'type' => 'error'
            ];
        }

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Validacion para saber si los datos vienen vacios
         if($request->all() == [] || is_null($request->all())){
            return [
                'message' => 'Debe enviar los campos a actulizar',
                'type' => 'error'
            ];
        }

        try {
            //Inicia la transaccion
            DB::beginTransaction();

                $employees = Employees::find($id);

                //Validacion para saber si existe el registro
                if(is_null($employees)){
                    return [
                        'message' => 'No se encontro el empleado',
                        'type' => 'error'
                    ];
                }

                $employees->name = $request[0]['name'];
                $employees->phone = $request[0]['phone']; 
                $employees->address = $request[0]['address']; 
                $employees->types_id = $request[0]['types_id']; 

                $employees->save();
                
            //Termina la treansaccion
            DB::commit();
            
            return [
                'message' => 'Empleado actulizado con exito',
                'type' => 'success'
            ];
        } catch (\Throwable $th) {
            //Termina la treansaccion con error
            DB::rollBack();
            return [
                'message' => "Algo ha salido mal, intenta de nuevo",
                'type' => 'error'
            ];
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Validacion para saber si los datos vienen vacios
        if($id == [] || is_null($id)){
            return [
                'message' => 'Debe enviar el empleado',
                'type' => 'error'
            ];
        }

        $data = Employees::find($id);
        if(is_null($data)){
            return [
                'message' => 'No se encontro el empleado',
                'type' => 'error'
            ];
        }

        $data->delete();

        return [
            'message' => 'Se elimino el empleado con exito',
            'type' => 'error'
        ];
    }
}
