<? 
	define('ID_MODULO',0,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');


?>
<meta http-equiv="refresh" content="120; url=index.php" />
 
 

<?
 
	include('../includes/Mensagem.php');
?>




	<section>

	            	<header>
	                <a href="#menu" class="showmenu button">Menu</a>
					<h2 style="color:#fff; padding:0 20px">Painel de controle</h2>
					</header>

<div id="conteudo">
	        <section style="min-height:600px">





<!-- INÍCIO DO GRÁFICO -->          
        		<div class="container med left" id="graphs">
                	<div class="conthead">
                		<h2>Gráfico de visitas</h2>
                    </div>
<!-- MENUS DOS GRAFICOS -->                    
                	<div class="contentbox">
                     
<!-- FIM MENU GRAFICOS -->                       
<!-- INICIANDO TABELAS DE GRAFICOS -->
                    	<div class="tabcontent" id="graphs-1">
                            <table style="display: none; width:400px; height: 250px" class="bar" width="52%">
                                <caption>Visitas ao site nos últimos 3 dias</caption>
                                <thead>
                                    <tr>
                                        <td></td>
<?
$hoje = time(); 
$ontem = $hoje - (24*3600); 
$anteontem = $hoje - (48*3600);
?>
										<th scope="col"> <span  style="color:green; font-weight:bold; text-decoration:underline;"><?echo date('d/m/Y', $hoje); ?> - Hoje</span></th>
										<th scope="col"> <?echo date('d/m/Y', $ontem); ?></th>
										<th scope="col"> <?echo date('d/m/Y', $anteontem);?></th>
										
                                        
										
										
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Visitas</th>
<?
	$i=0;
	$SQL = "SELECT * FROM visitantes ORDER BY id DESC";
	$Lista = new Consulta($SQL,3,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>

                                        <td><?=$linha['contador'];?></td>
										
<?
	}
?>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                   
                    
                   		<div class="tabcontent" id="graphs-4">
                            <table style="display: none; width:400px; height: 250px" class="area" width="52%">
                               <caption>Visitas ao site nos últimos 3 dias</caption>
                                <thead>
                                    <tr>
                                        <td></td>
<?
$hoje = time(); 
$ontem = $hoje - (24*3600); 
$anteontem = $hoje - (48*3600);
?>
										<th scope="col"> <span  style="color:green; font-weight:bold; text-decoration:underline;"><?echo date('d/m/Y', $hoje); ?> - Hoje</span></th>
										<th scope="col"> <?echo date('d/m/Y', $ontem); ?></th>
										<th scope="col"> <?echo date('d/m/Y', $anteontem);?></th>
										
										
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Visitas</th>
<?
	$i=0;
	$SQL = "SELECT * FROM visitantes ORDER BY id DESC";
	$Lista = new Consulta($SQL,3,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>	

                                        <td><?=$linha['contador'];?></td>
										
<?
	}
?>
                                    </tr>
                                </tbody>
                            </table>
                   		</div>
<!-- FIM DO GRÁFICO -->  
                      
                    </div>
                </div>
              
<!-- INÍCIO DAS ESTATÍSTICAS -->               
                <div class="container sml right">
                	<div class="conthead">
                		<h2>Estatísticas</h2>
                    </div>
                	<div class="contentbox">
                    	<ul class="summarystats" style=" ">
							
                        	<li>
							<? $sql = "SELECT * FROM tbgalerias";
							$query = mysql_query($sql) or die(mysql_error());
							$total = mysql_num_rows($query); ?>
                            	<p class="statcount"><?echo $total;?></p> <p>Imóveis cadastrados</p>    <p class="statview"><a href="cursos.php" title="view">ver</a></p>
                            </li>


							<li>
							<? $sql = "SELECT * FROM tbnoticias";
							$query = mysql_query($sql) or die(mysql_error());
							$total = mysql_num_rows($query); ?>
                            	<p class="statcount"><?echo $total;?></p> <p>Postagens no blog</p>    <p class="statview"><a href="noticias.php" title="view">ver</a></p>
                            </li><br />

							<li>
							<? $sql = "SELECT * FROM tblinks";
							$query = mysql_query($sql) or die(mysql_error());
							$total = mysql_num_rows($query); ?>
                            	<p class="statcount"><?echo $total;?></p> <p>Páginas criadas</p>    <p class="statview"><a href="links.php" title="view">ver</a></p>
                            </li>


							<li>
							<? $sql = "SELECT * FROM tbdestaque";
							$query = mysql_query($sql) or die(mysql_error());
							$total = mysql_num_rows($query); ?>
                            	<p class="statcount"><?echo $total;?></p> <p>Endereços / Unidades</p>    <p class="statview"><a href="unidade.php" title="view">ver</a></p>
                            </li>
							
							 
                    
					</ul>

                        
                    </div>
                </div>
<!-- FIM DAS ESTATÍSTICAS -->  
               
                <!-- LIMPAR --> <div style="clear: both"></div>
              
			  
			  
			  
			  

 
<? include('../includes/Rodape.php'); ?>