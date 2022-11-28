<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siniestro;
use App\Models\File;
use App\Models\TH;
use App\Models\User;
use App\Models\Productores;
use App\Models\Comentario;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Carbon
use Illuminate\Support\Carbon;
//Datatables Yajra
use Yajra\DataTables\DataTables;
//SweetAlert2
use RealRashid\SweetAlert\Facades\Alert;
//DomPDF
use PDF;









class SiniestroController extends Controller
{

    function __construct()
    {
        
        $this->middleware('permission:borrar-siniestro|ver-administrativo', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('siniestros.ServerSideTableFuncionando');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function pendientes()
    {
        $currentUser = Auth::user();
        $pendientes = Siniestro::where('estado', 'Pendiente')->get();
        $ausentes = Siniestro::where('estado', 'Ausente')->get();
        $terceros = Siniestro::where('estado', 'Tercero')->get();
        $cotizaciones = Siniestro::where('estado', 'Cotizacion')->get();
        return view('siniestros.index', compact('pendientes', 'ausentes', 'terceros', 'cotizaciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ausentes()
    {
        $currentUser = Auth::user();
        $siniestros = Siniestro::where('updated_by', $currentUser->id)->where('estado', 'Ausente')->get();
        return view('siniestros.ausentes', compact('siniestros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function peritos()
    {
        
        $currentUser = Auth::user();

        $siniestros = Siniestro::where('inspector', $currentUser->name)->where('estado', 'Perito')->orWhere('estado', 'Pendiente presupuesto')->orderBy('fechaip')->get();
        return view('siniestros.peritos', compact('siniestros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function terceros()
    {
        $siniestros = Siniestro::where('cliente', 'Tercero')->get();        
         return view('siniestros.terceros', compact('siniestros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cotizaciones()
    {
        $siniestros = Siniestro::where('cliente', 'Cotizacion')->get();        
         return view('siniestros.index', compact('siniestros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function create(Siniestro $siniestro)
    {
        $users = User::all();
        $talleres = TH::all();
        $siniestros = Siniestro::all();
        $productores = Productores::all();
        return view('siniestros.crear', compact('talleres','users', 'siniestros', 'siniestro','productores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $request->validate([
            'siniestro' => 'required',
            'compania' => 'required',
            'fechaip' => 'required',
            'modalidad' => 'required',
            'patente' => 'required',
            'direccion' => 'required',
            'enviarorden' => 'required',
            'localidad' => 'required',
            'cliente' => 'required',
            'email' => 'required',
            'link' => 'required',
            'telefono' => 'required',
            'motivo' => 'required',
            'estado' => 'required',
            'urls' => 'required',
        ]);


        Alert::alert('Title', 'Message', 'Type');
        $id = $request->id;
        $nrosiniestro= $request->siniestro;
        if($request->hasFile('imagen')){
        $file = $request->file('imagen');
        $fileName= '_'.' '.$nrosiniestro.' '.$file->getClientOriginalName();
        $request->imagen = $fileName;
        $file->move(("cover/$nrosiniestro"),$fileName);

       }
       
       
       $siniestro = Siniestro::create($request->all());

       if($request->hasFile('urls')){
        
        $files=$request->file('urls');
        foreach ($files as $file) {
            $id = $request->id;
            $urlName='_'.' '.$nrosiniestro.' '.$file->getClientOriginalName();
            $request['siniestro_id']= $siniestro->id;
            $request['url']=$urlName;
            $file->move(("urls/$nrosiniestro"),$urlName);
            File::create($request->all());
            
        }
    }

         
        
   

        
         return redirect()->route('siniestros.pendientes')
         ->with('success', 'Login Successfully!');

    }


    
    public function show(Siniestro $siniestro)
    {
        $files = File::where('siniestro_id', $siniestro->id)->get();
        return view('siniestros.show', compact('files','siniestro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Siniestro $siniestro)
    {
        $relaciones = Siniestro::where('patente', $siniestro->patente)->where('estado', 'Pendiente')->get();
        $users = User::all();
        $talleres = TH::all();
        $productores = Productores::all();
        $comentarios = DB::table('comentarios')
            ->join('users', 'users.id', '=', 'comentarios.user_id')
            ->select('comentarios.created_at', 'comentarios.cuerpo', 'users.name', 'comentarios.id')
            ->get();
        return view('siniestros.editar', compact('siniestro', 'talleres','users', 'productores', 'relaciones', 'comentarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editPerito(Siniestro $siniestro)
    {
        $relaciones = Siniestro::where('patente', $siniestro->patente)->where('estado', 'Pendiente')->get();
        $users = User::all();
        $talleres = TH::all();
        $productores = Productores::all();
        return view('siniestros.editPerito', compact('siniestro', 'talleres','users', 'productores', 'relaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function derivar(Siniestro $siniestro)
    {
        $siniestros = Siniestro::where('estado', 'coordinado')->get();
        $users = User::all();
        return view('siniestros.coordinados', compact('siniestros', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    public function update(Request $request, $id) // Siniestro, $siniestro ivan antes de las modificaciones para multiples archivos
    {
        $siniestro=Siniestro::findOrFail($id);
        $nrosiniestro= $siniestro->siniestro;
        if($request->hasFile('imagen')){
            if(File::exists("imagen/".$siniestro->imagen)){
                File::delete("imagen/".$siniestro->imagen);
            }
            $file=$request->file("imagen");
            $siniestro->imagen=time()."_".$file->getClientOriginalName();
            $file->move(("imagen/$nrosiniestro"),$siniestro->imagen);
            $request['imagen']=$siniestro->imagen;
        }

       
        if($request->hasFile('urls')){
            $files=$request->file('urls');
            foreach ($files as $file) {
                $urlName=time().'_'.' '.$nrosiniestro.' '.$file->getClientOriginalName();
                $request['siniestro_id']=$id;
                $request['url']=$urlName;
                $file->move(("urls/$nrosiniestro"),$urlName);
                File::create($request->all());
            }
        }

       
        $siniestro->update( $request->all());
        return redirect()->back()
        ->with('success','Siniestro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $siniestros=Siniestro::findOrFail($id);
        if($siniestros->exists("imagen/".$siniestros->imagen)){
            $siniestros->delete("imagen/".$siniestros->imagen);
        }

        $files=File::where("siniestro_id",$siniestros->id)->get();
        foreach($files as $file){
            if ($file->exists("urls/".$file->url)) { // Hay que corregir el código para que borre las imagenes de las carpetas
                $file->delete("urls/".$file->url);
            }

        }
        $siniestros->delete();
        return redirect()->route('siniestros.index');
        // $siniestro->delete(); asi estaba funcionando bien, con este
        
    }

    public function tallerData($id){
        $taller = TH::findOrFail($id);
        return response()->json($taller);
    }

    public function editData($id){
        $data = Siniestro::findOrFail($id);
        return response()->json($data);
    }

    public function userData($id){
        $users = User::findOrFail($id);
        return response()->json($users);
    }

    public function productoresData($id){
        $productores = Productores::findOrFail($id);
        return response()->json($productores);
    }

    public function storeData(Request $request){
        $data = Siniestro::insert($request->all());

        return response()->json($data);
    }

    public function updateData(Request $request, $id)
    {
        $request->validate([     
        ]);

        $data=Siniestro::findOrFail($id);
        if($request->hasFile('imagen')){
            if(File::exists("imagen/".$data->imagen)){
                File::delete("imagen/".$data->imagen);
            }
            $file=$request->file("imagen");
            $data->imagen=time()."_".$file->getClientOriginalName();
            $file->move(("imagen"),$data->imagen);
            $request['imagen']=$data->imagen;
        }

        if($request->hasFile('urls')){
            $files=$request->file('urls');
            foreach ($files as $file) {
                $urlName=time().'_'.$file->getClientOriginalName();
                $request['siniestro_id']=$id;
                $request['url']=$urlName;
                $file->move(("urls"),$urlName);
                File::create($request->all());
            }
        }

        $data = Siniestro::findOrFail($id)->update(( $request->all()));
        return response()->json($data);

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    }

    public function asignaciones()
    { 
        $siniestros = Siniestro::where('estado','coordinado')->get();
        $users = User::all();
        return view('teacher.index', compact('siniestros', 'users'));
    }

    //------------allData-------------
    public function allData()
    {    
        $data = Siniestro::where('estado','coordinado')->latest()->get();
        return response()->json($data);
    }

    public function derivaciones(Siniestro $siniestro)
    {
        $date = new Carbon('tomorrow');
        if( $date->dayOfWeek == Carbon::SATURDAY || $date->dayOfWeek == Carbon::SUNDAY || $date->dayOfWeek == Carbon::FRIDAY ){
        $date = $date->next('Monday');
        }
        $siguiente = $date->toDateString();
        $siniestros = Siniestro::where('estado', 'coordinado')->where('fechaip', $siguiente)->get();
        $users = User::all();
        return view('siniestros.derivar', compact('siniestros', 'users'));
        
    }

    public function coordinados()
    {
        $users = User::where('Cargo', '')->get();
        $siniestros = Siniestro::where('estado', 'Coordinado')->get();
        return view('siniestros.coordinados', compact('siniestros', 'users'));
    }

    public function check(Request $request)
    {
        if($request->get('patente'))
        {
            $patente = $request->get('patente');
            $data = DB::table("siniestros")
            ->where('patente', $patente)
            ->count();

            if($data > 0)
            {
                echo 'not_unique';
            }
            else
            {
                echo 'unique';
            }
        }
    }  
    
    public function history(Siniestro $siniestro)
    {
        $entradas = DB::table('audits')
            ->join('users', 'users.id', '=', 'audits.user_id')
            ->select('auditable_id','event', 'audits.new_values', 'audits.created_at', 'users.name', 'audits.body')
            ->get();

        return view('siniestros.history', compact('entradas', 'siniestro'));
    }

    public function registros(){
        $registros = Siniestro::select('id', 'created_at', 'estado', 'fechaip', 'compania', 'siniestro', 'patente', 'direccion', 'localidad', 'motivo', 'fechacierre', 'modalidad', 'inspector')
           ->get();   
                   
        return Datatables::of($registros)
           ->addColumn('actions', function($registros) {
               return '<a href="http://127.0.0.1:8000/siniestros/'.$registros->id.'/edit" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square fa-lg p-1"></i></a>
               <a href="http://127.0.0.1:8000/siniestros/'.$registros->id.'/history" class="btn btn-warning btn-sm"><i class="fa-solid fa-clock-rotate-left fa-lg p-1"></i></a>';
           })
           ->rawColumns(['actions'])
           ->toJson();                
        return $registros;
        
    }

    

   

    public function peritoCompleto()
    {
        $currentUser = Auth::user();
        $siniestros = Siniestro::where('inspector', $currentUser->name)->where('estado', 'Completo a revision')->orWhere('estado', 'Sin cerrar a revisión')->orderBy('fechaip')->get();
        return view('peritos.completo', compact('siniestros'));
        
    }

    

    public function peritoCerrado()
    {
        $currentUser = Auth::user();
        $siniestros = Siniestro::where('inspector', $currentUser->name)->where('estado', 'Cerrado')->orWhere('estado', 'Pagado')->orderBy('fechaip')->get();
        return view('peritos.cerrado', compact('siniestros'));
        
    }

   

    public function editIngreso(Siniestro $siniestro)
    {
        $relaciones = Siniestro::where('patente', $siniestro->patente)->where('estado', 'Pendiente')->get();
        $users = User::all();
        $talleres = TH::all();
        $productores = Productores::all();
        $comentarios = DB::table('comentarios')
            ->join('users', 'users.id', '=', 'comentarios.user_id')
            ->select('comentarios.created_at', 'comentarios.cuerpo', 'users.name', 'comentarios.id')
            ->get();
        
        return view('siniestros.editIngreso', compact('siniestro', 'talleres','users', 'productores', 'relaciones', 'comentarios'));
    }

    public function updateDerivaciones(Request $request)
    {
        Siniestro::where('estado', 'Coordinado')
        ->whereRaw('inspector <> ""')
        ->update(['estado' => 'Perito']);
    }

    public function asignarPeritos(Request $request)
    {
        $ids = $request->seleccionados;

        $inspector = $request->inspector;

        Siniestro::whereIn('id', $ids)->update(['inspector' => $inspector]);


    }

    public function todosUsuarios(){
        $inspectores = User::select('name')
           ->get();           
        //    ->toJson();                
        return $inspectores;
    }

    public function peritosa()
    {
        
        return view('siniestros.peritosa');
        
    }

    public function registrosa(){
        $inspecciones = Siniestro::select('id', 'created_at', 'estado', 'fechaip', 'compania', 'siniestro', 'patente', 'direccion', 'localidad', 'motivo', 'fechacierre', 'modalidad', 'inspector')
        ->where('estado', 'Perito')
        ->orWhere('estado', 'Pendiente presupuesto') 
        ->get();   

           
                   
        return Datatables::of($inspecciones)
           ->addColumn('actions', function($inspecciones) {
               return '<a href="http://127.0.0.1:8000/siniestros/'.$inspecciones->id.'/edit" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square fa-lg p-1"></i></a>
               <a href="http://127.0.0.1:8000/siniestros/'.$inspecciones->id.'/history" class="btn btn-warning btn-sm"><i class="fa-solid fa-clock-rotate-left fa-lg p-1"></i></a>';
           })
           ->rawColumns(['actions'])
           ->toJson();                
           return $inspecciones;
        
    }

    public function gestion()
    {
        return view('siniestros.gestion');
    }

    public function gestiona()
    {
        $inspecciones = Siniestro::select('id', 'created_at', 'estado', 'fechaip', 'compania', 'siniestro', 'patente', 'direccion', 'localidad', 'motivo', 'modalidad', 'inspector')
        ->where('estado', 'Completo a revision')
        ->orWhere('estado', 'Sin cerrar a revision')
        ->orWhere('estado', 'Rechazado')
        ->orWhere('estado', 'Completo a revision')
        ->get();   

           
                   
        return Datatables::of($inspecciones)
           ->addColumn('actions', function($inspecciones) {
               return '<a href="http://127.0.0.1:8000/siniestros/'.$inspecciones->id.'/edit" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square fa-lg p-1"></i></a>
               <a href="http://127.0.0.1:8000/siniestros/'.$inspecciones->id.'/history" class="btn btn-warning btn-sm"><i class="fa-solid fa-clock-rotate-left fa-lg p-1"></i></a>';
           })
           ->rawColumns(['actions'])
           ->toJson();                
           return $inspecciones;
    }

    public function downloadPDF(Siniestro $siniestro, Request $request)
    {
        

        $arraybien = $siniestro->toArray();

    
        $pdf = PDF::loadView('siniestros.download', compact('siniestro'));

        return $pdf->download('inspección - '.$siniestro->siniestro. '.pdf');

        
    }



    
}




