<!DOCTYPE html>
<!--[if IE 7 ]>   <html lang="en" class="ie7 lte8"> <![endif]--> 
<!--[if IE 8 ]>   <html lang="en" class="ie8 lte8"> <![endif]--> 
<!--[if IE 9 ]>   <html lang="en" class="ie9"> <![endif]--> 
<!--[if gt IE 9]> <html lang="en"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head><!--[if lte IE 9 ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->

<!-- iPad Settings -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->
<!-- iPad Settings End -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gerenciador de conte&uacute;do - Magnis Hospedagem Ilimitada - www.magnis.com.br</title>

 <script src="http://code.jquery.com/jquery-1.7.min.js"></script>
<script>window.jQuery || document.write("<script src='../themes/new/js/jquery.min.js'>\x3C/script>")</script>
	<link href="../css/admin.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/imprimir.css" rel="stylesheet" type="text/css" media="print"/>

			<!-- CSS -->
		<link rel="stylesheet" href="../resources/css/style.css" type="text/css" media="screen" />
		<!-- NAO APAGAR-->
		<link rel="stylesheet" href="../resources/css/invalid.css" type="text/css" media="screen" />	
		
 
		<script>
		$(document).ready(function(){
		$(".close").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // esse script é o responsável em fechar a notificação de alerta, erro, etc
					$(this).slideUp(400);
				});
				return false;
			}
		);
		});
		</script>
		
	 
<!-- css calendádio -->
<link href="../styles/fullcalendar.css" rel="stylesheet" type="text/css" />
<!-- ligthbox css -->
<link href="../styles/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" />
<!-- WYSIWYG Editor de texto -->
<link href="../styles/wysiwyg.css" rel="stylesheet" type="text/css" />
<!-- CSS CONTROLES E DEMAIS OPÇÕES -->
<link href="../styles/main.css" rel="stylesheet" type="text/css" />
<!-- CSS GERAL -->
<link href="../themes/blue/styles.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="../themes/new/favicon.ico">

<!-- iOS ICONS -->
<link rel="apple-touch-icon" href="../themes/new/touch-icon-iphone.png" />
<link rel="apple-touch-icon" sizes="72x72" href="../themes/new/touch-icon-ipad.png" />
<link rel="apple-touch-icon" sizes="114x114" href="../themes/new/touch-icon-iphone4.png" />
<link rel="apple-touch-startup-image" href="../themes/new/touch-startup-image.png">
<!-- iOS ICONS END -->

<!-- STYLESHEETS -->

<link rel="stylesheet" href="../themes/new/css/reset.css" media="screen" />
<link rel="stylesheet" href="../themes/new/css/grids.css" media="screen" />
<link rel="stylesheet" href="../themes/new/css/ui.css" media="screen" />
<link rel="stylesheet" href="../themes/new/css/forms.css" media="screen" />
<link rel="stylesheet" href="../themes/new/css/device/general.css" media="screen" />
<!--[if !IE]><!-->
<link rel="stylesheet" href="../themes/new/css/device/tablet.css" media="only screen and (min-width: 768px) and (max-width: 991px)" />
<link rel="stylesheet" href="../themes/new/css/device/mobile.css" media="only screen and (max-width: 767px)" />
<link rel="stylesheet" href="../themes/new/css/device/wide-mobile.css" media="only screen and (min-width: 480px) and (max-width: 767px)" />
<!--<![endif]-->
<link rel="stylesheet" href="../themes/new/css/jquery.uniform.css" media="screen" />
<link rel="stylesheet" href="../themes/new/css/jquery.popover.css" media="screen">
<link rel="stylesheet" href="../themes/new/css/jquery.itextsuggest.css" media="screen">
<link rel="stylesheet" href="../themes/new/css/themes/lightblue/style.css" media="screen" />



<style type = "text/css">
    #loading-container {position: absolute; top:50%; left:50%;}
    #loading-content {width:800px; text-align:center; margin-left: -400px; height:50px; margin-top:-25px; line-height: 50px;}
    #loading-content {font-family: "Helvetica", "Arial", sans-serif; font-size: 16px; color: black;   }
    #loading-graphic {margin-right: 0.2em; margin-bottom:-2px;}
    #loading {background-color:#fff; background-image: -moz-radial-gradient(50% 50%, ellipse closest-side, #fff, #fff 100%); background-image: -webkit-radial-gradient(50% 50%, ellipse closest-side, #fff, #fff 100%); background-image: -o-radial-gradient(50% 50%, ellipse closest-side, #fff, #fff 100%); background-image: -ms-radial-gradient(50% 50%, ellipse closest-side, #fff, #fff 100%); background-image: radial-gradient(50% 50%, ellipse closest-side, #fff, #fff 100%); height:100%; width:100%; overflow:hidden; position: absolute; left: 0; top: 0; z-index: 99999; }

