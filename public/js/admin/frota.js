function fetchAllfrota(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    document.getElementById("tb_frota").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/frota.php?fetchfrota");
    xhttp.send();
  
  
  
  }


  $('#adicionarFrotaFrom').submit(function () {
  
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
                $('#modal_add_fro').modal('hide');
                $('.response').html('<script>alert("Inserido com sucesso")</script>');
                window.location.href = '/admin/frota';
                
                
            } else {
                $('.response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.data + '</div>');
            }
        }
    });

    return false;
});

$(document).on('click', '#editarBtnFrota', function (e) {
    e.preventDefault();
    

    console.log("i reached  for you always");
    var url = $(this).attr('data-url');
    var frota_id = $(this).attr('data-id');

    console.log(frota_id);

    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
        success: function (response) {
           
            $('#marca_frota_edit').val(response.marca);
            $('#modelo_frota_edit').val(response.modelo);
            $('#capacidade_frota_edit').val(response.capacidade);
            $('#frota_id').val(frota_id);
                
          
        }
    });

});


$('#editarFrotaFrom').submit(function () {

    $.ajax({
        type: 'post',
        url: '/admin/frotaupdate',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:
         function (response) {
      
                $('#editarFrota').modal('hide');
                $('.response').html('<script>alert("Editado com sucesso")</script>');
                window.location.href = '/admin/frota';
        
        }
    });

    return false;
});

$(document).on('click', '#frotaDetails', function (e) {
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


  
  

  
  
  
  
 