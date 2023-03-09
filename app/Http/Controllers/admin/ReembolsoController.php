<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reembolso;
use App\Models\Role;
use Response;
use Hash;


class ReembolsoController extends Controller
{
    public function index()
    {
        //
        if(Auth::check()){
            $user = Auth::user();
            $Reembolsos = Reembolso::All();
            if ($user->role_id==1){
                $autorizacao=$user->permissao;
        
               return view('admin/reembolso', ['autorizacao'=>$autorizacao,'user_name'=>$user->name,'Reembolsos'=>$Reembolsos]);
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
        $Reembolso = Reembolso::find($id);
        return response()->json($Reembolso);
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
        $Reembolso = Reembolso::find($request->reembolso_id);

        $Reembolso->estado = $request->estado;
        $Reembolso->save();
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
