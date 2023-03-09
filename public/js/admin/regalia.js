function fetchAllUtilizador(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    document.getElementById("tb_utilizador").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/utilizador.php?fetchutilizador");
    xhttp.send();
  
  
  
  }


  $('#adicionarRegaliaFrom').submit(function () {
  
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
                $('#modal_add_reg').modal('hide');
                $('.response').html('<script>alert("Inserido com sucesso")</script>');
                window.location.href = '/admin/regalia';
                
                
            } else {
                $('.response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.data + '</div>');
            }
        }
    });

    return false;
});

$(document).on('click', '#editarBtnRegalia', function (e) {
    e.preventDefault();
    

    console.log("i reached  for you always");
    var url = $(this).attr('data-url');
    var regalia_id = $(this).attr('data-id');

    console.log(regalia_id);

    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
        success: function (response) {
           
            $('#nome_regalia_edit').val(response.nome);
            $('#regalia_id').val(regalia_id);
           
          
         
                
          
        }
    });

});


$('#editarRegaliaFrom').submit(function () {

    $.ajax({
        type: 'post',
        url: '/admin/regaliaupdate',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:
         function (response) {
      
                $('#editarRegalia').modal('hide');
                $('.response').html('<script>alert("Editado com sucesso")</script>');
                window.location.href = '/admin/regalia';
        
        }
    });

    return false;
});

$(document).on('click', '#regaliaDetails', function (e) {
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

                $('#ver_name').html(response.name+" "+response.surname);
    

          
        }
    });

});


  
  

  
  
  
  
 