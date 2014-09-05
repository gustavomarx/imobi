<? 
	define('ID_MODULO',0,true);
	include("../includes/Config.php");
	foreach ($_POST as $campo => $valor) $$campo = processaString($valor);
	
	$Config = array(
		'arquivo'=>'alunos',
		'tabela'=>'tbalunos',
		'titulo'=>'titulo',
		'id'=>'id_aluno',
		'urlfixo'=>'', 
		'pasta'=>'aluno',
	#	'imagem'=>array(
	#		'x'=>690, 'y'=>389, 'corte'=>1, 
	#	),
	);

	function alunoConfigValor($s) {
		list($valor) = db_lista(db_consulta("SELECT valor FROM tbalunos_config WHERE campo LIKE '".$s."' LIMIT 1;"));
		return $valor;
	}




	// -----------------------------------------------------------------------------------------------------------
	// Incluir ou alterar dados no banco de dados
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="dados") {


		# Testes
		$Erros='';
		if (strlen($titulo) < 2) $Erros .= "- Título|";
		if (! validaData($data)) $Erros .= "- Data|";
		if (  (! validaTipoArquivo($_FILES['imagem']['name'],1)) && (!($id_aluno>0)) ) $Erros .= "- Imagem|";


		# Se houver erro, SAI
		if (strlen($Erros)) { header('Location: ../sys/'.$Config['arquivo'].'_dados.php?ID='.$$Config['id'].$Config['urlfixo'].'&erro='.urlencode("<b>Dados inválidos:</b>|".$Erros),true); exit; }


		# Dados
		$dados = array( 'titulo'=>$titulo, 'local'=>$local, 'data'=>dataDMY_YMD($data), 'descricao'=>$descricao, 'flag_status'=>$flag_status );


		# Arquivos
		if (!empty($_FILES['imagem']['name'])) {
			$Capa = processaArquivo('imagem',$Config,$_FILES);
			if ($Capa==false) { header("Location: ../sys/".$Config['arquivo'].".php?erro=".urlencode('Erro processando Imagem.'),true); exit; }
		}


		# Se for adicionar, crias as pastas, etc
		if ($$Config['id']>0) {
		
			list($codigo) = db_lista(db_consulta("SELECT codigo FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$$Config['id']));

		} else {

			$codigo = md5(date('Ymdhis').rand(10000,99999));
			$dados['codigo']=$codigo;
			@mkdir('../../arquivos/aluno/'.$codigo.'/');
			@mkdir('../../arquivos/aluno/'.$codigo.'/fotos/');
			@mkdir('../../arquivos/aluno/'.$codigo.'/miniaturas/');

		}
		
		# Capa
		if (strlen($Capa)>5) {
			@unlink('../../arquivos/aluno/'.$codigo.'/capa.jpg');
			@rename('../../arquivos/aluno/'.$Capa,'../../arquivos/aluno/'.$codigo.'/capa.jpg');
		}


		# Executando 
		if ($$Config['id']>0) {

			db_executa($Config['tabela'],$dados,'update', $Config['id'].'='.$$Config['id']);
			header("Location: ../sys/".$Config['arquivo'].".php?msg=".urlencode('Atualizado.'),true); exit;

		} else {

			db_executa($Config['tabela'],$dados);
			

		}
		
		# Permissões
		db_consulta("DELETE FROM liga_aluno WHERE id_aluno=".$$Config['id']);
		foreach ($cursos as $valor) {
			if ($valor > 0) db_executa('liga_aluno',array('id_aluno'=>$$Config['id'], 'id_galeria'=>$valor));
		
		}


		header("Location: ../sys/".$Config['arquivo']."_fotos.php?id_aluno=".db_insert_id(),true); exit;

	}







	// -----------------------------------------------------------------------------------------------------------
	// Excluir um registro e seus arquivos
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="excluir") {
		$id=(int)$_GET['id'];
		if ($id>0) {

			$aluno = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$id);
			if (strlen($aluno['codigo'])==32) {
				apagarDir("../../arquivos/aluno/".$aluno['codigo']."/");
				# Excluindo do Banco de dados
				db_consulta("DELETE FROM ".$Config['tabela']." WHERE ".$Config['id']."=".$id);
				db_consulta("DELETE FROM tbalunos_fotos WHERE ".$Config['id']."=".$id);
				
				# Apagando vínculos 
				db_consulta("DELETE FROM liga_aluno WHERE id_aluno=".$id);

			}
			header("Location: ../sys/".$Config['arquivo'].".php?msg=".urlencode('Excluido.'),true); exit;

		}
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












	/*	FORMULARIO DE ENVIO DAS FOTOS  */
	if ($_GET['faz']=="fotosForm") {

		# Pegando a pasta da aluno
		list($codigo) = db_lista(db_consulta("SELECT codigo FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$$Config['id']));
		$ArqMarcadagua = alunoConfigValor('marcadagua_arquivo');
		if (!empty($ArqMarcadagua)) $ArqMarcadagua = '../../arquivos/aluno/_marcadagua/'.$ArqMarcadagua;
		


		# Testes
		$Erros='';
		if (! ($id_aluno > 0)) $Erros .= "- ID da aluno|";
		if (strlen($codigo) != 32) $Erros .= "- Pasta da aluno |";


		# Se houver erro, SAI
		if (strlen($Erros)) { header('Location: ../sys/aluno_fotos.php?id_aluno='.$$Config['id'].'&erro='.urlencode("<b>Dados inválidos:</b>|".$Erros),true); exit; }

		# Pegando as fotos do formulario
		for ($num=1;$num<=8;$num++) {
			if (strlen($_FILES['imagem'.$num]['name']) > 4) {

				$novoArquivo = time().rand(100000,999999).'.'.extensaoArquivo($_FILES['imagem'.$num]['name']);
				$Arquivo = FazerUpload($_FILES['imagem'.$num],"../../arquivos/tmp/");
				if ($Arquivo != false) {
					if (Miniatura("../../arquivos/tmp/".$Arquivo, "../../arquivos/aluno/".$codigo."/miniaturas/".$novoArquivo, 56, 56, 1, 0)) {

						if (Miniatura("../../arquivos/tmp/".$Arquivo, "../../arquivos/aluno/".$codigo."/fotos/".$novoArquivo, 690, 389, 0, 1, $ArqMarcadagua, alunoConfigValor('marcadagua_distancia'),alunoConfigValor('marcadagua_posicao'),alunoConfigValor('marcadagua_opacidade'))) {

							$dados = array('id_aluno'=>$id_aluno, 'imagem'=>$novoArquivo, 'legenda'=>$legenda[$num], 'contador'=>0, 'flag_status'=>1, 'posicao'=>1000);
							db_executa('tbalunos_fotos',$dados);

						}
					}
				}
			}
		}

		# Saindo		
		header("Location: ../sys/aluno_fotos.php?id_aluno=".$id_aluno."&msg=".urlencode('Feito.'),true); exit;

	}









	/*	FORMULARIO DE ENVIO DAS FOTOS  */
	if ($_GET['faz']=="fotosFtp") {

		# Pegando a pasta da aluno
		list($codigo) = db_lista(db_consulta("SELECT codigo FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$$Config['id']));
		$ArqMarcadagua = alunoConfigValor('marcadagua_arquivo');
		if (!empty($ArqMarcadagua)) $ArqMarcadagua = '../../arquivos/aluno/_marcadagua/'.$ArqMarcadagua;


		# Testes
		$Erros='';
		if (! ($id_aluno > 0)) $Erros .= "- ID da aluno|";
		if (strlen($codigo) != 32) $Erros .= "- Pasta da aluno |";


		# Se houver erro, SAI
		if (strlen($Erros)) { header('Location: ../sys/aluno_fotos.php?id_aluno='.$$Config['id'].'&erro='.urlencode("<b>Dados Inválidos:</b>|".$Erros),true); exit; }


		# Listando a pasta
		$Arquivos = ListaDiretorio('../../arquivos/ftp/'.$pasta.'/');
		$i=0;
		foreach ($Arquivos as $arquivo) {
			if (validaTipoArquivo($arquivo, 1))  { $i++;

				$novoArquivo = time().rand(100000,999999).'.'.extensaoArquivo($arquivo);
				if (Miniatura('../../arquivos/ftp/'.$pasta.'/'.$arquivo, "../../arquivos/aluno/".$codigo."/miniaturas/".$novoArquivo, 56, 56, 1, 0)) {
	
					if (Miniatura('../../arquivos/ftp/'.$pasta.'/'.$arquivo, '../../arquivos/aluno/'.$codigo.'/fotos/'.$novoArquivo, 690, 389, 0, 1, $ArqMarcadagua, alunoConfigValor('marcadagua_distancia'),alunoConfigValor('marcadagua_posicao'),alunoConfigValor('marcadagua_opacidade'))) {

						$dados = array('id_aluno'=>$id_aluno, 'imagem'=>$novoArquivo, 'legenda'=>$legenda[$num], 'contador'=>0, 'flag_status'=>1, 'posicao'=>1000);
						db_executa('tbalunos_fotos',$dados);
					}
				}
			}
		}
		
		if ( ($i>0)&& (strlen($pasta)>0) ) apagarDir('../../arquivos/ftp/'.$pasta.'/');

		# Saindo		
		header("Location: ../sys/aluno_fotos.php?id_aluno=".$id_aluno."&msg=".urlencode('Feito.'),true); exit;

	}






	/*	AÇÃO DA LISTAGEM DAS FOTOS  */
	if ($_GET['faz']=="photosAction") {

		# Pegando a pasta da aluno
		list($codigo) = db_lista(db_consulta("SELECT codigo FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$$Config['id']));


		# Testes
		$Erros='';
		if (! ($id_aluno > 0)) $Erros .= "- ID da aluno|";
		if (strlen($codigo) != 32) $Erros .= "- Pasta da aluno |";


		# Se houver erro, SAI
		if (strlen($Erros)) { header('Location: ../sys/aluno_fotos.php?id_aluno='.$$Config['id'].'&erro='.urlencode("<b>Dados inválidos:</b>|".$Erros),true); exit; }

		#echo '<pre>'; print_r($_POST); exit;
		if (is_array($foto)) 
		foreach ($foto as $cod => $ativo) {
		
			if ($ativo==1) {

				if ($opcao == 'delete') {

					list($imagem) = db_lista(db_consulta('SELECT imagem FROM tbalunos_fotos WHERE id_aluno='.(int)$id_aluno.' AND id_foto='.(int)$cod));
					@unlink('../../arquivos/aluno/'.$codigo.'/miniaturas/'.$imagem);
					@unlink('../../arquivos/aluno/'.$codigo.'/fotos/'.$imagem);
					db_consulta('DELETE FROM tbalunos_fotos WHERE id_aluno='.(int)$id_aluno.' AND id_foto='.(int)$cod);

				} else if ($opcao=='update') {

					$dados = array('posicao'=>$posicao[$cod], 'legenda'=>$legenda[$cod]);
					db_executa('tbalunos_fotos',$dados,'update','id_aluno='.$id_aluno.' AND id_foto='.$cod);

				} else {
					header("Location: ../sys/aluno_fotos.php?id_aluno=".$id_aluno."&erro=".urlencode('Opção selecionada inválida.'),true); exit;
				}
			}
		}


		# Saindo		
		header("Location: ../sys/aluno_fotos.php?id_aluno=".$id_aluno."&msg=".urlencode('Feito.'),true); exit;

	}













	// Se nada for feito...
	header("Location: ../sys/".$Config['arquivo'].".php?info=".urlencode('Nada feito'),true); exit;
	
?>