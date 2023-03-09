@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
  @if(($autorizacao->aeroporto == 'escrever')||($autorizacao->aeroporto == 'tudo')||($autorizacao->aeroporto== 'escrever/ler'))
    <button id="btn_add_aer" class="btn btn-block btn-success px-2" 
                data-toggle="modal" data-target="#modal_add_aer" >
                Adicionar Aeroportos
    </button>
 @endif     
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
  
</nav>

    <div class="row mx-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Aeroportos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nome</th>
                      <th>Cidade</th>
                      <th>País</th>
                      <th>accão</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($aeroportos as $aeroporto)
                    <tr>
                      <td>{{$aeroporto->id}}</td>
                      <td>{{$aeroporto->nome}}</td>
                      <td>
                        {{$aeroporto->cidade}}
                      </td>
                      <td>{{$aeroporto->pais}}</td>
                      
                      <td style="width: 180px">
                      @if(($autorizacao->aeroporto == 'editar')||($autorizacao->aeroporto == 'tudo')||($autorizacao->aeroporto== 'escrever/ler'))
                      <button id="editarBtnAeroporto" data-toggle="modal" data-target="#modal_edit_aer"  
                      data-id="{{$aeroporto->id}}" data-url="{{route('aeroporto.edit',$aeroporto->id)}}" class="btn btn-primary" style="border-radius:60px;"><i class="fa fa-edit"></i></button>

                      @endif

                      @if(($autorizacao->aeroporto == 'ler')||($autorizacao->aeroporto == 'tudo')||($autorizacao->aeroporto== 'escrever/ler'))
                          <button  id="aeroportoDetails" data-toggle="modal" data-target="#modal_view_aer" 
                          data-id="{{$aeroporto->id}}" data-url="{{route('aeroporto.edit',$aeroporto->id)}}"  class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>

                      @endif

                      @if(($autorizacao->aeroporto == 'eliminar')||($autorizacao->aeroporto == 'tudo'))
                      <a href="{{route('aeroporto.delete',$aeroporto->id)}}"
                        class="btn btn-danger" style="border-radius:60px;" data-id="{{$aeroporto->id}}" onclick="return confirm('Tens a Certeza que deseja eliminar?')"><i
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

     




      <div class="modal fade" id="modal_add_aer">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar aeroportos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
            <form id="adicionarAeroportoFrom" data-action="{{ route('aeroporto.add') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="nome_aeroporto_add">Nome</label>
                          <input type="text" class="form-control" name="nome_aeroporto" id="nome_aeroporto_add" placeholder="nome">
                    </div>

                  </div>

                  <div class ="col">
                    <div class="form-group">
                          <label for="cidade_aeroporto_add">Cidade</label>
                          <input type="text" class="form-control" name="cidade_aeroporto" id="cidade_aeroporto_add" placeholder="Cidade">
                    </div>

                  </div>

                  

                </div>
                  
                <div class="row">

                  <div class ="col-md-6">
                    <div class="form-group">
                          <label for="pais_aeroporto_add">pais</label>
                          <input type="text" id="pais_aeroporto_add" name="pais_aeroporto" class="form-control">
                        
                    
                    </div>

                  </div>

                 

                  

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

      <div class="modal fade" id="modal_edit_aer">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar aeroportos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="editarAeroportoFrom"  method="POST" >
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="nome_aeroporto_edit">Nome</label>
                          <input type="text" class="form-control" name="nome_aeroporto" id="nome_aeroporto_edit" placeholder="nome">
                    </div>

                  </div>

                  <div class ="col">
                    <div class="form-group">
                          <label for="cidade_aeroporto_edit">Cidade</label>
                          <input type="text" class="form-control" name="cidade_aeroporto" id="cidade_aeroporto_edit" placeholder="Cidade">
                    </div>

                  </div>

                  

                </div>
                <input type="text" name="aeroporto_id" id="aeroporto_id" hidden>
                <div class="row">

                <div class ="col-md-6">
                    <div class="form-group">
                          <label for="pais_aeroporto_add">pais</label>
                          <input type="text" id="pais_aeroporto_edit" name="pais_aeroporto" class="form-control">
                        
                    
                    </div>

                  </div>

                 

                  

                </div>

                


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                
                </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">sair</button>
              <button  class="btn btn-success pull-right" >Editar</button>
            </div>
          </div>
              </form>
            </div>
           
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <div class="modal fade" id="modal_view_aer">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detalhes do Aeroporto</h4>
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
                                    <td id="ver_nome"></td>
                                </tr>
                                <tr>
                                    <td><b>cidade</b></td>
                                    <td id="ver_cidade"></td>
                                </tr>

                                <tr>
                                    <td><b>pais</b></td>
                                    <td id="ver_pais"></td>
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
  <script src="{{ asset('/js/admin/aeroporto.js') }}"></script>
@endsection
