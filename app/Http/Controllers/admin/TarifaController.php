<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tarifa;
use App\Models\Tarifa_Regalia;
use Response;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regalia;


class TarifaController extends Controller
{
    public function index()
    {
        //
        
        if(Auth::check()){
            $user = Auth::user();
            $regalias = Regalia::All();
            $tarifas = Tarifa::All();
            if ($user->role_id==1){
                $autorizacao=$user->permissao;
                return view('admin/tarifa',['autorizacao'=>$autorizacao,'user_name'=>$user->name,'tarifas'=>$tarifas,'regalias'=>$regalias]);
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
        
        $tarifa = new Tarifa;
        
        
        $tarifa->nome = $request->nome;

        $tarifa->preco = $request->preco;
        $tarifa->save();


        if ($request->has('1')) {
            $tarifa_regalia = new Tarifa_Regalia; 
            $tarifa_regalia->regalia_id=1;
            $tarifa_regalia->tarifa_id=$tarifa->id;
            $tarifa_regalia->save();
        }
        
        if ($request->has('2')) {
            $tarifa_regalia = new Tarifa_Regalia; 
            $tarifa_regalia->regalia_id=2;
            $tarifa_regalia->tarifa_id=$tarifa->id;
            $tarifa_regalia->save();
        }

        if ($request->has('3')) {
            $tarifa_regalia = new Tarifa_Regalia; 
            $tarifa_regalia->regalia_id=3;
            $tarifa_regalia->tarifa_id=$tarifa->id;
            $tarifa_regalia->save();
        }
        
        if ($request->has('4')) {
            $tarifa_regalia = new Tarifa_Regalia; 
            $tarifa_regalia->regalia_id=4;
            $tarifa_regalia->tarifa_id=$tarifa->id;
            $tarifa_regalia->save();
        }

      
        
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
        $tarifas = Tarifa::find($id);

        $regalias = Tarifa__Regalia::
        where('tarifa_id','=',$id )
       ->get();


       for($i=1;$i<5;$i++){
        $tarifas['r'.$regalias->regalia_id]=false;
    }

        for($i=1;$i<$regalias->count();$i++){
            $tarifas['r'.$regalias->regalia_id]=true;
        }

        return response()->json($tarifas);
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
        $user = Tarifa::find($request->user_id);
        $tarifa->nome = $request->nome;

        $tarifa->preco = $request->preco;
        $tarifa->save();


        if ($request->has('1')) {
            $tarifa_regalia = new Tarifa_Regalia; 
            $tarifa_regalia->regalia_id=1;
            $tarifa_regalia->tarifa_id=$tarifa->id;
            $tarifa_regalia->save();
        }
        
        if ($request->has('2')) {
            $tarifa_regalia = new Tarifa_Regalia; 
            $tarifa_regalia->regalia_id=2;
            $tarifa_regalia->tarifa_id=$tarifa->id;
            $tarifa_regalia->save();
        }

        if ($request->has('3')) {
            $tarifa_regalia = new Tarifa_Regalia; 
            $tarifa_regalia->regalia_id=3;
            $tarifa_regalia->tarifa_id=$tarifa->id;
            $tarifa_regalia->save();
        }
        
        if ($request->has('4')) {
            $tarifa_regalia = new Tarifa_Regalia; 
            $tarifa_regalia->regalia_id=4;
            $tarifa_regalia->tarifa_id=$tarifa->id;
            $tarifa_regalia->save();
        }

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
        Tarifa::destroy($id);
        return redirect("admin/tarifa")->withSuccess('You are not allowed to access');

    }
}
