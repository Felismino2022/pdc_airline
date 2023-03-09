<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Regalia;
use Response;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegaliaController extends Controller
{
    public function index()
    {
        //
        if(Auth::check()){
            $user = Auth::user();
            $regalias = Regalia::All();
            if ($user->role_id==1){
                $autorizacao=$user->permissao;
                return view('admin/regalia',['autorizacao'=>$autorizacao,'user_name'=>$user->name,'regalias'=>$regalias]);
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
        
        $regalia = new Regalia;
        
        $regalia->nome = $request->nome;

        $regalia->save();
        
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
        $regalia = Regalia::find($id);
        return response()->json($regalia);
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
        $regalia = Regalia::find($request->regalia_id);
        $regalia->nome = $request->nome;
        $regalia->save();
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
        Regalia::destroy($id);
        return redirect("utilizador.index")->withSuccess('You are not allowed to access');

    }
}
