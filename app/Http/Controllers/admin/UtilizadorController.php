<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Permissao;
use App\Models\Role;
use Validator;
use Response;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UtilizadorController extends Controller
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
            $utilizadores = User::All();
           
            if ($user->role_id==1){
                $autorizacao=$user->permissao; 
                //return view('admin/utilizador',['user_name'=>$user->name,'utilizadores'=>$utilizadores]);
               // return view('users/index',['user_name'=>$user->name,'utilizadores'=>$utilizadores]);
               $user_roles =Role::All();
           
       
        
               return view('admin/utilizador', ['autorizacao'=>$autorizacao,'user_name'=>$user->name,'utilizadores'=>$utilizadores]);
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
            'user_first_name' => 'required|alpha',
            'user_last_name' => 'required|alpha',
            'user_email' => 'required|email',
          
        ]);

        
        if ($validator->passes()) {


            try {
                DB::beginTransaction(); // Tell Laravel all the code beneath this is a transaction
               			
            $user=new User;
            $user->name = $request->user_first_name;
            $user->surname = $request->user_last_name;
            $user->gender = $request->user_gender;
            $user->password = Hash::make($request->user_pass);
            $user->email = $request->user_email;
            $user->role_id = 1;
            $user->state = 'activo';
            $user->tipo="root";
            $user->save();
            
            $permissao=new Permissao;
            $permissao->compra="ler";
            $permissao->tarifa="ler";
            $permissao->regalia="ler";
            $permissao->membro="ler";
            $permissao->frota="ler";
            $permissao->aeroporto="ler";
            $permissao->reclamacao="ler";
            $permissao->reembolso="ler";
            $permissao->utilizador="ler";
            $permissao->permissao="ler";
            $permissao->user_id=$user->id;
            $permissao->save();
            DB::commit();

            return response()->json(['success'=>'Utilizador Inserido com Sucesso']);
                // Call other functions, they're still part of this transaction
               
                // Tell Laravel this transacion's all good and it can persist to DB
              
                  } 
                  catch(\Exception $exp) {
                      DB::rollBack(); // Tell Laravel, "It's not you, it's me. Please don't persist to DB"
                      return response()->json(['success'=>'Ocorreu um erro ao inserir']);
                  }


              }
          
              return response()->json(['error'=>$validator->errors()]);
        }
    
           
        
        
    
      //  
    

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
        $user = User::find($id);
        return response()->json($user);
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
        $user = User::find($request->user_id);
        $user->name = $request->user_first_name;
        $user->surname = $request->user_last_name;
        $user->gender = $request->user_gender;
        $user->email = $request->user_email;
        $user->save();
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
        User::destroy($id);
        return redirect("admin/utilizador")->withSuccess('You are not allowed to access');

    }
}
