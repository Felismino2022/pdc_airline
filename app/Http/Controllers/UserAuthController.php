<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ValidarDadosViajante;
use App\Classes\Encri;
use Hash;
use Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Membro;
use App\Models\Voo;
use App\Models\Tarifa;
use App\Models\Reclamacao;
use App\Models\Reembolso;
use App\Models\Bilhete;
use App\Models\Lugar;
use App\Models\Passageiro;
use App\Models\Referencia;
use App\Models\Preferencia;
use App\Models\Recuperarsenha;

use Illuminate\Support\Facades\Auth;
class UserAuthController extends Controller
{

    private $Encri;

    public function __construct(){
        $this->Encri = new Encri();
    }

    

    public function index()
    {
        return view('auth.login'); 
    }  
      

        public function userLogin(Request $request)
        {

            if(is_numeric($request->email)){
                $membro = Membro::where('numero_de_membro', $request->email)->first();
                if($membro){
                    $email = $membro->user->email;
                }else{
                    $email = null;
                }
                
            }else{
                $email = $request->email;
            }
            $password = $request->password;

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                //return redirect()->intended('dashboard')
                         //   ->withSuccess('Signed in');
                         //dd(auth()->user()->role_id);
                if(auth()->user()->role_id==2){
                    return redirect()->back();
                }else{
                    return redirect()->intended('dashboard')
                           ->withSuccess('Signed in'); 
                }
                
            }
      
