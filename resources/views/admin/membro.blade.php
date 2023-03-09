@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
   
   
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
                <h3 class="card-title">Membros</h3>
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
                  @foreach($membros as $membro)
                    <tr>
                      <td>{{$membro->id}}</td>
                      <td>{{$membro->name}}</td>
                      <td>
                        {{$membro->email}}
                      </td>
                      <td><span class="badge bg-success">{{$membro->gender}}</span></td>
                      
                      <td style="width: 180px">
                      @if(($autorizacao->membro == 'editar')||($autorizacao->membro == 'tudo')||($autorizacao->membro== 'escrever/ler'))      
                      <button id="editarBtnMembro" data-toggle="modal" data-target="#modal_edit_mem"  
                      data-id="{{$membro->id}}" data-url="{{route('membro.edit',$membro->id)}}" class="btn btn-primary" style="border-radius:60px;"><i class="fa fa-edit"></i></button>
                      @endif

                      @if(($autorizacao->frota == 'editar')||($autorizacao->frota == 'tudo')||($autorizacao->frota== 'escrever/ler'))
                          <button  id="membroDetails" data-toggle="modal" data-target="#modal_view_mem" 
                          data-id="{{$membro->id}}}" data-url="{{route('membro.edit',$membro->id)}}"  class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>
                      @endif

                    @if(($autorizacao->frota == 'editar')||($autorizacao->frota == 'tudo')||($autorizacao->frota== 'escrever/ler'))
                      <a href="{{route('membro.delete',$membro->id)}}"
                        class="btn btn-danger" style="border-radius:60px;" data-id="{{$membro->id}}}" onclick="return confirm('Tens a Certeza que deseja eliminar?')"><i
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

     




      

      <div class="modal fade" id="modal_edit_mem">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar membros</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="editarMembroFrom"  method="post">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

           
                <div class="row">

                  <div class ="col-md-2">
             

                  </div>

                  <h6>regalias</h6>
                <div class="row">
                  @foreach ($regalias as $regalia)
                  <div class="col">
                        {{$regalia->id}}: <input type="checkbox" value="true" name="{{$regalia->id}}">
       
                  </div>   
                  @endforeach

                </div>
                </div>

                  <input type="text" name="membro_id"id="membro_id" hidden>
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


      <div class="modal fade" id="modal_view_mem">
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
  <script src="{{ asset('/js/admin/membro.js') }}"></script>
@endsection
