function fetchAllUtilizador(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    document.getElementById("tb_utilizador").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/utilizador.php?fetchutilizador");
    xhttp.send();
  
  
  
  }

  


  $('#adicionarMembroFrom').submit(function () {
  
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

$(document).on('click', '#editarBtnMembro', function (e) {
    e.preventDefault();
    

    console.log("i reached  for you always");
    var url = $(this).attr('data-url');
    var membro_id = $(this).attr('data-id');

    console.log(membro_id);

    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
        success: function (response) {
           

            $('#membro_id').val(membro_id);
            
         
                
          
        }
    });

});


$('#editarMembroFrom').submit(function () {

    $.ajax({
        type: 'post',
        url: '/admin/membroupdate',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:
         function (response) {
      
                $('#editarMembro').modal('hide');
                $('.response').html('<script>alert("Editado com sucesso")</script>');
                window.location.href = '/admin/membro';
        
        }
    });

    return false;
});

$(document).on('click', '#membroDetails', function (e) {
    e.preventDefault();
    var url = $(this).attr('data-url');
    var user_id = $(this).attr('data-id');

    console.log(membro_id);
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


  
  

  
  
  
  
 