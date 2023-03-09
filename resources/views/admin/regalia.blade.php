@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
   
    <button id="btn_add_uti" class="btn btn-block btn-success px-2" 
                data-toggle="modal" data-target="#modal_add_uti" >
                Adicionar Regalias
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
                <h3 class="card-title">Regalias</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>nome</th>
                     
                      <th>accão</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($regalias as $regalia)
                    <tr> 
                      <td>{{$regalia->id}}</td>
                      <td>{{$regalia->nome}}</td>
                     
                      <td style="width: 180px">
                      @if(($autorizacao->regalia == 'editar')||($autorizacao->regalia == 'tudo')||($autorizacao->regalia== 'escrever/ler'))
                      <button id="editarBtnRegalia" data-toggle="modal" data-target="#modal_edit_uti"  
                      data-id="{{$regalia->id}}" data-url="{{route('regalia.edit',$regalia->id)}}" class="btn btn-primary" style="border-radius:60px;"><i class="fa fa-edit"></i></button>
                      @endif

                      @if(($autorizacao->regalia == 'editar')||($autorizacao->regalia == 'tudo')||($autorizacao->regalia== 'escrever/ler'))
                          <button  id="regaliaDetails" data-toggle="modal" data-target="#modal_view_uti" 
                          data-id="{{$regalia->id}}" data-url="{{route('regalia.edit',$regalia->id)}}"  class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>
                      @endif

                      @if(($autorizacao->regalia == 'editar')||($autorizacao->regalia == 'tudo')||($autorizacao->regalia== 'escrever/ler'))
                      <a href="{{route('regalia.delete',$regalia->id)}}"
                        class="btn btn-danger" style="border-radius:60px;" data-id="{{$regalia->id}}" onclick="return confirm('Tens a Certeza que deseja eliminar?')"><i
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
              <h4 class="modal-title">Adicionar regalias</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="adicionarRegaliaFrom" data-action="{{ route('regalia.add') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="nome_regalia_add">Nome</label>
                          <input type="text" class="form-control" name="nome" id="nome_regalia_add" placeholder="nome">
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

      <div class="modal fade" id="modal_edit_uti">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar regalias</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="editarRegaliaFrom"  method="post">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="nome_regalia_edit">Nome</label>
                          <input type="text" class="form-control" name="nome" id="nome_regalia_edit" placeholder="nome">
                    </div>

                  </div>

               
                  

                </div>
                  
               
                  <input type="text" name="regalia_id"id="regalia_id" hidden>

                 

                  

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
              <h4 class="modal-title">Detalhes da Regalia  </h4>
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
  <script src="{{ asset('/js/admin/regalia.js') }}"></script>
@endsection
