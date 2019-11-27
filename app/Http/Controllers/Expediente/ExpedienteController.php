<?php

namespace App\Http\Controllers\Expediente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Catalogos\ActivosPensionados;

class ExpedienteController extends Controller
{

    
    /*********************************************************************************************
        DECLARACION DE LAS VARIABLES catUbicaciones, catClasificaciones y catTurnos
    *********************************************************************************************/
    private $catEdoCivil;  
    private $catVivienda;

    
    /*********************************************************************************************
        DECLARACION DE LOS CAMPOS REQUERIDOS EN EL FORMULARIO
    ***********************************************************************************************/
    protected $rules = ['actpen' => 'required',
                        'numero'=>'required'
                ]; 
   
    
    public function __construct()
    {
        $this->catEdoCivil           = \App\Model\Catalogos\EstadoCivil::select('id as valor','nombre as descripcion')->orderBy('id')->get();
        $this->catVivienda           = \App\Model\Catalogos\Vivienda::select('id as valor','nombre as descripcion')->orderBy('descripcion')->get(); 

    } //fin del constructor


    public function index()
    {
        return view('expediente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catEdoCivil = $this->catEdoCivil;
        $catVivienda = $this->catVivienda;

        return view('expediente.create', compact('catEdoCivil', 'catVivienda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {

            $this->validate($request, $this->rules);
                 
                \DB::beginTransaction();
                try {
                    
                   /* $id_estado = 30;
                    $id_municipio = 2203;
                    $id_localidad = 270750;*/
                   
                    //INSTANCIAR EL OBJETO EQUIPO
                    $actpen = new ActivosPensionados;

                    //RECIBIR LOS INPUT DEL FORMULARIO E INSERTARLOS EN LA TABLA CAT_EQUIPOS

                    $actpen->actpen                         = $request->input('actpen');
                    $actpen->numero                         = $request->input('numero');
                    $actpen->fecha_ingreso                  = $request->input('fecha_ingreso');
                    $actpen->paterno                        = $request->input('paterno');
                    $actpen->materno                        = $request->input('materno');
                    $actpen->nombre                         = $request->input('nombre');
                    $actpen->fecha_nacimiento               = $request->input('fecha_nacimiento');
                    $actpen->sexo                           = $request->input('sexo');
                    $actpen->id_estadocivil                 = $request->input('id_estadocivil');
                    $actpen->rfc                            = $request->input('rfc');
                    $actpen->curp                           = $request->input('curp');
                    $actpen->nss                            = $request->input('nss');
                    $actpen->ine                            = $request->input('ine');
                    $actpen->correo_electronico_personal    = $request->input('correo_electronico_personal');
                    $actpen->comentario                     = $request->input('comentario');
                    $actpen->calle                          = $request->input('calle');
                    $actpen->no_exterior                    = $request->input('no_exterior');
                    $actpen->no_interior                    = $request->input('no_interior');
                    $actpen->colonia                        = $request->input('colonia');
                    $actpen->cp                             = $request->input('cp');
                    $actpen->id_vivienda                    = $request->input('id_vivienda');
                    $actpen->telefono_fijo                  = $request->input('telefono_fijo');
                    $actpen->telefono_celular               = $request->input('telefono_celular');
                    $actpen->profesion                      = $request->input('profesion');
                    $actpen->institucion                    = $request->input('institucion');
                    //$actpen->id_organismo                   = $request->input('id_organismo');
                   // $actpen->id_dependencia                 = $request->input('id_dependencia');
                   // $actpen->id_estado                      = $id_estado;
                    //$actpen->id_municipio                   = $id_municipio;
                    //$actpen->id_localidad                   = $id_localidad;

                    $actpen->save();


                   /* $accionBitacora = 'ID: ';
                    $accionBitacora .= $actpen->id.', Tipo de persona: '.$actpen->actpen.', No. de A/P: '.$actpen->numero.', Fecha de Ingreso: '.$actpen->numero.', Nombre(s): '.$actpen->nombre.', Apellido Paterno: '.$actpen->paterno.', Apellido Materno: '.$actpen->materno;
                    $this->nuevoRegistroBitacora(
                        (object) array('modulo' => 'Expediente',
                        'accion' => 'ALTA',
                        'datos' => $accionBitacora
                    ));*/


                    \DB::commit();
                     
                    return response()->json(['message'=>'La información se agregó correctamente.'], 200);

                }catch (\Exception $e) {
                    \DB::rollback();
                    
                    return response()->json([
                        "errors" => ['exception' =>[$e->getMessage()]],
                        "message" => "Error interno, contacte al administrador."
                    ],500);             
                    
                } // fin del try y catch
            
        } // fin de validaciones rules  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actpen = ActivosPensionados::find($id);
        //dd($actpen);

        return view('expediente.show',
                [
                    'id' => $id,
                    'actpen' => $actpen
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // instanciar objeto de equioi de acuerdo al id_equipo
         $actpen = ActivosPensionados::find($id);
        
         return view('expediente.edit',
                     [
                         'actpen' => $actpen,
                         'catEdoCivil' => $this->catEdoCivil,
                         'catVivienda' => $this->catVivienda,
                     ]);
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
        if ($request->ajax()) {

            $this->validate($request, $this->rules);                 

              

                \DB::beginTransaction();
                 try { 

                        
                       /* $id_estado = 30;
                        $id_municipio = 2203;
                        $id_localidad = 270750;*/

                        //INSTANCIAR EL OBJETO ACTIVOS O PENSIONADOS
                        $actpen = ActivosPensionados::find($id);
                        
                        

                        //RECIBIR LOS INPUT DEL FORMULARIO E INSERTARLOS EN LA TABLA CAT_EQUIPOS

                        $actpen->actpen                         = $request->input('actpen');
                        $actpen->numero                         = $request->input('numero');
                        $actpen->fecha_ingreso                  = $request->input('fecha_ingreso');
                        $actpen->paterno                        = $request->input('paterno');
                        $actpen->materno                        = $request->input('materno');
                        $actpen->nombre                         = $request->input('nombre');
                        $actpen->fecha_nacimiento               = $request->input('fecha_nacimiento');
                        $actpen->sexo                           = $request->input('sexo');
                        $actpen->id_estadocivil                 = $request->input('id_estadocivil');
                        $actpen->rfc                            = $request->input('rfc');
                        $actpen->curp                           = $request->input('curp');
                        $actpen->nss                            = $request->input('nss');
                        $actpen->ine                            = $request->input('ine');
                        $actpen->correo_electronico_personal    = $request->input('correo_electronico_personal');
                        $actpen->comentario                     = $request->input('comentario');
                        $actpen->calle                          = $request->input('calle');
                        $actpen->no_exterior                    = $request->input('no_exterior');
                        $actpen->no_interior                    = $request->input('no_interior');
                        $actpen->colonia                        = $request->input('colonia');
                        $actpen->cp                             = $request->input('cp');
                        $actpen->id_vivienda                    = $request->input('id_vivienda');
                        $actpen->telefono_fijo                  = $request->input('telefono_fijo');
                        $actpen->telefono_celular               = $request->input('telefono_celular');
                        $actpen->profesion                      = $request->input('profesion');
                        $actpen->institucion                    = $request->input('institucion');
                        //$actpen->id_organismo                   = $request->input('id_organismo');
                        //$actpen->id_dependencia                 = $request->input('id_dependencia');
                       // $actpen->id_estado                      = $id_estado;
                       // $actpen->id_municipio                   = $id_municipio;
                       // $actpen->id_localidad                   = $id_localidad;
                        $actpen->save();

                  

                    \DB::commit();

                    return response()->json(['message'=>'La información se agregó correctamente.'], 200);

                }catch (\Exception $e) {
                    \DB::rollback();
                    
                    return response()->json([
                        "errors" => ['exception' =>[$e->getMessage()]],
                        "message" => "Error interno, contacte al administrador."
                    ],500);             
                    
                } 

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
        //
    }

    /****************************************************************************************************
        FUNCION DEL CONTROLADOR QUE MUESTRA LOS ACTIVOS Y PENSIONADOS EN LA PAGINA PRINCIPAL
    *****************************************************************************************************/

    public function getExpedientes()
    {

        $items = ActivosPensionados::orderBy('id')->get();
       
        return response()->json($items);
    }  // fin de getnotificación

    public function plaza()
    {
        return view('expediente.plaza');
    }  // fin de getnotificación

}
