<? 
	define('ID_MODULO',0,true);
	include("../includes/Config.php");
	foreach ($_POST as $campo => $valor) $$campo = processaString($valor);
	
	$Config = array(
		'arquivo'=>'downloads',
		'tabela'=>'tbdownloads',
		'titulo'=>'titulo',
		'id'=>'id_download',
		'urlfixo'=>'', 
		'pasta'=>'downloads',
 
	);




	// -----------------------------------------------------------------------------------------------------------
	// Incluir ou alterar dados no banco de dados
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="dados") {


		# Testes
		$Erros='';



		# Se houver erro, SAI
		if (strlen($Erros)) { header('Location: ../sys/'.$Config['arquivo'].'_dados.php?ID='.$$cnf['id'].$Config['urlfixo'].'&erro='.urlencode("<b>Dados inv�lidos:</b>|".$Erros),true); exit; }


		# Dados
		$dados = array( 'id_categoria'=>$id_categoria, 'titulo'=>$titulo, 'descricao'=>$descricao);


		# Arquivos
		if (!empty($_FILES['arquivo']['name'])) {
			$dados['arquivo'] = processaArquivo('arquivo',$Config,$_FILES);
			if ($dados['arquivo']==false) { header("Location: ../sys/".$Config['arquivo'].".php?erro=".urlencode('Erro processando arquivo.'),true); exit; }
		}


		# Executando 
		if ($$Config['id']>0) {

			# Apagando a arquivo se houver uma nova cadastrada
			if (strlen($dados['arquivo'])>0) db_apagaArquivo('arquivo',$Config,$$Config['id']);

			db_executa($Config['tabela'],$dados,'update', $Config['id'].'='.$$Config['id']);

		} else {

			$dados['id_download']=$_SESSION['Admin']['id_download'];
			db_executa($Config['tabela'],$dados);
			
			# Cadastrar novo endere�o
			$dados_end = array('id_download'=>$id_download);


		}


		header("Location: ../sys/".$Config['arquivo'].".php?msg=".urlencode('Feito.'),true); exit;

	}












	// -----------------------------------------------------------------------------------------------------------
	// Excluir um registro e seus arquivos
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="excluir") {
		$id=(int)$_GET['id'];
		if ($id>0) {

			# Apagando os arquivos 
			db_apagaArquivo('arquivo',$Config,$id);

			# Excluindo do Bando de dados
			db_consulta("DELETE FROM ".$Config['tabela']." WHERE ".$Config['id']."=".$id);
			header("Location: ../sys/".$Config['arquivo'].".php?msg=".urlencode('Excluido.'),true); exit;

		}
	}



	// -----------------------------------------------------------------------------------------------------------
	// Apaga v�rios itens de uma vez s�
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="excluir_massa") {
	
		if (is_array($check)) 
		foreach ($check as $id) {
			if ($id>0) {

				# Apagando os arquivos 
				db_apagaArquivo('arquivo',$Config,$id);
	
				# Excluindo do Bando de dados
				db_consulta("DELETE FROM ".$Config['tabela']." WHERE ".$Config['id']."=".$id);


			}
		}
		header("Location: ../sys/".$Config['arquivo'].".php?msg=".urlencode('Feito').$Config['urlfixo'],true); exit;
	}







	// -----------------------------------------------------------------------------------------------------------
	// Alterando flags
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="flag") {
		list($valor) = db_dados("SELECT ".$_GET['flag']." FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['id']);
		if ($valor==1) $valor='0'; else $valor='1';
		
		db_executa($Config['tabela'],array($_GET['flag']=>$valor),'update', $Config['id'].'='.$_GET['id']);
		header("Location: ".urldecode($_GET['origem'])."?&msg=Atualizado",true); exit;
	}






	// Se nada for feito...
	header("Location: ../sys/".$Config['arquivo'].".php?info=".urlencode('Nada feito'),true); exit;
	
?>