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
  
</nav>

    <div class="row mx-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">bilhete</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>data</th>
                      <th>Cliente</th>
                      <th>estado</th>
                      <th>acção</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($bilhetes as $bilhete)
                    <tr>
                      <td>{{$bilhete->id}}</td>
                      <td>{{$bilhete->data_compra}}</td>
                      
                      <td>
                        {{$bilhete->nome}}
                      </td>
                      <td>{{$bilhete->state}}</td>
                      <td>
                     
                      @if(($autorizacao->compra == 'editar')||($autorizacao->compra == 'tudo')||($autorizacao->compra== 'escrever/ler'))
                      <button id="editarBtnReserva" data-toggle="modal" data-target="#modal_edit_res"  
                      data-id="{{$bilhete->id}}" data-url="{{route('bilhete.edit',$bilhete->id)}}" class="btn btn-primary" style="border-radius:60px;"><i class="fa fa-edit"></i></button>
                      @endif

                      @if(($autorizacao->compra == 'editar')||($autorizacao->compra == 'tudo')||($autorizacao->compra== 'escrever/ler'))                     
                          <button  id="reservaDetails" data-toggle="modal" data-target="#modal_view_res" 
                          data-id="{{$bilhete->id}}" data-url="{{route('bilhete.edit',$bilhete->id)}}"  class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>
                      @endif

                      @if(($autorizacao->compra == 'editar')||($autorizacao->compra == 'tudo')||($autorizacao->compra== 'escrever/ler'))
                      <a href="{{route('bilhete.delete',$bilhete->id)}}"
                        class="btn btn-danger" style="border-radius:60px;" data-id="{{$bilhete->id}}" onclick="return confirm('Tens a Certeza que deseja eliminar?')"><i
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
      <div class="modal fade" id="modal_edit_res">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Mudar Estado da compra</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="editarBilheteFrom"  method="post">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">
                  <select class="form-control" id="bilhete_estado_edit" name="estado">
                  <option value="em processo">em processo</option>
                    <option value=cancelado>cancelado</option>
                    <option value="confirmado">confirmado</option>


                  </select>

                </div>
                <!-- /.card-body -->
                <input type="text" name="bilhete_id"id="bilhete_id" hidden>

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

      <div class="modal fade" id="modal_view_res">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detalhes da bilhete</h4>
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
                                    <td><b>cliente</b></td>
                                    <td id="ver_cliente"></td>
                                </tr>
                                <tr>
                                    <td><b>estado</b></td>
                                    <td id="ver_estado"></td>
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
  <script src="{{ asset('/js/admin/reserva.js') }}"></script>
@endsection
