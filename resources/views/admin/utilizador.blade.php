@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
   
    <button id="btn_add_uti" class="btn btn-block btn-success px-2" 
                data-toggle="modal" data-target="#modal_add_uti" >
                Adicionar Utilizadores 
    </button>
      
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
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
                <h3 class="card-title">Utilizadores</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nome</th>
                      <th>email</th>
                      <th>genero</th>
                      <th>accão</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($utilizadores as $utilizador)
                    <tr>
                      <td>{{$utilizador->id}}</td>
                      <td>{{$utilizador->name}}</td>
                      <td>
                        {{$utilizador->email}}
                      </td>
                      <td><span class="badge bg-success">{{$utilizador->gender}}</span></td>
                      
                      <td style="width: 180px">
                      @if(($autorizacao->utilizador == 'editar')||($autorizacao->utilizador == 'tudo')||($autorizacao->utilizador== 'escrever/ler'))      
                      <button id="editarBtnUser" data-toggle="modal" data-target="#modal_edit_uti"  
                      data-id="{{$utilizador->id}}" data-url="{{route('utilizador.edit',$utilizador->id)}}" class="btn btn-primary" style="border-radius:60px;"><i class="fa fa-edit"></i></button>
                      @endif
                      @if(($autorizacao->utilizador == 'editar')||($autorizacao->utilizador == 'tudo')||($autorizacao->utilizador== 'escrever/ler'))
                          <button  id="userDetails" data-toggle="modal" data-target="#modal_view_uti" 
                          data-id="{{$utilizador->id}}" data-url="{{route('utilizador.edit',$utilizador->id)}}"  class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>
                      @endif

                      @if(($autorizacao->utilizador == 'editar')||($autorizacao->utilizador == 'tudo')||($autorizacao->utilizador== 'escrever/ler'))
                      <a href="{{route('utilizador.delete',$utilizador->id)}}"
                        class="btn btn-danger" style="border-radius:60px;" data-id="{{$utilizador->id}}" onclick="return confirm('Tens a Certeza que deseja eliminar?')"><i
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

     




      <div class="modal fade" id="modal_add_uti">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar Utilizadores</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <div class="alert alert-danger print-error-msg" style="display:none">
              <ul></ul>
            </div>
              
              <form id="adicionarUserFrom" data-action="{{ route('user.add') }}" enctype="multipart/form-data">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="pri_nome_utilizador_add">Primeiro Nome</label>
                          <input type="text" class="form-control" name="user_first_name" id="pri_nome_utilizador_add" placeholder="primeiro nome">
                  
                          <span class="text-danger error-text user_first_name_err"></span>
                    </div>

                  </div>

                  <div class ="col">
                    <div class="form-group">
                          <label for="nome_utilizador_add">Ultimo Nome</label>
                          <input type="text" class="form-control" name="user_last_name" id="ult_nome_utilizador_add" placeholder="ultimo nome">
                          <span class="text-danger error-text user_last_name_err"></span>
                  </div>

                  </div>

                  

                </div>
                  
                <div class="row">

                  <div class ="col-md-2">
                    <div class="form-group">
                          <label for="genero_utilizador_add">genero</label>
                          <select id="genero_utilizador_add" name="user_gender" class="form-control">
                          
                            <option value=""></option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                          </select>

                          <span class="text-danger error-text user_gender_err"></span>
 
                    
                    </div>

                  </div>

                  <div class ="col-md-10">
                  <div class="form-group">
                      <label for="email_utilizador_add">Email Do Utilizador</label>
                      <input type="email" class="form-control" name="user_email"id="email_utilizador_add" placeholder="Digite O Email Do Utilizador">
                      <span class="text-danger error-text user_email_err"></span>
                  </div>

                  </div>

                  

                </div>

                

                  <div class="form-group">
                    <label for="passe_utilizador_add">Palavra Passe</label>
                    <input type="password" name="user_pass" class="form-control" id="passe_utilizador_add" placeholder="Password">
                    <span class="text-danger error-text user_pass_err"></span>
                  </div>

                </div>
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

      <div class="modal fade" id="modal_edit_uti">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Utilizadores</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="editarUserFrom"  method="post">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="pri_nome_utilizador_edit">Primeiro Nome</label>
                          <input type="text" class="form-control" name="user_first_name" id="pri_nome_utilizador_edit" placeholder="primeiro nome">
                    </div>

                  </div>

                  <div class ="col">
                    <div class="form-group">
                          <label for="nome_utilizador_edit">Ultimo Nome</label>
                          <input type="text" class="form-control" name="user_last_name" id="ult_nome_utilizador_edit" placeholder="ultimo nome">
                    </div>

                  </div>

                  

                </div>
                  
                <div class="row">

                  <div class ="col-md-2">
                    <div class="form-group">
                          <label for="genero_utilizador_edit">genero</label>
                          <select id="genero_utilizador_edit" name="user_gender" class="form-control">
                            <option value=""></option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                          </select>
                    
                    </div>

                  </div>
                  <input type="text" name="user_id"id="user_id" hidden>

                  <div class ="col-md-10">
                  <div class="form-group">
                      <label for="email_utilizador_edit">Email Do Utilizador</label>
                      <input type="email" class="form-control" name="user_email"id="email_utilizador_edit" placeholder="Digite O Email Do Utilizador">
                  </div>

                  </div>

                  

                </div>

                

                
   
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                
                </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">sair</button>
              <button  class="btn btn-success pull-right" >Salvar as alterações</button>
            </div>
          </div>
              </form>
            </div>
           
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
  <script src="{{ asset('/js/admin/utilizador.js') }}"></script>
@endsection
