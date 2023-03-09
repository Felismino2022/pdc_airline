<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Frota;
use Response;
class FrotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
        if(Auth::check()){
            $user = Auth::user();
            $frotas = Frota::All();
            if ($user->role_id==1){
                $autorizacao=$user->permissao;
       
                return view('admin/frota',['autorizacao'=>$autorizacao,'user_name'=>$user->name,'frotas'=>$frotas]);
              
            }
            else{
                return view('welcome');
            }
                
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $frota = new Frota;
        
        $frota->marca = $request->marca;
        $frota->modelo = $request->modelo;
        $frota->capacidade = $request->capacidade;
    
        $frota->save();
        
        $response['done']=true;
        return Response::json($response);

      //  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $frota = Frota::find($id);
        return response()->json($frota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $frota = Frota::find($request->frota_id);
        $frota->marca = $request->marca;
        $frota->modelo = $request->modelo;
        $frota->capacidade = $request->capacidade;
    
        $frota->save();
        $response['done']=true;
        return Response::json($response);
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
        Frota::destroy($id);
        return redirect("frota.index")->withSuccess('You are not allowed to access');

    }
}
