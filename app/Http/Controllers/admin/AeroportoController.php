<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Aeroporto;
use Response;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AeroportoController extends Controller
{
    public function index()
    {
        //
        if(Auth::check()){
            $user = Auth::user();
            $aeroportos = Aeroporto::All();
            if ($user->role_id==1){
                $autorizacao=$user->permissao;

                return view('admin/aeroporto',['autorizacao'=>$autorizacao,'user_name'=>$user->name,'aeroportos'=>$aeroportos]);
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
        
        $aeroporto = new Aeroporto;
        
        $aeroporto->nome = $request->nome_aeroporto;
        $aeroporto->cidade = $request->cidade_aeroporto;
        $aeroporto->pais = $request->pais_aeroporto;
    
        $aeroporto->save();
        
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
        $aeroporto = Aeroporto::find($id);
        return response()->json($aeroporto);
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
        $aeroporto = Aeroporto::find($request->aeroporto_id);
        $aeroporto->nome = $request->nome_aeroporto;
        $aeroporto->cidade = $request->cidade_aeroporto;
        $aeroporto->pais = $request->pais_aeroporto;
    
        $aeroporto->save();
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
        Aeroporto::destroy($id);
        return redirect("aeroporto.index")->withSuccess('You are not allowed to access');

    }
}
