function fetchAllUtilizador(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    document.getElementById("tb_utilizador").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/utilizador.php?fetchutilizador");
    xhttp.send();
  }

$(document).on('click', '#editarBtnReserva', function (e) {
    e.preventDefault();
    console.log("i reached  for you always");
    var url = $(this).attr('data-url');
    var bilhete_id = $(this).attr('data-id');

    console.log(bilhete_id);

    $.ajax({
        type: 'get',
        url: url,
        dataType: 'JSON',
        success: function (response) {
           
            $('#bilhete_estado_edit').val(response.estado);
            $('#bilhete_id').val(bilhete_id);         
        }
    });

});

$('#editarBilheteFrom').submit(function () {
    var url = $(this).attr('data-url');

    $.ajax({
        type: 'post',
        url: '/admin/reservaupdate',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:
         function (response) {
      
                $('#editarReserva').modal('hide');
                $('.response').html('<script>alert("Editado com sucesso")</script>');
                window.location.href = '/admin/reserva';
        
        }
    });

    return false;
});

$(document).on('click', '#userReserva', function (e) {
    e.preventDefault();
    var url = $(this).attr('data-url');
    var reserva_id = $(this).attr('data-id');

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