function fetchAllfrota(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    document.getElementById("tb_frota").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/frota.php?fetchfrota");
    xhttp.send();
  
  
  
  }


  

$(document).on('click', '#editarBtnReclamacao', function (e) {
    e.preventDefault();
    

    console.log("i reached  for you always");
    var url = $(this).attr('data-url');
    var reclamacao_id = $(this).attr('data-id');

    console.log(reclamacao_id);

    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
        success: function (response) {
           
            $('#reclamacao_estado_edit').val(response.estado);
            $('#reclamacao_id').val(reclamacao_id);  
                
          
        }
    });

});


$('#editarReclamacaoFrom').submit(function () {

    $.ajax({
        type: 'post',
        url: '/admin/reclamacaoupdate',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:
         function (response) {
      
                $('#editarReclamacao').modal('hide');
                $('.response').html('<script>alert("Estado alterado com sucesso")</script>');
                window.location.href = '/admin/reclamacao';
        
        }
    });

    return false;
});

$(document).on('click', '#reclamacaoDetails', function (e) {
    e.preventDefault();
    var url = $(this).attr('data-url');
    var frota_id = $(this).attr('data-id');

    console.log(frota_id);
    console.log("vermais");
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
   
        success: function (response) {
          

                $('#ver_id').html(response.id);

                $('#ver_marca').html(response.name+" "+response.marca);
    
                $('#ver_modelo').html(response.modelo);
                $('#ver_capacidade').html(response.capacidade);
                

          
        }
    });

});


  
  

  
  
  
  
 