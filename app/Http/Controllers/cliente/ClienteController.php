<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarMembro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Classes\Encri;
use Illuminate\Support\Facades\Route;

use App\Http\Requests\ValidarForm;
use Illuminate\Support\Facades\Mail;

use Hash;
use Session;
use App\Models\User;
use App\Models\Preferencia;
use App\Models\Bilhete;
use App\Models\Membro;
use App\Models\Aeroporto;
use App\Models\Tarifa;
use App\Models\Frota;
use App\Models\Voo;
use App\Models\VooTarifa;
use App\Models\Reclamacao;
use App\Models\Lugar;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $Encri;

    public function __construct(){
        $this->Encri = new Encri();
    }
    public function index()
    {
       
        $aeroportos = Aeroporto::all();
        $voos = Voo::all();
        $tarifas = Tarifa::all();
        return view('cliente.welcome', ['aeroportos'=>$aeroportos, 'voos' => $voos, 'tarifas' => $tarifas]);
    }

    public function getVooData(){

        $data = request('data_partida');
        $data_volta = request('data_volta');
        $origem_id = request('origem_id');
        $destino_id = request('destino_id');
       // dd($data_volta);
        //dd($data);
       
            if($data_volta){
                $voos_data = DB::table('voos')
                ->whereDate('data_partida', $data)
                ->whereDate('data_regresso', $data_volta)
                ->where('origem_id', $origem_id)
                ->where('destino_id', $destino_id)
                ->get();
                return response()->json($voos_data);
            }else{
                $voos_data = DB::table('voos')
                ->whereDate('data_partida', $data)
                ->where('origem_id', $origem_id)
                ->where('destino_id', $destino_id)
                ->get();
                return response()->json($voos_data);
            }
            
           
       
        return true;
    }

    public function create_login()
    {
        return view('auth.login'); 
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.registration');
    }    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


   /*  public function userLogin(Request $request)
    {
         
        $credentials = $request->only('email', 'password');

        dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {

            $email = $request->email;

            return redirect('/');
            //return redirect()->back();
        }
        //dd($request->email);
        return redirect('/');
        }*/

       
    
    public function store(ValidarMembro $request)
    {
        //
        $user = new User;
        $membro = new Membro;
        $preferencia = new Preferencia;
        $user->titulo = 'Sra';
        $user->name = $request->name;
        $user->surname = $request->sobrenome;
        $user->gender = $request->genero;
        $user->phone = $request->telefone;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->role_id = 2;
        $user->state = 1;
        $user->save();

        $preferencia->refeicao=$request->comida;
        $preferencia->lugar=$request->lugar;
        $preferencia->save();
        
        $membro->idiom = $request->idioma;
        $membro->birthday = $request->aniversario;
        $membro->numero_de_membro = rand(1000, 9999).$user->id;
        $membro->address = $request->morada;
        $membro->miles = 0;
        $membro->user_id = $user->id;
        $membro->preferencia_id = $preferencia->id;

        $membro->save();

        $usuario = User::where('email', $request->email)->first();
        $membro = Membro::where('user_id', $usuario->id)->first();
        $request->session()->put(['email' => $usuario->email]);

        if($membro){
            Mail::send('mail.membroPdc', ['membro' => $membro], function($m){
                $m->from('muchombo2021@gmail.com', 'Felismino');
                $m->to(request()->session()->get('email'));
            });
        }
        
        return redirect("/")->with('msg', 'Verificar o seu email foi mandado o numero de membro');
    }

    public function dashboard()
    {
        if(Auth::check()){
            $user = Auth::user();
            if ($user->role_id==1){
                return view('admin/dashboard',['user_name'=>$user->name]);
            }
            else{
                $aeroportos = Aeroporto::all();
                return view('cliente.welcome', ['aeroportos'=>$aeroportos]);
            }
                
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
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
    }
    public function configurar_bi()
    {
        return view('cliente/bilheteConf');
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //
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
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

 
    public function comprar_create($id,$qtd_a,$qtd_c){

        //
       
        return view('cliente/comprar',['bi_id'=>$id],['qtd_a'=>$qtd_a],['qtd_c'=>$qtd_c]);
     }


     public function comprar_store(Request $request,$id){
/*

//mensagem api
        $basic  = new \Nexmo\Client\Credentials\Basic('f44e9ea7', 'KitfEggAOkItBlL4');
        $client = new \Nexmo\Client($basic);
 
        $message = $client->message()->send([
            'to' => '+244938097392',
            'from' => 'Clever',
            'text' => 'Feliz Ano Novo'
        ]);
 
        dd('SMS message has been delivered.');
    */
        


        $user = new User;
        $user->name = $request->name;
        $user->surname = $request->sobrenome;
        $user->gender = 'M';
        $user->password = Hash::make('usercli77');
        $user->email = $request->email;
        $user->role_id = 3;
        $user->state = 1;
        $tel=$request->telefone;
        $user->save();
        $bilhete = new Bilhete;
        $bilhete->data_compra=date("Y-m-d");
        $bilhete->user_id=$user->id;
        $bilhete->save();
        //
        return view('cliente/pagamento',['bi_id'=>$id]);
     }

     public function mostrarVoo(Request $request){

        $voos = Voo::all();
       
        return view('cliente/listarVoo',['voos'=>$voos]);
     }
                
     public function selecionar_lugar($id){

       // $id = $this->Encri->desencriptar($id);
        $id = $this->Encri->desencriptar($id);
        //dd($id);
        $voo = Voo::findOrfail($id);
     
        $array_lugares_ocupados = array();
        $partida = Aeroporto::findOrfail($voo->origem_id); 
        $regresso = Aeroporto::findOrfail($voo->destino_id);
       // $tarifas = $voo->tarifas;
       $frota=Frota::find($voo->frota_id);
       // $lugares = Lugar::all();
       $ft=(string)($frota->capacidade);
       $lugares=range('1',$ft);

        $tarifas=VooTarifa::where('voo_id','=',$voo->id)
        ->join('tarifas', 'tarifas.id', '=', 'voo_tarifas.tarifa_id')
        ->get();

     
        
        $lugares_ocupados =explode(" ",$voo->str_lugar);
/*
        $lugares_oucupados = DB::table('voos')->select('lugar_voo.lugar_id')
                             ->join('lugar_voo', 'voos.id', '=', 'lugar_voo.voo_id')
                             ->where('voos.id', '=', $id)->get();
                           
                             foreach($lugares_oucupados as $lugares_oucupado){
                                $array_lugares_ocupados[] = ($lugares_oucupado->lugar_id);
                            }
*/
        return view('selecionar_lugar', ['partida' => $partida, 'regresso' => $regresso, 'voo' => $voo, 'lugares' => $lugares, 'array_lugares_ocupados' => $lugares_ocupados, 'tarifas' => $tarifas]);
    }

    public function dados_reclame(Request $request)
    {
        $user = auth()->user();
       // dd($request->bilhete_id);
        $reclamacao = new Reclamacao;
        $bilhete = DB::table('bilhetes')
                ->where('codigo', $request->bilhete_id)
                ->where('user_id', $user->id)
                ->first();
       

        if(!$bilhete){
            return redirect('/reclamar_milha')->with('msg', 'Falha ao fazer a  verificar o codigo');
        }
        $reclamacao->bilhete_id = $bilhete->id;
        $reclamacao->descricao = $request->descricao;

        $reclamacao->save();

        return redirect('/membro-dashboard')->with('msg', 'Reclamação feita com sucesso');


        //dd("salvo com sucesso");
    }
    
}
