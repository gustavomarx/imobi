function Dados(valor) {
      //verifica se o browser tem suporte a ajax
	  try {
         ajax = new ActiveXObject("Microsoft.XMLHTTP");
      } 
      catch(e) {
         try {
            ajax = new ActiveXObject("Msxml2.XMLHTTP");
         }
	     catch(ex) {
            try {
               ajax = new XMLHttpRequest();
            }
	        catch(exc) {
               alert("Esse browser n�o tem recursos para uso do Ajax");
               ajax = null;
            }
         }
      }
	  //se tiver suporte ajax
	  if(ajax) {
	     //deixa apenas o elemento 1 no option, os outros s�o exclu�dos
      if( document.busca.bairro_ ){
      document.busca.bairro_.options.length = 1;
      }
	     
		 idOpcao  = document.getElementById("opcoes");
     if( document.busca.bairro_ ){
		 document.getElementById("bairro_").disabled = true;
     }
		 
	     ajax.open("POST", "combo.php", true);
		 ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		 
		 ajax.onreadystatechange = function() {
            //enquanto estiver processando...emite a msg de carregando
			if(ajax.readyState == 1) {
			   idOpcao.innerHTML = "Carregando...!";   
	        }
			//ap�s ser processado - chama fun��o processXML que vai varrer os dados
            if(ajax.readyState == 4 ) {
			   if(ajax.responseXML) {
			      processXML(ajax.responseXML);
			   }
			   else {
			       //caso n�o seja um arquivo XML emite a mensagem abaixo
				   idOpcao.innerHTML = "Selecione a cidade";
			   }
            }
         }
		 //passa o c�digo do estado escolhido
	     var params = "estado="+valor;
         ajax.send(params);
      }
   }
   
   function processXML(obj){
      //pega a tag cidade
      var dataArray   = obj.getElementsByTagName("cidade");
      
	  //total de elementos contidos na tag cidade
	  if(dataArray.length > 0) {
	     //percorre o arquivo XML paara extrair os dados
         for(var i = 0 ; i < dataArray.length ; i++) {
            var item = dataArray[i];
			//cont�udo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var descricao =  item.getElementsByTagName("descricao")[0].firstChild.nodeValue;
			
	        idOpcao.innerHTML = "Selecione";
      if( document.busca.bairro_ ){
			document.getElementById("bairro_").disabled = false;
      }
			
			//cria um novo option dinamicamente  
			var novo = document.createElement("option");
			    //atribui um ID a esse elemento
			    novo.setAttribute("id", "opcoes");
				//atribui um valor
			    novo.value = codigo;
				//atribui um texto
			    novo.text  = descricao;
				//finalmente adiciona o novo elemento
          if( document.busca.bairro_ ){
				document.busca.bairro_.options.add(novo);
          }
		 }
	  }
	  else {
	    //caso o XML volte vazio, printa a mensagem abaixo
		idOpcao.innerHTML = "N�o h� bairros disponiveis";
    if( document.busca.bairro_ ){
		document.getElementById("bairro_").disabled = true;
    }
	  }	  
   }

   
   ////////// COMBO UF //////////////
   
function DadosUf(valor) {
      //verifica se o browser tem suporte a ajax
	  try {
         ajax = new ActiveXObject("Microsoft.XMLHTTP");
      } 
      catch(e) {
         try {
            ajax = new ActiveXObject("Msxml2.XMLHTTP");
         }
	     catch(ex) {
            try {
               ajax = new XMLHttpRequest();
            }
	        catch(exc) {
               alert("Esse browser n�o tem recursos para uso do Ajax");
               ajax = null;
            }
         }
      }
	  //se tiver suporte ajax
	  if(ajax) {
	     //deixa apenas o elemento 1 no option, os outros s�o exclu�dos
		 document.busca.cidadeB.options.length = 1;
     if( document.busca.bairro_ ){
      document.busca.bairro_.options.length = 1;
     }
	     
		 idOp  = document.getElementById("op");
		 document.getElementById("cidadeB").disabled = true;
     if( document.busca.bairro_ ){
      document.getElementById("bairro_").disabled = true;
     }
		 
	     ajax.open("POST", "combo_uf.php", true);
		 ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		 
		 ajax.onreadystatechange = function() {
            //enquanto estiver processando...emite a msg de carregando
			if(ajax.readyState == 1) {
			   idOp.innerHTML = "Carregando...!";   
	        }
			//ap�s ser processado - chama fun��o processXML que vai varrer os dados
            if(ajax.readyState == 4 ) {
			   if(ajax.responseXML) {
			      processXMLuF(ajax.responseXML);
			   }
			   else {
			       //caso n�o seja um arquivo XML emite a mensagem abaixo
				   idOp.innerHTML = "Selecione o estado";
			   }
            }
         }
		 //passa o c�digo do estado escolhido
	     var params = "estado="+valor;
         ajax.send(params);
      }
   }
   
   function processXMLuF(obj){
      //pega a tag cidade
      var dataArray   = obj.getElementsByTagName("cidade");
      
	  //total de elementos contidos na tag cidade
	  if(dataArray.length > 0) {
	     //percorre o arquivo XML paara extrair os dados
         for(var i = 0 ; i < dataArray.length ; i++) {
            var item = dataArray[i];
			//cont�udo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var descricao =  item.getElementsByTagName("descricao")[0].firstChild.nodeValue;
			
	        idOp.innerHTML = "Selecione";
			document.getElementById("cidadeB").disabled = false;
			
			//cria um novo option dinamicamente  
			var novo = document.createElement("option");
			    //atribui um ID a esse elemento
			    novo.setAttribute("id", "op");
				//atribui um valor
			    novo.value = codigo;
				//atribui um texto
			    novo.text  = descricao;
				//finalmente adiciona o novo elemento
				document.busca.cidadeB.options.add(novo);
		 }
	  }
	  else {
	    //caso o XML volte vazio, printa a mensagem abaixo
		idOp.innerHTML = "N�o h� cidades disponiveis";
		document.getElementById("cidadeB").disabled = true;
	  }	  
   }