@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    </div>
  </div>
  
  @if ($errors->any())<div class="alert alert-danger">
  <ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  </ul>
  </div>
  @endif
</nav>

    <div class="row mx-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">permissoes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nome</th>
                 
                      <th>tarifa</th>
                      <th>regalia</th>
                      <th>membro</th>
                      <th>frota</th>
                      <th>aeroporto</th>
                      <th>reclamacao</th>
                      <th>reembolso</th>
                      <th>utilizador</th>
                      <th>accao</th>

                    </tr>
                  </thead>
                  <tbody>
                  @foreach($permissoes as $permissao)
                    <tr>
                      <td>{{$permissao->id}}</td>
                      <td>{{$permissao->name}}</td>
                      <td>{{$permissao->tarifa}}</td>
                      <td>{{$permissao->regalia}}</td>
                      <td>{{$permissao->membro}}</td>
                      <td>{{$permissao->frota}}</td>
                      <td>{{$permissao->aeroporto}}</td>
                      <td>{{$permissao->reclamacao}}</td>
                      <td>{{$permissao->reembolso}}</td>
                      <td>{{$permissao->utilizador}}</td>
                   
                     
                      
                      <td style="width: 180px">
                      @if(($autorizacao->permissao == 'editar')||($autorizacao->permissao == 'tudo')||($autorizacao->permissao== 'escrever/ler'))
                      <button id="editarBtnPermissao" data-toggle="modal" data-target="#modal_add_per"  
                      data-id="{{$permissao->id}}" data-url="{{route('permissao.edit',$permissao->id)}}" class="btn btn-primary" style="border-radius:60px;"><i class="fa fa-edit"></i></button>
                      @endif

                      @if(($autorizacao->permissao == 'ver')||($autorizacao->permissao == 'tudo')||($autorizacao->permissao== 'escrever/ler'))
                          <button  id="permissaoDetails" data-toggle="modal" data-target="#modal_view_per" 
                          data-id="{{$permissao->id}}" data-url="{{route('permissao.edit',$permissao->id)}}"  class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>

                      @endif

                      @if(($autorizacao->permissao == 'ver')||($autorizacao->permissao == 'tudo')||($autorizacao->permissao== 'escrever/ler'))
                      <a href="{{route('permissao.delete',$permissao->id)}}"
                        class="btn btn-danger" style="border-radius:60px;" data-id="{{$permissao->id}}" onclick="return confirm('Tens a Certeza que deseja eliminar?')"><i
                                  class="fa fa-trash" alt="delete"></i></a>
                                  @endif           
                      </td>
                    </tr>
                    
                   
                    </tr>
                  @endforeach
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            </div>
      
</div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
   

        <div class="container-fluid">

        <div class="modal fade" id="modal_add_per">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar permissões</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <div class="alert alert-danger print-error-msg" style="display:none">
              <ul></ul>
            </div>
              
              <form id="editarPermissaoFrom" data-action="{{ route('permissao.update') }}" enctype="multipart/form-data">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">
                <div class ="col">
                      <div class="form-group">
                            <label for="compra_permissao_edit">compra</label>
                            <select id="compra_permissao_edit" name="compra" class="form-control">
                              <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="alterar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>
                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

                  <div class ="col">
                      <div class="form-group">
                            <label for="tarifa_permissao_edit">tarifa</label>
                            <select id="tarifa_permissao_edit" name="tarifa" class="form-control">
                              <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="alterar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>
                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

              </div>

              <div class="row">
                <div class ="col">
                      <div class="form-group">
                            <label for="regalia_permissao_edit">regalia</label>
                            <select id="regalia_permissao_edit" name="regalia" class="form-control">
                              <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="alterar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>
                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

                  <div class ="col">
                      <div class="form-group">
                            <label for="membro_permissao_edit">membro</label>
                            <select id="membro_permissao_edit" name="membro" class="form-control">
                              <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="editar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>
                           
                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

              </div>

              <div class="row">
                <div class ="col">
                      <div class="form-group">
                            <label for="frota_permissao_edit">frota</label>
                            <select id="frota_permissao_edit" name="frota" class="form-control">
                              <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="alterar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>
                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

                  <div class ="col">
                      <div class="form-group">
                            <label for="aeroporto_permissao_edit">aeroporto</label>
                            <select id="aeroporto_permissao_edit" name="aeroporto" class="form-control">
                            <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="alterar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>
                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

              </div>

              <div class="row">
                <div class ="col">
                      <div class="form-group">
                            <label for="reembolso_permissao_edit">reembolso</label>
                            <select id="reembolso_permissao_edit" name="reembolso" class="form-control">
                              <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="alterar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>
                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

                  <div class ="col">
                      <div class="form-group">
                            <label for="reclamacao_permissao_edit">reclamacão</label>
                            <select id="reclamacao_permissao_edit" name="reclamacao" class="form-control">
                              <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="alterar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>
                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

              </div>


              <div class="row">
                <div class ="col">
                      <div class="form-group">
                            <label for="voo_permissao_edit">voo</label>
                            <select id="voo_permissao_edit" name="voo" class="form-control">
                              <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="alterar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>
                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

                  <div class ="col">
                      <div class="form-group">
                            <label for="utilizador_permissao_edit">utilizador</label>
                            <select id="utilizador_permissao_edit" name="utilizador" class="form-control">
                              <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="alterar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>
                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

                  <div class ="col">
                      <div class="form-group">
                            <label for="permissao_permissao_edit">permissao</label>
                            <select id="permissao_permissao_edit" name="permissao" class="form-control">
                              <option value=""></option>
                              <option value="ler">ler</option>
                              <option value="escrever">escrever</option>
                              <option value="escrever/ler">escrever/ler</option>
                              <option value="alterar">alterar</option>
                              <option value="bloqueado">bloqueado</option>
                              <option value="tudo">tudo</option>

                              <option value="eliminar">eliminar</option>
                            </select>
                      
                      </div>

                  </div>

              </div>


            
                  <input type="text" name="permissao_id" id="permissao_id" hidden>

                <!-- /.card-body -->

                <div class="card-footer">
                
                </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">sair</button>
              <button  class="btn btn-success pull-right" >Salvar</button>
            </div>
          </div>
              </form>
            </div>
           
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->    

      <div class="modal fade" id="modal_view_uti">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detalhes do Users</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form>
                <div class="card-body">

                <table class="table table-responsive table-bordered">
                                <!-- <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Detail</th>
                                </tr>
                                </thead> -->
                                <tbody>
                                <tr>
                                    <td><b>Codigo</b></td>
                                    <td id="ver_id"></td>
                                </tr>
                                <tr>
                                    <td><b>Nome</b></td>
                                    <td id="ver_name"></td>
                                </tr>
                                <tr>
                                    <td><b>email</b></td>
                                    <td id="ver_email"></td>
                                </tr>

                                <tr>
                                    <td><b>genero</b></td>
                                    <td id="ver_gender"></td>
                                </tr>
                               
                               
                             
                    
                                </tbody>
                            </table>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
             
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  
      
   
 
  

        <!-- Small boxes (Stat box) -->
       
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            
              
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
        

                <!-- Contacts are loaded here -->
            
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('javascript')
  <script src="{{ asset('/js/admin/permissao.js') }}"></script>
@endsection
