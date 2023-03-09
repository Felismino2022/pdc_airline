@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
   
    <button id="btn_add_fro" class="btn btn-block btn-success px-2" 
                data-toggle="modal" data-target="#modal_add_fro" >
                Adicionar Frotas
    </button>
      
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
                <h3 class="card-title">Frotas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Capacidade</th>
                      <th>accão</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($frotas as $frota)
                    <tr>
                      <td>{{$frota->id}}</td>
                      <td>{{$frota->marca}}</td>
                      <td>
                        {{$frota->modelo}}
                      </td>
                      <td>
                        {{$frota->capacidade}}
                      </td>
                      
                      <td style="width: 180px">
                      @if(($autorizacao->frota == 'editar')||($autorizacao->frota == 'tudo')||($autorizacao->frota== 'escrever/ler'))
                      <button id="editarBtnFrota" data-toggle="modal" data-target="#modal_edit_fro"  
                      data-id="{{$frota->id}}" data-url="{{route('frota.edit',$frota->id)}}" class="btn btn-primary" style="border-radius:60px;"><i class="fa fa-edit"></i></button>
                      @endif

                      @if(($autorizacao->frota == 'ver')||($autorizacao->frota == 'tudo')||($autorizacao->frota== 'escrever/ler'))
                          <button  id="frotaDetails" data-toggle="modal" data-target="#modal_view_fro" 
                          data-id="{{$frota->id}}" data-url="{{route('frota.edit',$frota->id)}}"  class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>
                      @endif

                      @if(($autorizacao->frota == 'eliminar')||($autorizacao->frota == 'tudo')||($autorizacao->frota== 'escrever/ler'))
                      <a href="{{route('frota.delete',$frota->id)}}"
                        class="btn btn-danger" style="border-radius:60px;" data-id="{{$frota->id}}" onclick="return confirm('Tens a Certeza que deseja eliminar?')"><i
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

      <div class="modal fade" id="modal_add_fro">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar frotas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="adicionarFrotaFrom" data-action="{{ route('frota.add') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="marca_frota_add">marca</label>
                          <input type="text" class="form-control" name="marca" id="marca_frota_add" placeholder="marca">
                    </div>

                  </div>

                  <div class ="col">
                    <div class="form-group">
                          <label for="modelo_frota_add">Modelo</label>
                          <input type="text" class="form-control" name="modelo" id="modelo_frota_add" placeholder="modelo">
                    </div>

                  </div>

                  

                </div>
                  
              

                  <div class ="col-md-10">
                  <div class="form-group">
                      <label for="capacidade_frota_add">Capacidade</label>
                      <input type="number" class="form-control" name="capacidade" id="capacidade_frota_add" placeholder="Capacidade">
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

      <div class="modal fade" id="modal_edit_fro">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar frotas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="editarFrotaFrom"  method="post">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="marca_frota_edit">marca</label>
                          <input type="text" class="form-control" name="marca" id="marca_frota_edit" placeholder="marca">
                    </div>

                  </div>

                  <div class ="col">
                    <div class="form-group">
                          <label for="modelo_frota_edit">modelo</label>
                          <input type="text" class="form-control" name="modelo" id="modelo_frota_edit" placeholder="modelo">
                    </div>

                  </div>

                  

                </div>
                  
               
                  <input type="text" name="frota_id" id="frota_id" hidden>

                  <div class ="col-md-10">
                  <div class="form-group">
                      <label for="marca_frota_edit">capacidade</label>
                      <input type="text" class="form-control" name="capacidade" id="capacidade_frota_edit" placeholder="marca">
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


      <div class="modal fade" id="modal_view_fro">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detalhes da Frota</h4>
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
                                    <td><b>marca</b></td>
                                    <td id="ver_marca"></td>
                                </tr>
                                <tr>
                                    <td><b>modelo</b></td>
                                    <td id="ver_modelo"></td>
                                </tr>

                                <tr>
                                    <td><b>capacidade</b></td>
                                    <td id="ver_capacidade"></td>
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
  <script src="{{ asset('/js/admin/frota.js') }}"></script>
@endsection
