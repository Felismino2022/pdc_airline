
function scrollbaixo(element){
  document.querySelector(element).scrollIntoView({behavior:"smooth"})
}


  $("#encontrar_voo").on("click",function(){
    //console.log('baixo')
    var campo_vazio = false;
    //alert('clicou no botao');
    var data_partida = $("#data_partida").val();
    var control = 1
    var origem_id = $("#origem").val()
    var destino_id = $("#destino").val()
    var data_volta = $(".data_volta").val()
   
    //var teste = $("#onewway").val()


    
     
    
   
      //alert('encontrou')
  
   /*if($('#text-data').html() == 'nenhuma data selecionada'){
    $('#text-data').remove()

   }*/
    
    //verificar se nao escolheu nenhuma data 
    if($('#data_partida').val() == ""){
      //$('#text-data').remove()
      if($('#text-data').html() == 'nenhuma data selecionada'){
        $('#text-data').remove()
       }
      $('#data_partida').css({'border-color' : '#A94442'})
      $('#text-data').append('nenhuma data selecionada')
      //alert()
     /* if($('#text-data').val() !=""){
        $('#text-data').remove()
        $('#text-data').append('nenhuma data selecionada')
      }*/
      return false
  } else {
      $('#data_partida').css({'border-color' : '#ccc'})
      $('#text-data').remove()
  }
//volta
if($("#rtrip").is(":checked")){ //verifica se está checado
  if($('.data_volta').val() == ""){
    //$('#text-data').remove()
    if($('#text-dataVolta').html() == 'nenhuma data de volta selecionada'){
      $('#text-dataVolta').remove()
    }
    $('.data_volta').css({'border-color' : '#A94442'})
    $('#text-dataVolta').append('nenhuma data de volta selecionada')
    //alert()
  /* if($('#text-data').val() !=""){
      $('#text-data').remove()
      $('#text-data').append('nenhuma data selecionada')
    }*/
    return false
  } else {
    $('#data_partida').css({'border-color' : '#ccc'})
    $('#text-data').remove()
  }
}

//


  if(origem_id==destino_id){
    $('#destino').css({'border-color' : '#A94442'})

    if($('#tex-destino').html() == 'o destino coincide com a origem'){
      $('#tex-destino').remove()
     }
    $('#tex-destino').append('o destino coincide com a origem')

    
      return false
  }else {
        $('#destino').css({'border-color' : '#ccc'})
        $('#tex-destino').remove()
    }

    $("#lista_voo").html('');
   // alert(origem_id)
    //alert(destino_id)
     $.ajax({
       url:'ajax-voosData',
       data: {'data_partida': data_partida,
              'origem_id':origem_id,
              'destino_id':destino_id,
              'data_volta':data_volta},
   
       success:function(data){
        console.log(data);
        if(data.length!=0){
          $('#lista_voo').empty();
          $('#info-voo').remove()
          scrollbaixo("#lista_voo")
          $('#lista_voo').append(' <div class=\'col-md-8 col-md-offset-2 text-center gtco-heading\'>'+
          '<p class=\'text-center listaVo\'>Voos encontrados</p>'+
          "<p></p>"
        +"</div>");
         }else{
          $('#info-voo').remove()
          $('#lista_voo').append('<p class="text-ciz text-primary text-center" >nenhum voo com esta especificação encontrado')
          scrollbaixo("#lista_voo")
         }
    

         $.each(data, function(index, voos){
          
          $('#lista_voo').append('<div class="col-lg-4 col-md-4 col-sm-6"><a href="voo/'+ btoa(voos.id)+'" class="fh5co-card-item"><img src="img/paris.jpg" alt="Image" class="img-responsive"><div class="fh5co-text"><h2></h2><p>data de partida : '+voos.data_partida+'</p><p><span style="background-color:#286090;" class="btn btn-primary">Compra já</span></p></div></a></div>')
           
         });
       }
 
      });
 });


 document.querySelector()