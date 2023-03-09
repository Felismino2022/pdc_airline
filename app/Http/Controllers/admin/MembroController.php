<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Membro;
use App\Models\Regalia;
use App\Models\Membro__Regalia;
use Response;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembroController extends Controller
{
    public function index()
    {
        //
        if(Auth::check()){
            $user = Auth::user();

            $membros = DB::table('users')
            ->join('membros', 'users.id', '=', 'membros.user_id')
            ->get();
            $regalias = Regalia::All();
            //$membros = User::join('membros', 'membros.user_id', '=', 'users.user_id');
            if ($user->role_id==1){
                $autorizacao=$user->permissao;
               
                return view('admin/membro',['autorizacao'=>$autorizacao,'user_name'=>$user->name,'membros'=>$membros,'regalias'=>$regalias]);
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
        $membro = Membro::find($id);
      
        return response()->json($membro);
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

        $membro = Membro::find($request->membro_id);

      
        $response['done']=true;

        if ($request->has('1')) {
            $Membro_Regalia = new Membro__Regalia; 
            $Membro_Regalia->regalia_id=1;
            $Membro_Regalia->membro_id=$membro->id;
            $Membro_Regalia->save();
        }
        
        if ($request->has('2')) {
            $Membro_Regalia = new Membro__Regalia; 
            $Membro_Regalia->regalia_id=2;
            $Membro_Regalia->membro_id=$membro->id;
            $Membro_Regalia->save();
        }

        if ($request->has('3')) {
            $Membro_Regalia = new Membro__Regalia; 
            $Membro_Regalia->regalia_id=3;
            $Membro_Regalia->membro_id=$membro->id;
            $Membro_Regalia->save();
        }
        
        if ($request->has('4')) {
            $Membro_Regalia = new Membro__Regalia; 
            $Membro_Regalia->regalia_id=4;
            $Membro_Regalia->membro_id=$membro->id;
            $Membro_Regalia->save();
        }



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
        User::destroy($id);
        return redirect("utilizador.index")->withSuccess('You are not allowed to access');

    }
}
