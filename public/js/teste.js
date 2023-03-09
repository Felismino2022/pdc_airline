var soma = []
cont = 1
var adultCrianca = []
adultCrianca[0] = 'Adulto'
document.getElementById("adult").innerHTML = "<strong>1Adulto</strong>";



//alert(adultCrianca[1])

//document.getElementById("pass").innerHTML += "<hr><h4><strong>"+document.getElementById("passageiros").innerHTML+"</strong></h4>";
document.getElementById("data_partida").innerHTML += "<h4><strong>"+document.getElementById("partida").innerHTML+"</strong></h4>";
document.getElementById("hor_cidade_origem").innerHTML += document.getElementById("hora_partida_cidade_origem").innerHTML;
document.getElementById("hor_cidade_destino").innerHTML += document.getElementById("hora_partida_cidade_destino").innerHTML;
document.getElementById("data_regresso").innerHTML += "<hr><h4><strong>"+document.getElementById("regresso").innerHTML+"</strong></h4>";

//pegar dinamicamente o valor de um select
function selecionarTarifa(){
    let todosOptinos = document.getElementById("classe")
    let optionSelecionado = todosOptinos.options[todosOptinos.selectedIndex].value
    //alert(optionSelecionado)
    let texto = todosOptinos.options[todosOptinos.selectedIndex].text

    document.getElementById("tarif").innerHTML = "<h4><strong>Classe: "+texto+"</strong></h4>";
    document.getElementById("preco").innerHTML = "<strong>Preço: "+optionSelecionado+"</strong>";
    document.getElementById("preco_total").innerHTML = "<hr><h4><strong>Preço Total: "+Number(optionSelecionado)*Number(document.getElementById('qtd_passageiros').innerHTML)+"</strong></h4>";
    document.getElementById("preco_apagar").innerHTML = Number(optionSelecionado)*Number(document.getElementById('qtd_passageiros').innerHTML);
}


function increment(id, tipo){
    

    const aumentAdult = document.getElementById(id)
    if(aumentAdult.value>=4)
        return aumentAdult.value;

        aumentAdult.value = Number(aumentAdult.value) + 1; 
       // soma = document.getElementById("preco_total")
     
        document.getElementById("passageiros").innerHTML=aumentAdult.value+tipo
        if(tipo==='Adulto'){
            document.getElementById("adult").innerHTML = "<strong>"+aumentAdult.value+tipo+"</strong>";
           // adultCrianca[cont] = 'Adulto'
            cont++
            
        }else{
            document.getElementById("crian").innerHTML = "<strong>"+aumentAdult.value+tipo+"</strong>"
           // adultCrianca[cont] = 'Crianca'
           // alert(adultCrianca[cont])
            cont++
        }
       // inptsLugar(adultCrianca)
        soma[0] = cont
        //alert(soma[0])
        
        document.getElementById("qtd_passageiros").innerHTML = soma[0]
        
        selecionarTarifa()
    return aumentAdult.value;
}


function decrementar(id, tipo){
        //alert(tipo)
        const aumentAdult = document.getElementById(id)
        
        if(aumentAdult.value<=0 && tipo==='crianca')
            return aumentAdult.value;

        if(aumentAdult.value<=1 && tipo==='Adulto')
            return aumentAdult.value;
        aumentAdult.value = Number(aumentAdult.value) - 1;
        document.getElementById("passageiros").innerHTML=aumentAdult.value+tipo
    

        if(tipo==='Adulto'){
            document.getElementById("adult").innerHTML = "<strong>"+aumentAdult.value+tipo+"</strong>";
            soma[0]--
            cont--
        }else{
            document.getElementById("crian").innerHTML = "<strong>"+aumentAdult.value+tipo+"</strong>"
            soma[0]--
            cont--
        }
      //  inptsLugar(cont, tipo)
        //alert(soma[0])
        document.getElementById("qtd_passageiros").innerHTML = soma[0]
        selecionarTarifa()
    return aumentAdult.value;
}
/*function inptsLugar(vetor){
    //document.getElementById('pass_lugares').innerHTML=' '
    for(let i=1; i<vetor.length; i++){
        document.getElementById('pass_lugares').innerHTML="<div class='mb-4'><label>"+adultCrianca[i]+":</label><input type='text' name='"+adultCrianca[i]+(i+1)+"' id='"+adultCrianca[i]+i+1+"'></div>"
    }
}*/
for(let i=0; i<adultCrianca.length; i++){
    document.getElementById('pass_lugares').innerHTML="<div class='mb-4'><label>"+adultCrianca[i]+":</label><input type='text' name='"+adultCrianca[i]+(i+1)+"' id='"+adultCrianca[i]+(i+1)+"'></div>"
}