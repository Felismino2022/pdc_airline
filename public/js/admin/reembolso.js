function fetchAllreembolso(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    document.getElementById("tb_reembolso").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/reembolso.php?fetchreembolso");
    xhttp.send();
  
  
  
  }


  
$(document).on('click', '#editarBtnReembolso', function (e) {
    e.preventDefault();
    

    console.log("i reached  for you always");
    var url = $(this).attr('data-url');
    var reembolso_id = $(this).attr('data-id');

    console.log(reembolso_id);

    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
        success: function (response) {
           
            $('#reembolso_estado_edit').val(response.estado);
            $('#reembolso_id').val(reembolso_id);  
                
          
        }
    });

});


$('#editarreembolsoFrom').submit(function () {

    $.ajax({
        type: 'post',
        url: '/admin/reembolsoupdate',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:
         function (response) {
      
                $('#editarRembolso').modal('hide');
                $('.response').html('<script>alert("Estado Alterado com sucesso")</script>');
                window.location.href = '/admin/reembolso';
        
        }
    });

    return false;
});

$(document).on('click', '#reembolsoDetails', function (e) {
    e.preventDefault();
    var url = $(this).attr('data-url');
    var reembolso_id = $(this).attr('data-id');

    console.log(reembolso_id);
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


  
  

  
  
  
  
 