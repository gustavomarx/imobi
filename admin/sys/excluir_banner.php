<? 
	define('ID_MODULO',9,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	
	$id = strip_tags( $_GET['id'] );

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
	  
	  
	     
	   
	   $sql = mysql_query("SELECT * FROM tbbanners WHERE id_banner='$id'");
	   while($linha = mysql_fetch_array($sql)){
	   
	   $imgExb = $linha["foto"];
        }	   
	   
	   $del = mysql_query("DELETE FROM tbbanners WHERE id_banner='$id'") or print(mysql_error());
	   
	   $delImg = unlink("../../banners/$imgExb");// exclui todas as fotos do album
	    
	   
	   echo '<div align="center"><strong><font color="#006699" size="2" face="Arial, Helvetica, sans-serif">Altera&ccedil;&atilde;o 
  efetuada com sucesso</font></strong></div>';
  		
       echo "<meta HTTP-EQUIV='Refresh' CONTENT='1;URL=banners.php'>";
     
		
		
	 
	
	
?>
</table>

<!-- termina sql -->
<br />
<br />


<? include('../includes/Rodape.php'); ?>
