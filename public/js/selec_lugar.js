
var NUM_PLACE=0
var qtd_passageiro =1;

function selec_lug(id){
	
	
    qtd_passageiro = document.getElementById('qtd_passageiros').innerHTML;
    //alert(qtd_passageiro)

    num_lugar = document.getElementById('num_lugar');

    if(document.getElementById('num'+id).style.backgroundColor=="green"){		
		document.getElementById('num'+id).style.backgroundColor="blue";
		//alert(num_lugar.value)
		
		//quando desmarcar elimina o id e poe um espaço (a funcao trim() elimina os espaços vazios)
		num_lugar.value=num_lugar.value.replace((document.getElementById('num'+id).innerHTML), "").trim();
		
		//alert(num_lugar.value)
        document.getElementById('Adulto1').value = ''
        
		NUM_PLACE-=1;
	
	}else if(document.getElementById('num'+id).style.backgroundColor=="blue"){
		//console.log('blue');
       // alert(num_lugar.value)
		if(NUM_PLACE<Number(qtd_passageiro)){
			var lug_ocupado=document.getElementById('num'+id).innerHTML;
			//alert(lug_ocupado)

			document.getElementById('Adulto1').value=lug_ocupado;
			
			document.getElementById('num'+id).style.backgroundColor="green";
			num_lugar.value= num_lugar.value+" "+id;
		//	alert(num_lugar.value)
			NUM_PLACE+=1;
		}
        //alert(num_lugar.value)
	}
}

function validateForm() {
	if ( NUM_PLACE==0 ) {
	  alert("Deve Escolher Um lugar Pelo Menos");
	  return false;
	}

	if(NUM_PLACE!=Number(document.getElementById('qtd_passageiros').innerHTML)){
		alert("A quantidade de lugares escolhidos deve ser igual ao pretendido");
		return false;

	}
	return true;
}


function getUser(){
	if(validateForm()){
		let todosOptinos = document.getElementById("classe")
		let texto = todosOptinos.options[todosOptinos.selectedIndex].text
		preco_a_pagar = document.getElementById("preco_apagar").innerHTML
        lugar_id=document.getElementById("num_lugar").value;
		//adulto=document.getElementById("num_lugar").value;
		adult = document.getElementById("adult").innerHTML[8]
		crianca = document.getElementById("crian").innerHTML[8]
		id_voo = document.getElementById('id_voo').value
		//alert(id_voo)
        lugar_id = (lugar_id.split(" "));
		lugar_id.shift()
		//alert(lugar_id);
	   
		
        //lugar_id é um array de lugares
        //console.log(lugar_id)
        lugares = JSON.parse(JSON.stringify(lugar_id));
        //console.log(JsonObject)
       // console.log(JsonObject)
	   //alert(crianca)
	   if(crianca){
		window.location.href = 'http://127.0.0.1:8000/user/'+btoa(id_voo)+'/'+btoa(adult)+'/'+btoa(lugares)+'/'+btoa(texto)+'/'+btoa(crianca);
	   }else{
		window.location.href = 'http://127.0.0.1:8000/user/'+btoa(id_voo)+'/'+btoa(adult)+'/'+btoa(lugares)+'/'+btoa(texto);
	   }
    }
}

