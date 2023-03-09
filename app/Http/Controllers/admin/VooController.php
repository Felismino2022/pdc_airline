<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Response;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voo;
use App\Models\Voo_Tarifa;
use App\Models\Frota;
use App\Models\Aeroporto;
use App\Models\Tarifa;

class VooController extends Controller
{
    public function index()
    {
        //
        if(Auth::check()){
            $user = Auth::user();
            $voos = Voo::All();
            $aeroportos = Aeroporto::All();
            $frotas = Frota::All();
            $tarifas = Tarifa::All();
            if ($user->role_id==1){
                $autorizacao=$user->permissao;
                return view('admin/voo',
                ['user_name'=>$user->name
                ,'autorizacao'=>$autorizacao
                ,'voos'=>$voos,
                'frotas'=>$frotas,
                'aeroportos'=>$aeroportos,
                'tarifas'=>$tarifas]
            );
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
        
        $voo = new Voo;    
        $voo->data_partida = $request->partida;
        $voo->data_regresso = $request->regresso;

        $voo->hora_partida = $request->h_partida;
        $voo->hora_regresso = $request->h_regresso;

        $voo->origem_id = $request->origem;
        $voo->destino_id =$request->destino;
        $voo->frota_id = $request->frota;

        //$file = $request->file('imagem');
      
        $voo->save();

        
        if ($request->has('1')) {
            $voo_tarifa = new Voo_Tarifa; 
            $voo_tarifa->voo_id=$voo->id;
            $voo_tarifa->tarifa_id=1;
            $voo_tarifa->save();
        }
        
        if ($request->has('2')) {
            $voo_tarifa = new Voo_Tarifa; 
            $voo_tarifa->voo_id=$voo->id;
            $voo_tarifa->tarifa_id=2;
            $voo_tarifa->save();
        }

        if ($request->has('3')) {
            $voo_tarifa = new Voo_Tarifa; 
            $voo_tarifa->voo_id=$voo->id;
            $voo_tarifa->tarifa_id=3;
            $voo_tarifa->save();
        }
        
        if ($request->has('4')) {
            $voo_tarifa = new Voo_Tarifa; 
            $voo_tarifa->voo_id=$voo->id;
            $voo_tarifa->tarifa_id=4;
            $voo_tarifa->save();
        }

        if ($request->has('5')) {
            $voo_tarifa = new Voo_Tarifa; 
            $voo_tarifa->voo_id=$voo->id;
            $voo_tarifa->tarifa_id=5;
            $voo_tarifa->save();
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
        $voo = Voo::find($id);

        $res="";  
        
        if($voo){

            $res=" <div class='container'>"
        	."<div class='card'>"
        		."<div class='card-body'>"
        			."<div class='col-lg-12'>"
						."<div class='row'>"
							."<div class='col-md-12 text-center'>"
								."<h2><b> Departure Searched Flight results</b></h2>"
							."</div>"
						."</div>"
						."<hr class='divider'>"
			
				."<div class='row align-items-center'>"
					."<div class='col-md-3'>"
						."<img src='assets/img' alt=''>"
					."</div>"
					."<div class='col-md-6'>"
						 ."<p><b>".$voo->origem_id.' - '.$voo->origem_id."</b></p>"
						 ."<p><small>Airline:".$voo->origem_id." </b></small></p>"
						 ."<p><small>Departure: <b>".$voo->origem_id."</b></small></p>"
						 ."<p><small>Arrival: <b>".$voo->origem_id."</b></small></p>"
						 ."<p>Available Seats : <b><h4>".$voo->origem_id."</h4></b></p>"
					."</div>"
					."<div class='col-md-3 text-center align-self-end-sm'>"
						."<h4 class='text-right'><b>".$voo->origem_id."</b></h4>"
						."<button class='btn-outline-primary  btn  mb-4 book_flight' type='button' data-id='".$voo->origem_id."  data-name=".$voo->origem_id." data-max=".$voo->origem_id.">Comprar Agora</button>"
					."</div>"
				."</div>"
				."<hr class='divider' style='max-width: 60vw'>";
    }
    
    else{
            $res=" "
            ."<div class='row align-items-center'>"
            ."<h5 class=«text-center'><b>No result.</b></h5>"
        ."</div>"
    
        
   
   ." </div>
    </div>
</div>
</div>";
    }

        
    
        
        echo ($res);
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
        $voo = Voo::find($id);
        return response()->json($voo);
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
        $voo = Voo::find($request->voo_id);
        $voo->data_partida = $request->partida;
        $voo->data_regresso = $request->regresso;
        $voo->origem_id = $request->origem;
        $voo->destino_id =$request->destino;
        $voo->tarifa_id= $request->tarifa;
        $voo->frota_id = $request->frota;
        $voo->save();
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
        Voo::destroy($id);
        return redirect("utilizador.index")->withSuccess('You are not allowed to access');

    }


    public function getVoo($data,$origem,$destino,$qtd_a,$qtd_c)
    {
        $voos = Voo::where('data_partida',$data)
                    ->where('origem_id',$origem)
                    ->where('destino_id',$destino)
                    ->get();

        $res="";

        if($voos){
        
        foreach($voos as $voo){

            $res=" <div class='container'>"
        	."<div class='card'>"
        		."<div class='card-body'>"
        			."<div class='col-lg-12'>"
						."<div class='row'>"
							."<div class='col-md-12 text-center'>"
								."<h2><b> Departure Searched Flight results</b></h2>"
							."</div>"
						."</div>"
						."<hr class='divider'>"
			
				."<div class='row align-items-center'>"
					."<div class='col-md-3'>"
						."<img src='assets/img' alt=''>"
					."</div>"
					."<div class='col-md-6'>"
						 ."<p><b>".$voo->origem_id.' - '.$voo->origem_id."</b></p>"
						 ."<p><small>Airline:".$voo->origem_id." </b></small></p>"
						 ."<p><small>Departure: <b>".$voo->origem_id."</b></small></p>"
						 ."<p><small>Arrival: <b>".$voo->origem_id."</b></small></p>"
						 ."<p>Available Seats : <b><h4>".$voo->origem_id."</h4></b></p>"
					."</div>"
					."<div class='col-md-3 text-center align-self-end-sm'>"
						."<h4 class='text-right'><b>".$voo->origem_id."</b></h4>"
						."<a class='btn-outline-primary  btn  mb-4 book_flight' type='button' data-id=".$voo->origem_id."  data-name=".$voo->origem_id."  href=/voo/".$voo->origem_id." data-max=".$voo->origem_id.">Comprar Agora</a>"
					."</div>"
				."</div>"
				."<hr class='divider' style='max-width: 60vw'>"
                ." </div>
                </div>
            </div>
            </div>";
            }
        }
        else{
            $res=" "
            ."<div class='row align-items-center'>"
            ."<h5 class=«text-center'><b>No result.</b></h5>"
        ."</div>"
    
        
   
   ." </div>
    </div>
</div>
</div>";
        }
        
        
        echo ($res);
    }
}
