function fetchAllUtilizador(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    document.getElementById("tb_utilizador").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/utilizador.php?fetchutilizador");
    xhttp.send();
  
  
  
  }


  $('#adicionarTarifaFrom').submit(function () {
  
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
                $('#modal_add_tar').modal('hide');
                $('.response').html('<script>alert("Inserido com sucesso")</script>');
                window.location.href = '/admin/tarifa';
                
                
            } else {
                $('.response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.data + '</div>');
            }
        }
    });

    return false;
});

$(document).on('click', '#editarBtnTarifa', function (e) {
    e.preventDefault();
    

    console.log("i reached  for you always");
    var url = $(this).attr('data-url');
    var tarifa_id = $(this).attr('data-id');

    console.log(tarifa_id);

    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
        success: function (response) {
           
            $('#nome_tarifa_edit').val(response.nome);

            $("#checkbox").prop("checked", true);
            
           $('#r1').prop('checked',true);
           $('#r2').prop('checked',true);
           $('#r3').checked=response.r3;
           $('#r4').checked=response.r4;
        
            $('#preco_tarifa_edit').val(response.preco);
            $('#tarifa_id').val(tarifa_id);
            
        
         
                
          
        }
    });

});


$('#editarTarifaFrom').submit(function () {

    $.ajax({
        type: 'post',
        url: '/admin/userupdate',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:
         function (response) {
      
                $('#editarTarifa').modal('hide');
                $('.response').html('<script>alert("Editado com sucesso")</script>');
                window.location.href = '/admin/tarifa';
        
        }
    });

    return false;
});

$(document).on('click', '#tarifaDetails', function (e) {
    e.preventDefault();
    var url = $(this).attr('data-url');
    var user_id = $(this).attr('data-id');

    console.log(user_id);
    console.log("vermais");
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
   
        success: function (response) {
          

                $('#ver_id').html(response.id);
                $('#ver_nome').html(response.id);

          
        }
    });

});


  
  

  
  
  
  
 