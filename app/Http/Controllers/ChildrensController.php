<?php

namespace App\Http\Controllers;

//Modelos
use App\Model\Childrens;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildrensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Childrens::withoutTrashed()->get();
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
                    $children = new Childrens();
        
                    $children->name = $data['name'];
                    $children->age = $data['age']; 
                    $children->employees_id = $data['employees_id']; 
        
                    $children->save();
                }
            //Termina la treansaccion
            DB::commit();
            
            return [
                'message' => 'Niño guardado con exito',
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
                'message' => 'Debe enviar el niño',
                'type' => 'error'
            ];
        }

        $data = Childrens::find($id);

        if(is_null($data)){
            return [
                'message' => 'No se encontro el niño',
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

                $childrens = Childrens::find($id);

                //Validacion para saber si existe el registro
                if(is_null($childrens)){
                    return [
                        'message' => 'No se encontro el niño',
                        'type' => 'error'
                    ];
                }

                $childrens->name = $request[0]['name'];
                $childrens->age = $request[0]['age']; 
                $childrens->employees_id = $request[0]['employees_id']; 

                $childrens->save();
                
            //Termina la treansaccion
            DB::commit();
            
            return [
                'message' => 'Niño actulizado con exito',
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
                'message' => 'Debe enviar el niño',
                'type' => 'error'
            ];
        }

        $data = Childrens::find($id);
        if(is_null($data)){
            return [
                'message' => 'No se encontro el niño',
                'type' => 'error'
            ];
        }

        $data->delete();

        return [
            'message' => 'Se elimino el niño con exito',
            'type' => 'error'
        ];
    }
}
