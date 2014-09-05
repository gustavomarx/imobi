<? 
	define('ID_MODULO',0,true);
	include("../includes/Config.php");
	foreach ($_POST as $campo => $valor) $$campo = processaString($valor);
	
	$Config = array(
		'arquivo'=>'departamentos_dados',
		'tabela'=>'tbdepartamentos',
		'titulo'=>'titulo',
		'id'=>'id_departamentos',
		'urlfixo'=>'', 
		'pasta'=>'departamentos',
		'imagem'=>array(
			'x'=>800, 'y'=>800, 'corte'=>0,
		),
	);

	function departamentosConfigValor($s) {
		list($valor) = db_lista(db_consulta("SELECT valor FROM tbdepartamentos_config WHERE campo LIKE '".$s."' LIMIT 1;"));
		return $valor;
	}




	// -----------------------------------------------------------------------------------------------------------
	// Incluir ou alterar dados no banco de dados
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="dados") {


		# Testes
		$Erros='';


		# Se houver erro, SAI
		if (strlen($Erros)) { header('Location: ../sys/'.$Config['arquivo'].'_dados.php?ID='.$$Config['id'].$Config['urlfixo'].'&erro='.urlencode("<b>Dados inválidos:</b>|".$Erros),true); exit; }


		# Dados
		$dados = array('id_categoria'=>$id_categoria, 'titulo'=>$titulo, 'facebook'=>$facebook, 'data'=>dataDMY_YMD($data), 'texto'=>$texto, 'twitter'=>$twitter 
		, 'google'=>$google , 'youtube'=>$youtube , 'vimeo'=>$vimeo , 'linkedin'=>$linkedin , 'digg'=>$digg, 'imagem'=>$imagem, 'email'=>$email );


		# Arquivos
		if (!empty($_FILES['imagem']['name'])) {
			$Capa = processaArquivo('imagem',$Config,$_FILES);
			if ($Capa==false) { header("Location: ../sys/".$Config['arquivo'].".php?ID=150&erro=".urlencode('Erro processando Imagem.'),true); exit; }
		}


		# Se for adicionar, crias as pastas, etc
		if ($$Config['id']>0) {
		
			list($codigo) = db_lista(db_consulta("SELECT codigo FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$$Config['id']));

		} else {

			$codigo = md5(date('Ymdhis').rand(10000,99999));
			$dados['codigo']=$codigo;
			@mkdir('../../arquivos/departamentos/'.$codigo.'/');
			@mkdir('../../arquivos/departamentos/'.$codigo.'/fotos/');
			@mkdir('../../arquivos/departamentos/'.$codigo.'/miniaturas/');

		}
		
		# Arquivos
		if (!empty($_FILES['arquivo']['name'])) {
			$dados['arquivo'] = processaArquivo('arquivo',$Config,$_FILES);
			if ($dados['arquivo']==false) { header("Location: ../sys/".$Config['arquivo']."_dados.php?ID=150&erro=".urlencode('Erro processando Imagem.'),true); exit; }
		}


		# Executando 
		if ($$Config['id']>0) {

			db_executa($Config['tabela'],$dados,'update', $Config['id'].'='.$$Config['id']);
			header("Location: ../sys/".$Config['arquivo'].".php?ID=150&msg=".urlencode('Atualizado.'),true); exit;

		} else {

			db_executa($Config['tabela'],$dados);
			header("Location: ../sys/".$Config['arquivo']."_fotos.php?id_departamentos=".db_insert_id(),true); exit;

		}


		

	}







 

 





 








	/*	FORMULARIO DE ENVIO DAS FOTOS  */
	if ($_GET['faz']=="fotosForm") {

		# Pegando a pasta da departamentos
		list($codigo) = db_lista(db_consulta("SELECT codigo FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$$Config['id']));
		$ArqMarcadagua = departamentosConfigValor('marcadagua_arquivo');
		if (!empty($ArqMarcadagua)) $ArqMarcadagua = '../../arquivos/departamentos/_marcadagua/'.$ArqMarcadagua;
		


		# Testes
		$Erros='';
		if (! ($id_departamentos > 0)) $Erros .= "- ID do departamento inválido|";
		if (strlen($codigo) != 32) $Erros .= "- Pasta do departamento não existe |";


		# Se houver erro, SAI
		if (strlen($Erros)) { header('Location: ../sys/departamentos_fotos.php?id_departamentos='.$$Config['id'].'&erro='.urlencode("<b>Dados inválidos:</b>|".$Erros),true); exit; }

		# Pegando as fotos do formulario
		for ($num=1;$num<=8;$num++) {
			if (strlen($_FILES['imagem'.$num]['name']) > 4) {

				$novoArquivo = time().rand(100000,999999).'.'.extensaoArquivo($_FILES['imagem'.$num]['name']);
				$Arquivo = FazerUpload($_FILES['imagem'.$num],"../../arquivos/tmp/");
				if ($Arquivo != false) {
					if (Miniatura("../../arquivos/tmp/".$Arquivo, "../../arquivos/departamentos/".$codigo."/miniaturas/".$novoArquivo, 400, 400, 1, 0)) {

						if (Miniatura("../../arquivos/tmp/".$Arquivo, "../../arquivos/departamentos/".$codigo."/fotos/".$novoArquivo, 800, 800, 0, 1, $ArqMarcadagua, departamentosConfigValor('marcadagua_distancia'),departamentosConfigValor('marcadagua_posicao'),departamentosConfigValor('marcadagua_opacidade'))) {

							$dados = array('id_departamentos'=>$id_departamentos, 'imagem'=>$novoArquivo, 'legenda'=>$legenda[$num], 'contador'=>0, 'flag_status'=>1, 'posicao'=>1000);
							db_executa('tbdepartamentos_fotos',$dados);

						}
					}
				}
			}
		}

		# Saindo		
		header("Location: ../sys/departamentos_fotos.php?id_departamentos=".$id_departamentos."&msg=".urlencode('Feito.'),true); exit;

	}









	/*	FORMULARIO DE ENVIO DAS FOTOS  */
	if ($_GET['faz']=="fotosFtp") {

		# Pegando a pasta da departamentos
		list($codigo) = db_lista(db_consulta("SELECT codigo FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$$Config['id']));
		$ArqMarcadagua = departamentosConfigValor('marcadagua_arquivo');
		if (!empty($ArqMarcadagua)) $ArqMarcadagua = '../../arquivos/departamentos/_marcadagua/'.$ArqMarcadagua;


		# Testes
		$Erros='';
		if (! ($id_departamentos > 0)) $Erros .= "- ID da departamentos|";
		if (strlen($codigo) != 32) $Erros .= "- Pasta da departamentos |";


		# Se houver erro, SAI
		if (strlen($Erros)) { header('Location: ../sys/departamentos_fotos.php?id_departamentos='.$$Config['id'].'&erro='.urlencode("<b>Dados Inválidos:</b>|".$Erros),true); exit; }


		# Listando a pasta
		$Arquivos = ListaDiretorio('../../arquivos/ftp/'.$pasta.'/');
		$i=0;
		foreach ($Arquivos as $arquivo) {
			if (validaTipoArquivo($arquivo, 1))  { $i++;

				$novoArquivo = time().rand(100000,999999).'.'.extensaoArquivo($arquivo);
				if (Miniatura('../../arquivos/ftp/'.$pasta.'/'.$arquivo, "../../arquivos/departamentos/".$codigo."/miniaturas/".$novoArquivo, 400, 400, 1, 0)) {
	
					if (Miniatura('../../arquivos/ftp/'.$pasta.'/'.$arquivo, '../../arquivos/departamentos/'.$codigo.'/fotos/'.$novoArquivo, 800, 800, 0, 1, $ArqMarcadagua, departamentosConfigValor('marcadagua_distancia'),departamentosConfigValor('marcadagua_posicao'),departamentosConfigValor('marcadagua_opacidade'))) {

						$dados = array('id_departamentos'=>$id_departamentos, 'imagem'=>$novoArquivo, 'legenda'=>$legenda[$num], 'contador'=>0, 'flag_status'=>1, 'posicao'=>1000);
						db_executa('tbdepartamentos_fotos',$dados);
					}
				}
			}
		}
		
		if ( ($i>0)&& (strlen($pasta)>0) ) apagarDir('../../arquivos/ftp/'.$pasta.'/');

		# Saindo		
		header("Location: ../sys/departamentos_fotos.php?id_departamentos=".$id_departamentos."&msg=".urlencode('Feito.'),true); exit;

	}






	/*	AÇÃO DA LISTAGEM DAS FOTOS  */
	if ($_GET['faz']=="photosAction") {

		# Pegando a pasta da departamentos
		list($codigo) = db_lista(db_consulta("SELECT codigo FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$$Config['id']));


		# Testes
		$Erros='';
		if (! ($id_departamentos > 0)) $Erros .= "- ID da departamentos|";
		if (strlen($codigo) != 32) $Erros .= "- Pasta da departamentos |";


		# Se houver erro, SAI
		if (strlen($Erros)) { header('Location: ../sys/departamentos_fotos.php?id_departamentos='.$$Config['id'].'&erro='.urlencode("<b>Dados inválidos:</b>|".$Erros),true); exit; }

		#echo '<pre>'; print_r($_POST); exit;
		if (is_array($foto)) 
		foreach ($foto as $cod => $ativo) {
		
			if ($ativo==1) {

				if ($opcao == 'delete') {

					list($imagem) = db_lista(db_consulta('SELECT imagem FROM tbdepartamentos_fotos WHERE id_departamentos='.(int)$id_departamentos.' AND id_foto='.(int)$cod));
					@unlink('../../arquivos/departamentos/'.$codigo.'/miniaturas/'.$imagem);
					@unlink('../../arquivos/departamentos/'.$codigo.'/fotos/'.$imagem);
					db_consulta('DELETE FROM tbdepartamentos_fotos WHERE id_departamentos='.(int)$id_departamentos.' AND id_foto='.(int)$cod);

				} else if ($opcao=='update') {

					$dados = array('posicao'=>$posicao[$cod], 'legenda'=>$legenda[$cod]);
					db_executa('tbdepartamentos_fotos',$dados,'update','id_departamentos='.$id_departamentos.' AND id_foto='.$cod);

				} else {
					header("Location: ../sys/departamentos_fotos.php?id_departamentos=".$id_departamentos."&erro=".urlencode('Opção selecionada inválida.'),true); exit;
				}
			}
		}


		# Saindo		
		header("Location: ../sys/departamentos_fotos.php?id_departamentos=".$id_departamentos."&msg=".urlencode('Feito.'),true); exit;

	}













	// Se nada for feito...
	header("Location: ../sys/".$Config['arquivo'].".php?info=".urlencode('Nada feito'),true); exit;
	
?>