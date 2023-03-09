function fetchAllUtilizador(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    document.getElementById("tb_utilizador").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/utilizador.php?fetchutilizador");
    xhttp.send();
  
  
  
  }


  $('#adicionarVooFrom').submit(function () {
  
    console.log("i reached  for you always");
    var url = $(this).attr('data-action');

    $.ajax({
        type: 'post',
        url: url,
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            if (response.done == true) {
                console.log("consegui");
                $('#modal_add_voo').modal('hide');
                $('.response').html('<script>alert("Inserido com sucesso")</script>');
                window.location.href = '/admin/voo';
                
                
            } else {
                $('.response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.data + '</div>');
            }
        }
    });

    return false;
});

$(document).on('click', '#editarBtnVoo', function (e) {
    e.preventDefault();
    

    console.log("i reached  for you always");
    var url = $(this).attr('data-url');
    var voo_id = $(this).attr('data-id');

    console.log(voo_id);

    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
        success: function (response) {
            $('#voo_id').val(voo_id);
           
            $('#dp_edit').val(response.data_partida);
            $('#dd_edit').val(response.data_regresso);

            $('#hp_edit').val(response.hora_partida);
            $('#hd_edit').val(response.hora_regresso);

            $('#lp_edit').val(response.origem_id);
            $('#ld_edit').val(response.destino_id);
          
            $('#frota_edit').val(response.frota_id);
            $('#tarifa_edit').val(response.tarifa_id);
                
          
        }
    });

});


$('#editarVooFrom').submit(function () {

    $.ajax({
        type: 'post',
        url: '/admin/vooupdate',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:
         function (response) {
      
                $('#editarVoo').modal('hide');
                $('.response').html('<script>alert("Editado com sucesso")</script>');
                window.location.href = '/admin/voo';
        
        }
    });

    return false;
});

$(document).on('click', '#vooDetails', function (e) {
    e.preventDefault();
    var url = $(this).attr('data-url');
    var voo_id = $(this).attr('data-id');

    console.log(voo_id);
    console.log("vermais");
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
   
        success: function (response) {
        
                $('#ver_id').html(response.id);
                $('#ver_dp').html(response.data_partida);
                $('#ver_dd').html(response.data_regresso);
                $('#ver_lp').html(response.origem_id);
                $('#ver_ld').html(response.destino_id);
                $('#ver_frota').html(response.frota_id);
                $('#ver_tarifa').html(response.frota_id);

          
        }
    });

});


  
  

  
  
  
  
 