<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\cliente\ClienteController;
use App\Http\Controllers\cliente\BilheteController;
use App\Http\Controllers\admin\VooController;
use App\Http\Controllers\admin\UtilizadorController;
use App\Http\Controllers\admin\FrotaController;
use App\Http\Controllers\admin\RegaliaController;
use App\Http\Controllers\admin\TarifaController;
use App\Http\Controllers\admin\MembroController;
use App\Http\Controllers\membro\MembroController as mc;
use App\Http\Controllers\admin\ReservaController;
use App\Http\Controllers\admin\AeroportoController;

use App\Http\Controllers\admin\ReclamacaoController;
use App\Http\Controllers\admin\ReembolsoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*fill routes*/
Route::get('/reembolsarBilhete/{id}', [UserAuthController::class, 'reembolsar']);
Route::post('/eviar_det_rembolso', [UserAuthController::class, 'reembolso_create'])->name('reembolsar_create');
Route::get('/',[ClienteController::class,'index']);
Route::get('/gerarpdf/{id}', [UserAuthController::class, 'gerarPdf']);
Route::get('/visualizarpdf/{id}', [UserAuthController::class, 'visualizarpdf']);
Route::get('/ajax-voosData', [ClienteController::class, 'getVooData'])->name('ajax-voosData');
Route::get('/voo/{id}', [ClienteController::class, 'selecionar_lugar'])->name('voo');
Route::get('/cliente/voo/{id}', [ClienteController::class, 'selecionar_lugar'])->name('voo');
Route::get('dashboard', [ClienteController::class, 'dashboard'])->name('dashboard'); 
//Route::get('/login', [ClienteController::class, 'create_login'])->name('login');
Route::post('/userLogin', [UserAuthController::class, 'userLogin'])->name('login.user'); 
Route::get('registration', [ClienteController::class, 'create'])->name('register');
Route::post('user-registration', [ClienteController::class, 'store'])->name('register.user'); 
Route::get('signout', [ClienteController::class, 'signOut'])->name('signout');
Route::get('/buscarVoo/{data}', [VooController::class, 'getVoo'])->name('voo.data');
Route::get('/comprar_com_milhas', [UserAuthController::class, 'comprar_bilhete_com_milha']);
Route::get('/info_milha', [UserAuthController::class, 'get_info_milha']);
Route::get('/reclamar_milha', [UserAuthController::class, 'reclamar_milha']);
Route::post('/dados_reclame', [ClienteController::class, 'dados_reclame'])->name('dados_reclame');
Route::get('/user/{id_voo}/{adult}/{lugares}/{tarifa}/{crianca?}', [UserAuthController::class, 'teste']);
Route::post('/info_passageiro', [UserAuthController::class, 'info_passageiro']);
//Route::post('/dados_reclame', [UserAuthController::class, 'dados_reclame']);
Route::get('/recuper_password', [UserAuthController::class, 'recuper_password']);
Route::post('/recuperar', [UserAuthController::class, 'recuperar']);
Route::get('/conf_bilhete', [UserAuthController::class, 'conf_bilhete']);

Route::post('/codigo_recuperacao', [UserAuthController::class, 'codigo_recuperacao']);
Route::post('/alterar_senha', [UserAuthController::class, 'alterar_senha']);




//end fill




Route::get('/cliente/lista-voo', [ClienteController::class, 'mostrarVoo'])->name('lista.voo');




Route::get('/',[ClienteController::class,'index']
)->name('home');;
//All customer´s routes
Route::get('dashboard', [ClienteController::class, 'dashboard'])->name('dashboard'); 
//Route::get('login', [ClienteController::class, 'create_login'])->name('login');
//Route::post('user-login', [ClienteController::class, 'userLogin'])->name('login.user'); 
Route::get('registration', [ClienteController::class, 'create'])->name('register');
Route::post('user-registration', [ClienteController::class, 'store'])->name('register.user'); 
Route::get('signout', [ClienteController::class, 'signOut'])->name('signout');
Route::get('/buscarVoo/{data}/{origem}/{destino}/{qtd_a}/{qtd_c}', [VooController::class, 'getVoo'])->name('voo.data');
Route::get('/getBilhete/{id}', [BilheteController::class, 'show'])->name('getBilhete.show');

Route::get('/actualizarBilhete/{id}', [BilheteController::class, 'edit'])->name('getBilhete.edit');
Route::post('/actualizarBilheteSet/{id}', [BilheteController::class, 'update'])->name('getBilhete.update');
//Route::get('/reembolsarBilhete/{id}', [BilheteController::class, 'reembolsar'])->name('getBilhete.reembolsar');





//clientes

Route::get('/cliente/comprar/{id}/{qtd_a}/{qtd_c}', [ClienteController::class, 'comprar_create'])->name('comprar.create');

Route::post('/cliente/pagamento/{id}', [ClienteController::class, 'comprar_store'])->name('comprar.store');

Route::get('/cliente/bilhete', [ClienteController::class, 'configurar_bi'])->name('bi.conf');

