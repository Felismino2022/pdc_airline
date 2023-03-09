@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
   
    <button id="btn_add_voo" class="btn btn-block btn-success px-2" 
                data-toggle="modal" data-target="#modal_add_voo" >
                Adicionar voos
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
                <h3 class="card-title">voos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Data de partida</th>
                      <th>Data de destino</th>
                      <th>local de partida</th>
                      <th>local de destino</th>
                      <th>frota</th>
                      <th>accão</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($voos as $voo)
                    <tr>
                      <td>{{$voo->id}}</td>
                      <td>{{$voo->data_partida}}</td>
                      <td>{{$voo->data_regresso}}</td>
                      <td>{{$voo->origem->nome}}</td>
                      <td>{{$voo->origem->nome}}</td>
                      <td>{{$voo->frota->marca}}</td>
                      
                      <td style="width: 180px">
                      @if(($autorizacao->voo == 'editar')||($autorizacao->voo == 'tudo')||($autorizacao->voo== 'escrever/ler'))     
                      <button id="editarBtnVoo" data-toggle="modal" data-target="#modal_edit_voo"  
                      data-id="{{$voo->id}}" data-url="{{route('voo.edit',$voo->id)}}" class="btn btn-primary" style="border-radius:60px;"><i class="fa fa-edit"></i></button>
                      @endif

                      @if(($autorizacao->voo == 'editar')||($autorizacao->voo == 'tudo')||($autorizacao->voo== 'escrever/ler'))
                          <button  id="vooDetails" data-toggle="modal" data-target="#modal_view_voo" 
                          data-id="{{$voo->id}}" data-url="{{route('voo.edit',$voo->id)}}"  class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>
                      @endif

                      @if(($autorizacao->voo == 'editar')||($autorizacao->voo == 'tudo')||($autorizacao->voo== 'escrever/ler'))
                      <a href="{{route('voo.delete',$voo->id)}}"
                        class="btn btn-danger" style="border-radius:60px;" data-id="{{$voo->id}}" onclick="return confirm('Tens a Certeza que deseja eliminar?')"><i
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

     




      <div class="modal fade" id="modal_add_voo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar voos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="adicionarVooFrom" data-action="{{ route('voo.add') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="dp_add">Data de partida</label>
                          <input type="date" class="form-control" name="partida" id="dp_add" placeholder="data de partida">
                    </div>

                  </div>

                  <div class ="col">
                    <div class="form-group">
                          <label for="dd_add">Data de regresso</label>
                          <input type="date" class="form-control" name="regresso" id="dd_add" placeholder="data de chegada">
                    </div>

                  </div>

                </div>



                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="hp_add">Hora de partida</label>
                          <input type="text" class="form-control" name="h_partida" id="hp_add" placeholder="hora de partida">
                    </div>

                  </div>

                  <div class ="col">
                    <div class="form-group">
                          <label for="hd_add">Hora de regresso</label>
                          <input type="text" class="form-control" name="h_regresso" id="hd_add" placeholder="hora de chegada">
                    </div>

                  </div>

                </div>

                  

              <div class="row">

              <div class ="col">
                <div class="form-group">
                      <label for="lp_add">Local de partida</label>
                      <select name="origem" id="lp_add" class="custom-select browser-default select2">
                                            <option value=""> Local de origem</option>
                                            @foreach ($aeroportos as $aeroporto)
                                        
                                                <option value="{{$aeroporto->id}}"> {{$aeroporto->nome}}</option>
                                        
                                           
                                            @endforeach
                         </select>
                </div>

              </div>

              <div class ="col">
                <div class="form-group">
                      <label for="ld_add">Local de destino</label>
                      <select name="destino" id="ld_add" class="custom-select browser-default select2">
                                            <option value=""> Local de destino</option>
                                            @foreach ($aeroportos as $aeroporto)
                                        
                                                <option value="{{$aeroporto->id}}"> {{$aeroporto->nome}}</option>
                                        
                                           
                                            @endforeach
                         </select>
                </div>

              </div>

              </div>

              <div class="row">

                <div class ="col">
                  <div class="form-group">
                        <label for="frota_add">Frota</label>
                        <select name="frota" id="frota_add" class="custom-select browser-default select2">
                                                            <option value=""> frotas</option>
                                                            @foreach ($frotas as $frota)
                                                        
                                                                <option value="{{$frota->id}}"> {{$frota->marca}}</option>
                                                        
                                                          
                                                            @endforeach
                        </select>
                  </div>

                </div>


                <div class ="col">
                  <div class="form-group">

                  <label for="imagem_add">imagem</label>
                                                            
                   <input type="file" class="form-control" name="imagem" id="imagem_add">
                        
                        
                  </div>

                </div>
                <h6>Tarifas</h6>
                <div class="row">
                  @foreach ($tarifas as $tarifa)
                  <div class="col">
                        {{$tarifa->id}}: <input type="checkbox" name="{{$tarifa->id}}">
       
                  </div>   
                  @endforeach

                    




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

      <div class="modal fade" id="modal_edit_voo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar voos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="editarVooFrom"  method="post">
              @csrf
              <div class="response"></div>
  
                <div class="card-body">

                <div class="row">

                  <div class ="col">
                    <div class="form-group">
                          <label for="dp_edit">Data de partida</label>
                          <input type="date" class="form-control" name="partida" id="dp_edit" placeholder="data de partida">
                    </div>

                  </div>

                  <div class ="col">
                    <div class="form-group">
                          <label for="dd_edit">Data de destino</label>
                          <input type="date" class="form-control" name="regresso" id="dd_edit" placeholder="data de chegada">
                    </div>

                  </div>

                </div>

                <div class="row">

<div class ="col">
  <div class="form-group">
        <label for="hp_edit">Hora de partida</label>
        <input type="text" class="form-control" name="h_partida" id="hp_edit" placeholder="hora de partida">
  </div>

</div>

<div class ="col">
  <div class="form-group">
        <label for="hd_edit">Hora de regresso</label>
        <input type="text" class="form-control" name="h_regresso" id="hd_edit" placeholder="hora de chegada">
  </div>

</div>

</div>
                  

              <div class="row">

              <div class ="col">
                <div class="form-group">
                      <label for="lp_edit">Local de partida</label>
                      <select name="origem" id="lp_edit" class="custom-select browser-default select2">
                                            <option value=""> Local de origem</option>
                                            @foreach ($aeroportos as $aeroporto)
                                        
                                                <option value="{{$aeroporto->id}}"> {{$aeroporto->nome}}</option>
                                        
                                           
                                            @endforeach
                         </select>
                </div>

              </div>

              <div class ="col">
                <div class="form-group">
                      <label for="ld_edit">Local de destino</label>
                      <select name="destino" id="ld_edit" class="custom-select browser-default select2">
                                            <option value=""> Local de destino</option>
                                            @foreach ($aeroportos as $aeroporto)
                                        
                                                <option value="{{$aeroporto->id}}"> {{$aeroporto->nome}}</option>
                                        
                                           
                                            @endforeach
                         </select>
                </div>

              </div>

              </div>

              <div class="row">

<div class ="col">
  <div class="form-group">
        <label for="frota_edit">Frota</label>
        <select name="frota" id="frota_edit" class="custom-select browser-default select2">
                                            <option value=""> frotas</option>
                                            @foreach ($frotas as $frota)
                                        
                                                <option value="{{$frota->id}}"> {{$frota->marca}}</option>
                                        
                                           
                                            @endforeach
                         </select>
  </div>

</div>

            <h6>Tarifas</h6>
                <div class="row">
                  @foreach ($tarifas as $tarifa)
                  <div class="col">
                        {{$tarifa->id}}: <input type="checkbox" id="{{$tarifa->id}}">
       
                  </div>   
                  @endforeach

                </div>
                
                </div>
                <!-- /.card-body -->
                <input type="text" name="voo_id" id="voo_id" hidden>

                <div class="card-footer">
                
                </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">sair</button>
              <button  class="btn btn-success pull-right" >Salvar as Alterações</button>
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


      <div class="modal fade" id="modal_view_voo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detalhes do Voo</h4>
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
                                    <td><b>data de partida</b></td>
                                    <td id="ver_dp"></td>
                                </tr>

                                <tr>
                                    <td><b>data de destino</b></td>
                                    <td id="ver_dd"></td>
                                </tr>

                                <tr>
                                    <td><b>local de origem</b></td>
                                    <td id="ver_lp"></td>
                                </tr>


                                <tr>
                                    <td><b>local de destino</b></td>
                                    <td id="ver_ld"></td>
                                </tr>

                                <tr>
                                    <td><b>frota</b></td>
                                    <td id="ver_frota"></td>
                                </tr>

                                <tr>
                                    <td><b>tarifa</b></td>
                                    <td id="ver_tarifa"></td>
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
  <script src="{{ asset('/js/admin/voo.js') }}"></script>
@endsection
