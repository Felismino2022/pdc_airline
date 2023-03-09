function fetchAllaeroporto(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    document.getElementById("tb_aeroporto").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/aeroporto.php?fetchaeroporto");
    xhttp.send();
  
  
  
  }


  $('#adicionarAeroportoFrom').submit(function () {
  
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
                $('#modal_add_aer').modal('hide');
                $('.response').html('<script>alert("Inserido com sucesso")</script>');
                window.location.href = '/admin/aeroporto';
                
                
            } else {
                $('.response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.data + '</div>');
            }
        }
    });

    return false;
});

$(document).on('click', '#editarBtnAeroporto', function (e) {
    e.preventDefault();
    

    console.log("i reached  for you always");
    var url = $(this).attr('data-url');
    var aeroporto_id = $(this).attr('data-id');

    console.log(aeroporto_id);

    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
        success: function (response) {
           
            $('#nome_aeroporto_edit').val(response.nome);
            $('#cidade_aeroporto_edit').val(response.cidade);
            $('#pais_aeroporto_edit').val(response.pais);
            $('#aeroporto_id').val(aeroporto_id);
            
         
                
          
        }
    });

});


$('#editarAeroportoFrom').submit(function () {

    $.ajax({
        type: 'post',
        url: '/admin/aeroportoupdate',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:
         function (response) {
      
                $('#editarAeroporto').modal('hide');
                $('.response').html('<script>alert("Editado com sucesso")</script>');
                window.location.href = '/admin/aeroporto';
        
        }
    });

    return false;
});

$(document).on('click', '#aeroportoDetails', function (e) {
    e.preventDefault();
    var url = $(this).attr('data-url');
    var aeroporto_id = $(this).attr('data-id');

    console.log(aeroporto_id);
    console.log("vermais");
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
   
        success: function (response) {
        
                $('#ver_id').html(response.id);
                $('#ver_nome').html(response.nome);
                $('#ver_cidade').html(response.cidade);
                $('#ver_pais').html(response.pais);
                

          
        }
    });

});


  
  

  
  
  
  
 