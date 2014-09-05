<? 
	define('ID_MODULO',41,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	include('../includes/tinyMCE_advanced.php');

	$Config = array(
		'arquivo'=>'alunos_fotos',
		'tabela'=>'tbalunos_fotos',
		'titulo'=>'legenda',
		'id'=>'id_foto',
		'urlfixo'=>'&id_aluno='.$_GET['id_aluno'], 
		'pasta'=>'aluno',
	);


	function alunoConfigValor($s) {
		list($valor) = db_lista(db_consulta("SELECT valor FROM tbalunos_config WHERE campo LIKE '".$s."' LIMIT 1;"));
		return $valor;
	}

	if ($_GET['id_aluno']>0) {
		$dados2 = db_lista(db_consulta("SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM tbalunos WHERE id_aluno=".(int)$_GET['id_aluno']." LIMIT 1;"));
	}


?>
<?
include('../includes/Mensagem.php');
?>
                	<div class="conthead">
                        <h2>Adicionar Fotos em <?=$dados2['titulo'];?></h2>
                    </div>
<script language="javascript">
	function mudaUploadTipo(t) {
		if (t==1) {
			document.getElementById('uploadForm').style.display='none'; 
			document.getElementById('uploadFtp').style.display='block'; 
		} else {
			document.getElementById('uploadForm').style.display='block'; 
			document.getElementById('uploadFtp').style.display='none'; 
		}
	}
	
	
	function fotoSeleciona(cod) {
		if (cod > 0 && document.getElementById('foto'+cod)) {
			document.getElementById('foto'+cod).checked = 'checked';
		}
	}

</script>
<div id="conteudo">








<?
// -------------------------------------------------------------------------------
// Dados do Evento
// -------------------------------------------------------------------------------
?>










<?
// -------------------------------------------------------------------------------
// Fazendo UPLOAD (ftp ou formulario)
// -------------------------------------------------------------------------------

?>
<fieldset class="adicionar">
	<legend>
		Upload 
        <span style="font-size:15px;">
            <input id="uploadType1" type="radio" name="uploadType" value="2" style="border:0" onclick="mudaUploadTipo(this.value);" checked="checked"> <label for="uploadType1">Formulário</label>
            <input id="uploadType2" type="radio" name="uploadType" value="1" style="border:0" onclick="mudaUploadTipo(this.value);"> <label for="uploadType2">Ftp</label>
        </span>
    </legend>

<p class="paginaSubtitulo">
</p>

<table class="viewCampos" id="uploadForm">
  <form name="frm1" action="../app/aluno.php?faz=fotosForm" method="post" enctype="multipart/form-data">
  <input maxlength="25" type="hidden" name="id_aluno" value="<?=$dados2['id_aluno'];?>" >
  <tr>
  <? for ($i=1;$i<=8;$i++) { ?>
  	<td align="right"><b>Imagem <?=$i;?>:</b> <input type="file" name="imagem<?=$i;?>" size="20"  /><br /> <select name="legenda[<?=$i;?>]"  />
	
		<?
		$b=0;
		$SQL = "SELECT * FROM tbgalerias ORDER BY titulo";
		$Lista = new Consulta($SQL,99,$PGATUAL);
		while ($linha = db_lista($Lista->consulta)) { $b++;
		?>
 
		<option value="<?=($linha['id_galeria']);?>"><?=($linha['titulo']);?> - <?=($linha['id_galeria']);?></option>
		
		<?
		}
		?>
	
	</select><br /></td>
  <?
  		if (($i%2)==0) echo '</tr><tr><td height=10></td></tr><tr>';
  	 } 
  ?>
  <tr>
  	<td colspan="2" align="right">
    	<input type="reset" name="reset" value="cancelar"  style="height:35px!important;" height="35px" id="btnalt" />&nbsp;
        <input type="submit" name="submit" value="enviar fotos"  style="height:35px!important;" height="35px" id="btn"/>
	</td>
  </tr>
  </form>
</table>

<table class="viewCampos" id="uploadFtp" style="display:none;">
  <form name="frm1" action="../app/aluno.php?faz=fotosFtp" method="post" enctype="multipart/form-data">
  <input maxlength="25" type="hidden" name="id_aluno" value="<?=$dados2['id_aluno'];?>" >
  <tr><td>Baixar as fotos de <font face="Courier New, Courier, monospace">/arquivos/aluno/ftp/</font></td></tr>
  <tr><td><select name="pasta" style="width:100%"><?
  
  	$PastasFTP = ListaDiretorio('../../arquivos/ftp/', 'dir');
	foreach ($PastasFTP as $pasta) {

		echo '<option value="'.$pasta.'">'.$pasta.'</option>';

	}

  ?></select></td></tr>
  <tr><td align="right"><input  style="height:35px!important;" height="35px" id="btn" type="submit" name="submit" value="enviar fotos" /></td></tr>
  </form>
</table>
</fieldset>






<?
// -------------------------------------------------------------------------------
// Fotos do sistema
// -------------------------------------------------------------------------------
?>
<fieldset class="adicionar"><legend>Fotos</legend>

<table >
  <form name="frm1" action="../app/aluno.php?faz=photosAction" method="post" enctype="multipart/form-data">
  <input maxlength="25" type="hidden" name="id_aluno" value="<?=$dados2['id_aluno'];?>" >
  <tr>
  <?
  	$fotos = db_consulta("SELECT * FROM tbalunos_fotos WHERE id_aluno=".(int)$dados2['id_aluno']." ORDER BY posicao ASC;");
	$i=0;
	if (db_linhas($fotos)>0) {
	while ($foto = db_lista($fotos)) { $i++;
  ?>
		<td width="80" align="center">
        	<label><input value="1" type="checkbox" id="foto<?=$foto['id_foto'];?>" name="foto[<?=$foto['id_foto'];?>]" style="border:0"><img alt="<?=(int)$foto['contador'];?> views" src="../../arquivos/aluno/<?=$dados2['codigo'];?>/miniaturas/<?=$foto['imagem'];?>" /></label><br />
            Pos: <input name="posicao[<?=$foto['id_foto'];?>]" type="text" value="<?=$foto['posicao'];?>" style="width:42px" onkeyup="fotoSeleciona(<?=(int)$foto['id_foto'];?>);" onchange="fotoSeleciona(<?=(int)$foto['id_foto'];?>);" /><br />
            <input type="text" style="width:70px" name="legenda[<?=$foto['id_foto'];?>]" value="<?=$foto['legenda'];?>" onkeyup="fotoSeleciona(<?=(int)$foto['id_foto'];?>);" onchange="fotoSeleciona(<?=(int)$foto['id_foto'];?>);" />
		</td>
  <?
		if (($i%7)==0) echo '</tr><tr>';
	}
  ?>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
  	<td colspan="10" width="400">
    	<img src="../img/arrow_ltr.png" /> Com selecionados: 
    	<select name="opcao">
        	<option value="update">Atualizar</option>
        	<option value="delete">Excluir</option>
        </select>
        <input type="submit" name="submit" value="salvar"  style="height:35px!important;" height="35px" id="btn"/>
    </td>
  </tr>
<?
	} else echo '<tr><td><font color=red><b>Nenhuma foto encontrada.</b></font></td></tr>';
?>
  </form>
</table>
</fieldset>











</div>
<?
	include('../includes/Rodape.php');
?>