//grupo de rotas acessados pelo administrador
Route::group(['middleware' => ['admin']], function(){
    
Route::get('/admin/utilizador', [UtilizadorController::class, 'index'])->name('utilizador.index');
 
Route::post('/admin/useradd', [UtilizadorController::class, 'store'])->name('user.add'); 


//utlizador
Route::get('/admin/userget/{id}', [UtilizadorController::class, 'edit'])->name('utilizador.edit'); 
Route::post('/admin/userupdate', [UtilizadorController::class, 'update'])->name('utilizador.update'); 
Route::get('/admin/userdelete/{id}', [UtilizadorController::class, 'destroy'])->name('utilizador.delete'); 

//frota
Route::get('/admin/frota', [FrotaController::class, 'index'])->name('frota.index');
Route::get('/admin/frotaget/{id}', [FrotaController::class, 'edit'])->name('frota.edit'); 
Route::post('/admin/frotaupdate', [FrotaController::class, 'update'])->name('frota.update'); 
Route::get('/admin/frotadelete/{id}', [FrotaController::class, 'destroy'])->name('frota.delete');
Route::post('/admin/frotaadd', [FrotaController::class, 'store'])->name('frota.add'); 

//membro
Route::get('/admin/membro', [MembroController::class, 'index'])->name('membro.index');
Route::get('/admin/membroget/{id}', [MembroController::class, 'edit'])->name('membro.edit'); 
Route::post('/admin/membroupdate', [MembroController::class, 'update'])->name('membro.update'); 
Route::get('/admin/membrodelete/{id}', [MembroController::class, 'destroy'])->name('membro.delete');
Route::post('/admin/membroadd', [MembroController::class, 'store'])->name('membro.add'); 

//aeroporto
Route::get('/admin/aeroporto', [AeroportoController::class, 'index'])->name('aeroporto.index');
Route::get('/admin/aeroportoget/{id}', [AeroportoController::class, 'edit'])->name('aeroporto.edit'); 
Route::post('/admin/aeroportoupdate', [AeroportoController::class, 'update'])->name('aeroporto.update'); 
Route::get('/admin/aeroportodelete/{id}', [AeroportoController::class, 'destroy'])->name('aeroporto.delete');
Route::post('/admin/aeroportoadd', [AeroportoController::class, 'store'])->name('aeroporto.add'); 

//voo
Route::get('/admin/voo', [VooController::class, 'index'])->name('voo.index');
Route::get('/admin/vooget/{id}', [VooController::class, 'edit'])->name('voo.edit'); 
Route::post('/admin/vooupdate', [VooController::class, 'update'])->name('voo.update'); 
Route::get('/admin/voodelete/{id}', [VooController::class, 'destroy'])->name('voo.delete');
Route::post('/admin/vooadd', [VooController::class, 'store'])->name('voo.add');

//Reserva
Route::get('/admin/reserva', [ReservaController::class, 'index'])->name('bilhete.index');
Route::get('/admin/reservaget/{id}', [ReservaController::class, 'edit'])->name('bilhete.edit'); 
Route::post('/admin/reservaupdate', [ReservaController::class, 'update'])->name('bilhete.update'); 
Route::get('/admin/reservadelete/{id}', [ReservaController::class, 'destroy'])->name('bilhete.delete');
Route::post('/admin/reservaadd', [ReservaController::class, 'store'])->name('bilhete.add');

//regalia
Route::get('/admin/regalia', [RegaliaController::class, 'index'])->name('regalia.index');
Route::get('/admin/regaliaget/{id}', [RegaliaController::class, 'edit'])->name('regalia.edit'); 
Route::post('/admin/regaliaupdate', [RegaliaController::class, 'update'])->name('regalia.update'); 
Route::get('/admin/regaliadelete/{id}', [RegaliaController::class, 'destroy'])->name('regalia.delete');
Route::post('/admin/regaliaadd', [RegaliaController::class, 'store'])->name('regalia.add');

//tarifa
Route::get('/admin/tarifa', [TarifaController::class, 'index'])->name('tarifa.index');
Route::get('/admin/tarifaget/{id}', [TarifaController::class, 'edit'])->name('tarifa.edit'); 
Route::post('/admin/tarifaupdate', [TarifaController::class, 'update'])->name('tarifa.update'); 
Route::get('/admin/tarifadelete/{id}', [TarifaController::class, 'destroy'])->name('tarifa.delete');
Route::post('/admin/tarifaadd', [TarifaController::class, 'store'])->name('tarifa.add');

});


//grupo de rotas que pode ser acessado pelo membro

Route::group(['middleware' => ['membro']], function(){


Route::get('/membro/dashboard-membro', [mc::class, 'index'])->name('dashboard.membro'); 
    //Reclamacao
Route::get('/admin/reclamacao', [ReclamacaoController::class, 'index'])->name('reclamacao.index');
Route::get('/admin/reclamacao/{id}', [ReclamacaoController::class, 'edit'])->name('reclamacao.edit'); 
Route::post('/admin/reclamacaoupdate', [ReclamacaoController::class, 'update'])->name('reclamacao.update'); 

//Reembolso
Route::get('/admin/reembolso', [ReembolsoController::class, 'index'])->name('reembolso.index');
Route::get('/admin/reembolso/{id}', [ReembolsoController::class, 'edit'])->name('reembolso.edit'); 
Route::post('/admin/reembolsoupdate', [ReembolsoController::class, 'update'])->name('reembolso.update'); 

Route::get('/membro-dashboard', [UserAuthController::class, 'getMembro'])->name('membro-dashboard');
Route::get('/dados_user', [UserAuthController::class, 'getUser'])->name('dados_user');
Route::get('/dash', [UserAuthController::class, 'getDashMembro'])->name('dash');
Route::put('update_membro/{id}', [UserAuthController::class, 'update']);
});