fieldset {  background:#fff!important; border:0!important }
legend {display:none!important}
 
</style>

<!-- STYLESHEETS END -->

<!--[if lt IE 9]>
<script src="../themes/new/js/html5.js"></script>
<script type="text/javascript" src="../themes/new/js/selectivizr.js"></script>
<![endif]-->

</head>
<body style="overflow: hidden;">
    <div id="loading"> 

        <script type = "text/javascript"> 
            document.write("<div id='loading-container'><p id='loading-content'>" +
                           "<img id='loading-graphic' width='16' height='16' src='http://demo.marcofolio.net/facebook_loader/images/loading.gif' /> " +
                           "Carregando...</p></div>");
        </script> 

    </div> 

    <div id="wrapper">
        <header>
            <h1><a href="#">Administra&ccedil;&atilde;o</a></h1>
            <nav>
                <div class="container_12">
                    <div class="grid_12">
                        <ul class="toolbar clearfix fl">
                             
                            <li>
                                <a href="#" title="Settings" class="icon-only" id="settings-button">
                                    <img src="../themes/new/images/navicons-small/19.png" alt=""/>
                                </a>
                            </li>
                            <li>
                                <a href="index.php" title="Inicial" class="inicial" id="inicial">
                                    <img src="../themes/new/images/navicons-small/inicial.png" alt=""/>
                                </a>
                            </li>
							
							<li>
			 
			                  <a href="banners.php" title="Banners" class="inicial" id="banners">
							  <img src="../themes/new/images/navicons-small/banner.png" alt=""/>
			                </li>
							
							
							
							
                        </ul>
                        <a href="../_logoff.php" title="Logout" class="button icon-with-text fr"><img src="../themes/new/images/navicons-small/129.png" alt=""/>Sair</a>
                        <div class="user-info fr">
                           Ol&aacute; <?=$_SESSION['Admin']['nome'];?>, seu &uacute;ltimo login foi: <?=utf8_encode($_SESSION['Admin']['data_login']);?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        
        <section>
            <!-- Sidebar -->

            <aside>
                <nav class="drilldownMenu">
                   
               
                        <button title="Go Back" class="back"><</button>
                  
                                     
                    <ul class="tlm">
	
							<?	
								function ListaMenu($dentro_id) {
								$i=0;
								$consulta = db_consulta("SELECT * FROM adm_menu WHERE dentro_id=".(int)$dentro_id." ORDER BY titulo ASC;");
								if (db_linhas($consulta)>0) {
								while ($linha = db_lista($consulta)) { $i++;
									if ($i>1) $saida;
									if (empty($linha['icone'])) $linha['icone']='';

									if (!($linha['dentro_id']>0)) {
										$saida .= '<li class="';
										if (ID_MODULO==$linha['id_menu']) { $saida .= 'hasul current"><a href="#" '; }else{ $saida .= 'hasul"><a href="#" ';}
										if (! usuarioPermissao($_SESSION['Admin']['id_usuario'],$linha['id_menu'])) $saida .= ' style="display:none;" ';
										$saida .= "><span>".utf8_encode($linha['titulo'])."</span>";

										if (! usuarioPermissao($_SESSION['Admin']['id_usuario'],$linha['id_menu'])) {$saida .= "</a>";}else{
										$saida .= "</a><ul>";}

									} else $saida .= "<li><a href='".$linha['destino']."'><span>".utf8_encode($linha['titulo'])."</span></a></li>";


									if ((!usuarioPermissao($_SESSION['Admin']['id_usuario'],$linha['id_menu']))&&($linha['id_dentro']==0)) {} else {
										if (db_linhas(db_consulta("SELECT id_menu FROM adm_menu WHERE dentro_id=".(int)$linha['id_menu']))>0) {
											$saida .= ListaMenu($linha['id_menu']);

										}
									}
									$saida .= '';

								}	$saida .= "</ul></li>";
								}	else $saida .= '';

								return $saida;
							}

							echo ListaMenu(0);

							?>
	
	
	 
                    </ul>
                </nav>
            </aside>

            <!-- Sidebar End -->
 

 
