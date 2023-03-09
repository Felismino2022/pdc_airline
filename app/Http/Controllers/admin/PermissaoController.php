<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Permissao;
use App\Models\User;
use App\Models\Role;
use Validator;
use Response;
use Hash;


class PermissaoController extends Controller
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
            $user = Auth::User();
            $permissoes = User::join('permissaos', 'permissaos.user_id', '=', 'users.id')
            ->get(['permissaos.*','users.name','users.email']);

            $autorizacao=$user->permissao;

            if ($user->role_id==1){
                //return view('admin/utilizador',['permissao_name'=>$permissao->name,'utilizadores'=>$utilizadores]);
               // return view('permissaos/index',['permissao_name'=>$permissao->name,'utilizadores'=>$utilizadores]);
               $user_roles =Role::All();
           
       
        
               return view('admin/permissao', ['user'=>$user,'permissoes'=>$permissoes,'autorizacao'=>$autorizacao]);
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
        
        $validator = Validator::make($request->all(), [
            'permissao_first_name' => 'required|max:30|alpha',
            'permissao_last_name' => 'required|max:30|alpha',
            'permissao_email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
			
            $permissao=new permissao;
            $permissao->name = $request->permissao_first_name;
            $permissao->surname = $request->permissao_last_name;
            $permissao->gender = $request->permissao_gender;
            $permissao->password = Hash::make($request->permissao_pass);
            $permissao->email = $request->permissao_email;
            $permissao->role_id = 1;
            $permissao->state = 1;
            $permissao->save();
            return response()->json(['success'=>'Added new records.']);
        }
    
        return response()->json(['error'=>$validator->errors()]);
        
        
    
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
        $permissao = Permissao::find($id);
        return response()->json($permissao);
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
        $permissao = Permissao::find($request->permissao_id);
        $permissao->compra = $request->compra;
        $permissao->regalia = $request->regalia;
        $request->permissao_regalia=$permissao->frota = $request->frota;
        $permissao->membro = $request->membro;

        $permissao->reclamacao = $request->reclamacao;
        $permissao->permissao = $request->permissao;
        $permissao->utilizador = $request->utilizador;
        $permissao->voo = $request->permissao_voo;

        $permissao->tarifa = $request->tarifa;

        $permissao->reembolso = $request->reembolso;
        $permissao->aeroporto = $request->aeroporto;

        $permissao->save();
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
        permissao::destroy($id);
        return redirect("admin/utilizador")->withSuccess('You are not allowed to access');

    }
}
