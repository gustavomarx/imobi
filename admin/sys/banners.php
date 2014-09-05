<? 
	define('ID_MODULO',9,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	
	

?>
<?

$ondeestou = 'Galerias';
?>
                		<section>

						            	<header>
						                <a href="#menu" class="showmenu button">Menu</a>
										<h2 style="color:#fff; padding:0 20px">Imóveis</h2>
										</header>

					<div id="conteudo">
						        <section style="min-height:600px">
							
							
<a  id="btnalt" href="adicionar_banner.php"><img src="../img/add.png" align="absmiddle" /> Adicionar novo Banner</a><br><br>
<!-- começa a sql -->


<table width="900" cellspacing="0" cellpadding="0" border="1" bgcolor="#ffffff" align="center" style="text-align: center; font-size: 14px">

<tr> 
 <td> Imagem </td> <td> Título </td> <td> Pagina de destino </td>
</tr> 

<?
	$sql = "select * from tbbanners";
$query = mysql_query($sql);
while ($linha = mysql_fetch_array($query)) {
      
   echo"<tr>";   
   echo "<td><img src=\"../../banners/".$linha['foto']."\" border=\"0\" width=\"193\" height=\"60\" align=\"middle\" style=\"margin:5px;\">","</td>","<td>".$linha['titulo'],"</td>","<td>".$linha['link'],"</td>","<td><a href=\"excluir_banner.php?id=".$linha['id_banner'],"\">",excluir,"</td>";
   echo"</tr>";
   
}			
?>
</table>

<!-- termina sql -->
<br />
<br />


<? include('../includes/Rodape.php'); ?>
