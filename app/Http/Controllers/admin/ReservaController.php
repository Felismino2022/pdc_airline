<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Bilhete;
use Response;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        //
        if(Auth::check()){
            $user = Auth::user();
            $bilhetes = Bilhete::join('users', 'users.id', '=', 'bilhetes.user_id')
                 ->select('data_compra', 
                 'hora_compra','bilhetes.tipo','name as nome',
                 'bilhetes.state','bilhetes.id')
                ->get();
            if ($user->role_id==1){
                $autorizacao=$user->permissao;
                return view('admin/reserva',['autorizacao'=>$autorizacao,'user_name'=>$user->name,'bilhetes'=>$bilhetes]);
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
        
        $user = new User;
        
        $user->name = $request->user_first_name;
        $user->surname = $request->user_last_name;
        $user->gender = $request->user_gender;
        $user->password = Hash::make($request->user_pass);
        $user->email = $request->user_email;
        $user->role_id = 1;
        $user->state = 1;
        $user->save();
        
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
        $bilhete = Bilhete::find($id);
        return response()->json($bilhete);
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
        $bilhete = Bilhete::find($request->bilhete_id);
        $bilhete->state = $request->estado;
        $bilhete->save();
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
        Bilhete::destroy($id);
        return redirect("utilizador.index")->withSuccess('You are not allowed to access');

    }
}
