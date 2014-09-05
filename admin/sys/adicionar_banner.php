<? 
	define('ID_MODULO',9,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
 
 
	
?>
<?

$ondeestou = 'Nova Galeria';
?>
   <!-- Sidebar End -->

  	<section>
	        
	            	<header>
	                <a href="#menu" class="showmenu button">Menu</a>
					<h2 style="color:#fff; padding:0 20px">Adicionar novo Banner</h2>
					</header>
	              
<div id="conteudo">
	        <section style="min-height:600px">
             
	        Inserir Novo banner

	

        
       
        
        <form name="add" action="adicionar_banner_db.php" method="post" enctype="multipart/form-data">
          
          
  
  
               <div><input type="text" size="28" name="titulo" id="titulo" class="required" placeholder="Título*" /></div>
	
	           <div><input type="text" size="28" name="link" id="link" class="required" placeholder="Link*" /></div>
	
	           <div id="arquivo"><input type="file" size="28" name="arquivo"  class="required"  /></div>
			   
			   <br>
			   <br>
	
	            <div><input type="submit" size="28" name="Submit" id="titulo" class="required" value="Salvar Banner" /></div>
	
      

     
            
            
            
        </form>
        





 
	

</div>
<?
	include('../includes/Rodape.php');
?>
