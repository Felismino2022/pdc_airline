function getVooByid(){
    var codigo=document.getElementById('codigo_voo').value;
    if(!codigo){
      document.getElementById("painel").innerHTML ='O codigo nao pode ser vazio'
      return false
    }
    var url="/getBilhete/"+codigo;
    

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {

      document.getElementById("painel").innerHTML =this.responseText;

    }
    xhttp.open("GET", url);
    xhttp.send();
  
  }