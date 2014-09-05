<? 
	define('ID_MODULO',15,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'configuracoes',
		'tabela'=>'tbconfiguracoes',
		'titulo'=>'nomesite',
		'id'=>'id_config',
		'urlfixo'=>'', 
		'pasta'=>'configuracoes',
	);

?>
<?
include('../includes/Mensagem.php');
?>
                	<div class="conthead">
                        <h2>Configurações</h2>
                    </div>
<div id="conteudo">
<a  id="btnalt" href="configuracoes_dados.php?ID=1"><img src="../img/config.png" align="absmiddle" /> Editar Configurações</a>
<br />
<br />
<?



$dados2 = db_lista(db_consulta("SELECT * FROM tbconfiguracoes WHERE id_config=1 LIMIT 1;"));

?>

<br />
<br />
<p style="font-size:14px;">
<img src="../../arquivos/configuracoes/<?=$dados2['imagem'];?>" /><br /><br />
<span style="color:#222">Nome da empresa:</span> <?=$dados2['nomesite'];?><br /> 
<span style="color:#222">Slogan da empresa:</span> <?=$dados2['slogansite'];?><br />
<span style="color:#222">Email da empresa:</span> <?=$dados2['emailsite'];?><br />
<span style="color:#222">Telefones:</span> <?=$dados2['telefone1'];?>, <?=$dados2['telefone2'];?>, <?=$dados2['telefone3'];?><br /> 
<span style="color:#222">Empresa trabalha com Produto ou Serviço:</span> <?=$dados2['produtoservico'];?><br /> 
<span style="color:#222">Endereço:</span> <?=$dados2['endereco'];?> 
</p>
 


</div>
<? include('../includes/Rodape.php'); ?>