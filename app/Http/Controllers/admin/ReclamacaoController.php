<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reclamacao;
use App\Models\Role;
use Response;
use Hash;

class ReclamacaoController extends Controller
{
    public function index()
    {
        //
        if(Auth::check()){
            $user = Auth::user();
            $reclamacaos = Reclamacao::All();
            if ($user->role_id==1){
                $autorizacao=$user->permissao;
                
               return view('admin/reclamacao', ['autorizacao'=>$autorizacao,'user_name'=>$user->name,'reclamacaos'=>$reclamacaos]);
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
        $reclamacao = Reclamacao::find($id);
        return response()->json($reclamacao);
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
        $reclamacao = Reclamacao::find($request->reclamacao_id);

        $reclamacao->estado = $request->estado;
        $reclamacao->save();
        $response['done']=true;
        return Response::json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