            return redirect("/")->withSuccess('Palavra passe ou email invalido tente novamente');
        }

    public function registration()
    {
        return view('auth.registration');
        
    }

    public function recuper_password(){

        return view('recuper_password');
    }

    public function codigo_recuperacao(Request $request){
        $recuperar = Recuperarsenha::where('codigo', $request->codigo)->first(); 
        $email = $recuperar->email;

        return view('alterar_senha', ['email' => $email]);
    }

    public function alterar_senha(Request $request){


        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/')->with('msg', 'Pin alterado com Sucesso');

    }

    public function recuperar(Request $request){

        $user = User::where('email', $request->email)->first();
       // dd($user);
        $recuperar_senha = new Recuperarsenha;
        $recuperar_senha->email = $user->email;
        $recuperar_senha->codigo = rand(1000, 9999).'b'.$user->id;
        $recuperar_senha->save();

        $request->session()->put(['email' => $user->email]);
        
        if($user){
           // dd($membro);
            Mail::send('mail.pdcairline', ['codigo' => $recuperar_senha->codigo], function($m){
                $m->from('muchombo2021@gmail.com', 'Felismino');
                //$m->to($request->email);
                $m->to(request()->session()->get('email'));
                
            });
        }else{
            echo 'Email inexistente';
        } 

        return view('codigo_senha');
    }

    public function gerar(){

        return view('gerar');
    }
    
    public function gerarPdf($id){

      //  $user = auth()->user();
      //dd($id);
        //$id = $this->Encri->desencriptar($id);
        $bilhete = DB::table('bilhetes')->orderBy('id', 'DESC')->first();
        $user = User::where('id', $bilhete->user_id)->first();
        $voo = Voo::where('id', $bilhete->voo_id)->first();
        $tarifa = Tarifa::where('id', $id)->first();
        $totalValor = $bilhete->qtd_passageiro * $tarifa->preco;

        $pdf = Pdf::loadView('gerarpdf', compact('bilhete', 'user', 'voo', 'tarifa', 'totalValor'));
        
        return $pdf->setPaper('a4')->download('bilhete.pdf');
    }

    public function visualizarpdf($id){
        //$id = $this->Encri->desencriptar($id);
       // $user_log = User::where('id', 2)->first();
        $bilhete = DB::table('bilhetes')->orderBy('id', 'DESC')->first();
        $user = User::where('id', $bilhete->user_id)->first();
        $voo = Voo::where('id', $bilhete->voo_id)->first();
        $tarifa = Tarifa::where('id', $id)->first();
        $totalValor = $bilhete->qtd_passageiro * $tarifa->preco;
        //dd($totalValor);
        //dd($tarifa);
        //dd($voo->origem->cidade);

        $pdf = Pdf::loadView('gerarpdf', compact('bilhete', 'user', 'voo', 'tarifa', 'totalValor'));

       return $pdf->setPaper('a4')->stream('bilhete.pdf');
    }

    public function getMembro(){
              
        $user = auth()->user();
       // dd($user);
       
        $membro = Membro::where('user_id', $user->id)->first();
        //dd($membro);
        //dd($membro);
        //$membro = Membro::where('user_id', $user->id)->first();
       // dd($membro);
        return view('membro.dashb', ['membro' => $membro, 'user' => $user]);
    }

    public function membro_logado(){
        
        $user = auth()->user();
        $membro = User::where('id', $user->id)->first();
        if($membro){
            return $membro->email;
        }
        return false;  
    }

    public function getUser(){

        $user = auth()->user();
        $membro = Membro::where('user_id', $user->id)->first();
        $user_membro = User::where('id', $user->id)->first();
       // dd($membro->birthday->format('Y-m-d'));
        //echo $membro->telefone;
        
        return view('membro.dados_user', ['membro' => $membro]);
    }

    public function getDashMembro(){

        return view('membro.dashboard');
    }

    
      
    public function userRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    

    public function comprar_bilhete_com_milha(){

        $voos = Voo::all();

        return view('compra_com_milha', ['voos' => $voos]);
    }

    public function get_info_milha(){

        return view('membro.info_milha');
    }

    public function reclamar_milha(){

        $user = auth()->user();
        $user_membro = User::where('id', $user->id)->first();

        return view('membro.reclama_milha', [ 'user_membro' => $user_membro]);
    }

    public function dados_reclame(Request $request){

        $reclamacao = new Reclamacao;
        $reclamacao->bilhete_id = $request->num_bilhete;
        $reclamacao->descricao = $request->descricao;
        $reclamacao->save();

        //por a mensagem de sucesso
        return redirect('/membro-dashboard');
    }

    public function conf_bilhete(){

        return view('conf_bilhete');
    }

    public function teste(Request $request, $id_voo, $adult, $lugares, $tarifa, $crianca=null){
       //dd($id_voo);
       $id_voo = $this->Encri->desencriptar($id_voo);
       $adult = $this->Encri->desencriptar($adult);
       $tarifa = $this->Encri->desencriptar($tarifa);
       $lugares = $this->Encri->desencriptar($lugares);

       $tarifa =Tarifa::where('nome', $tarifa)->first();
       //dd($tarifa);
       
       $totalpassageiro = $adult;
        if($crianca!=null){
            $crianca = $this->Encri->desencriptar($crianca);
            $crianca = $crianca;
            $totalpassageiro = $adult + $crianca;
        }
        //dd($totalpassageiro);
        
        json_decode($lugares);
        $lugares = explode(",", $lugares);
        $request->session()->put(['lugares' => $lugares]);

        return view('users', ['lugares' => $lugares, 'adult' => $adult, 'crianca' => $crianca, 'id_voo' => $id_voo, 'tarifa' => $tarifa, 'totalpassageiro' => $totalpassageiro]);
    }


    public function update(Request $request, $id){
        
        $user = User::findOrfail($id);
        $membro = Membro::where('user_id', $id)->first();
       
        $preferencia =Preferencia::findOrfail($membro->preferencia_id);
        $user->titulo = 'Sra';
        $user->name = $request->name;
        $user->surname = $request->sobrenome;
        $user->gender = $request->genero;
        $user->phone = $request->telefone;
        $user->email = $request->email;
        $user->role_id = 2;
        $user->state = 1;
        $user->save();

        $preferencia->refeicao=$request->comida;
        $preferencia->lugar=$request->lugar;
        $preferencia->save();
        
        $membro->idiom = $request->idioma;
        $membro->birthday = $request->birthday;
        $membro->address = $request->morada;
        $membro->miles = 0;
        $membro->user_id = $user->id;
        $membro->preferencia_id = $preferencia->id;

        $membro->save();


        return redirect('/dados_user')->with('msg', 'Actualizado com Sucesso');
    }
    
    public function info_passageiro(Request $request){

        $request->validate([
            'nameadulto1' => 'required|regex:/^[a-zá-ùÁ-Ù][a-zá-ùÁ-Ù]+$/i',
            'sobrenomeadulto1' => 'required|regex:/^[a-zá-ùÁ-Ù][a-zá-ùÁ-Ù]+$/i',
            'telefone1' => 'required|regex:/^[9][0-9]+$/|min:9',
        ]);

        if($request->namecrianca1){
            $request->validate([
                'namecrianca1' => 'required|regex:/^[a-zá-ùÁ-Ù][a-zá-ùÁ-Ù]+$/i',
                'sobrenomecrianca1' => 'required|regex:/^[a-zá-ùÁ-Ù][a-zá-ùÁ-Ù]+$/i',
            ]);
        }
      /*  */
        
        $tarifa = Tarifa::where('id', $request->tarifa)->first();
        $id_tarifa = $tarifa->id;
        //$id_tarifa = $tarifa->id;
        $lugares = $request->session()->get('lugares');

        if(auth()->user()){
            $user = auth()->user();
        }else{
            $user = new User;
            $user->name = $request->nameadulto1;
            $user->surname = $request->sobrenomeadulto1;
            $user->phone = $request->telefone1;
            //dd($request->email1);
            $user->email = $request->email1;
           // dd()
            $user->role_id = 3;
            $user->save();
/*

            $bilhete = new Bilhete;
            $bilhete->data_compra=date("Y-m-d");
            $bilhete->user_id=$user->id;
            $bilhete->save();

            //another ones

            $passageiro = new Passageiro;
            $passageiro->user_id = $user->id;
            $passageiro->save();*/
        }
        
        $referencia = new Referencia;
        $ref_gerada = $this->Encri->encriptar(rand(0, 1000093876423467));
        $referencia->nome = $ref_gerada;
        $referencia->user_id = $user->id;
        $referencia->save();
        
        $bilhete = new Bilhete;
        $bilhete->user_id = $user->id;
        $bilhete->voo_id = $request->id_voo;
        $bilhete->qtd_passageiro = $request->totalpassageiro;
        $bilhete->data_compra=date("Y-m-d");
        $bilhete->codigo = rand(1000, 9999).$user->id;
        $bilhete->save();

        //mensagem api
       /* $basic  = new \Nexmo\Client\Credentials\Basic('f44e9ea7', 'KitfEggAOkItBlL4');
        $client = new \Nexmo\Client($basic);
 
        $message = $client->message()->send([
            'to' => '+244938097392',
            'from' => 'Clever',
            'text' => 'Feliz Ano Novo'
        ]);
 
        dd('SMS message has been delivered.');*/



        $voo = Voo::where('id', $request->id_voo)->first();
    //dd($voo);
        for($i=0; $i<count($lugares); $i++){

           
            $voo->str_lugar=$voo->str_lugar." ".$lugares[$i];

        }
        $voo->save();
        $precototal = $request->totalpassageiro * $tarifa->preco;
        return view('referencia_user', ['ref_gerada' => $ref_gerada, 'precototal' => $precototal, 'id_tarifa' => $id_tarifa]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('admin/dashboard');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

    public function show($id)
    {
        $Bilhete = Bilhete::join('users', 'users.id', '=', 'bilhetes.user_id')
            ->Where('bilhetes.id','=',$id)
            ->get(['bilhetes.*', 'users.name']);

            //dd($Bilhete);

        $res="";
        if($Bilhete){
            foreach($Bilhete as $bilhete){

        
           $res= "<div class = 'row-sl-6' >".
                    "<div class='card'>"
                        ."<div class='card-body'>"
                            ."<h5 class='card-title'>Bilhete nº : "."$bilhete->id"."</h5>"
                            ."<p class='card-text'> data de partida:".$bilhete->data_compra."</p>"
                            ."<p class='card-text'> origem:".$bilhete->name."</p>"
                                
                    
                        ."</div>"

                      
                        ."<div class='card-body'>"
                           

                                ."<a href=/actualizarBilhete/"."$bilhete->id". " class='btn btn-primary mx-2'> Alterar O Bilhete</a>"
                                
        
                                ."<a href=/reembolsarBilhete/"."$bilhete->id". " class='btn btn-primary mx-2'>Pedir Reembolso</a>"

                    ."</div>"
                  
                    ."</div>"

                ."</div>\n";
            }
        }
        else{
            $res="Nâo Existe Bilhete com Este codigo";
        }
  
        echo ($res);

    }

    public function reembolsar($id)
    {
        
        return view('bilheteRemb',['bi_id'=>$id]);
    }

    public function reembolso_create(Request $request){

        $reembolso = new Reembolso;
        $reembolso->bilhete_id = $request->bi_id;
        $reembolso->descricao = $request->descricao;
        $reembolso->resposta = $request->resposta;
        $reembolso->save();

        return redirect('/')->with('msg', 'Reembolso feito com sucesso');
//dd($reembolso);
    }
}