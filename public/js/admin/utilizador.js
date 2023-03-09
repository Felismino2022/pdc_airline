function fetchAllUtilizador(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    document.getElementById("tb_utilizador").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/utilizador.php?fetchutilizador");
    xhttp.send();
  
  
  
  }

  


  $('#adicionarUserFrom').submit(function () {
  
    var url = $(this).attr('data-action');
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {

            if($.isEmptyObject(data.error)){

                $('#modal_add_uti').modal('hide');
                alert(data.success);

            }else{

                printErrorMsg(data.error);

            }

        
        },
      
    });

    function printErrorMsg (msg) {
        $.each( msg, function(key,value) {
            console.log('chave '+ key);
            $('.'+key+'_err').text(value);
        });
    }
    return false;
});

$(document).on('click', '#editarBtnUser', function (e) {
    e.preventDefault();
    

    console.log("i reached  for you always");
    var url = $(this).attr('data-url');
    var user_id = $(this).attr('data-id');

    console.log(user_id);

    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
        success: function (response) {
           
            $('#pri_nome_utilizador_edit').val(response.name);
            $('#email_utilizador_edit').val(response.email);
            $('#genero_utilizador_edit').val(response.gender);
            $('#user_id').val(user_id);
            
            $('#ult_nome_utilizador_edit').val(response.surname);
         
                
          
        }
    });

});


$('#editarUserFrom').submit(function () {

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
      
                $('#editarUser').modal('hide');
                $('.response').html('<script>alert("Editado com sucesso")</script>');
                window.location.href = '/admin/utilizador';
        
        }
    });

    return false;
});

$(document).on('click', '#userDetails', function (e) {
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
    
                $('#ver_email').html(response.email);
                $('#ver_gender').html(response.gender);
                

          
        }
    });

});


  
  

  
  
  
  
 