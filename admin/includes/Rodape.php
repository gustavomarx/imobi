 <style>footer {background:#f4f4f4!important; margin:20px 0!important; padding:10px!important; border:none!important}</style>
 <footer class="clearfix">
        <div class="container_12">
            <div class="grid_12">
                	&copy; <?=date("Y");?> - <a href="http://www.haniger.com.br" target="_blank">Haniger</a> - Todos os direitos reservados<br>Haniger - Ag. Digital <a href="http://www.haniger.com.br" target="_blank">Haniger</a>
            </div>
        </div>
    </footer>
</section>

<!-- Main Section End -->
</section>
</div>

<!-- MAIN JAVASCRIPTS -->

<script type="text/javascript" src="../themes/new/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="../themes/new/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="../themes/new/js/jquery.easing.js"></script>
<script type="text/javascript" src="../themes/new/js/jquery.ui.totop.js"></script>
<script type="text/javascript" src="../themes/new/js/jquery.itextsuggest.js"></script>
<script type="text/javascript" src="../themes/new/js/jquery.itextclear.js"></script>
<script type="text/javascript" src="../themes/new/js/jquery.hashchange.min.js"></script>
<script type="text/javascript" src="../themes/new/js/jquery.drilldownmenu.js"></script>
<script type="text/javascript" src="../themes/new/js/jquery.popover.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="../themes/new/js/PIE.js"></script>
<script type="text/javascript" src="../themes/new/js/ie.js"></script>
<![endif]-->

<script type="text/javascript" src="../themes/new/js/global.js"></script>
<!-- MAIN JAVASCRIPTS END -->

<!-- LOADING SCRIPT -->
<script>
$(window).load(function(){
$("#loading").fadeOut(function(){
$(this).remove();
$('body').removeAttr('style');
});
});
</script>
<!-- LOADING SCRIPT -->


   <div id="settings-popover" class="popover">
        <header>
            Configurações
        </header>
        <section>
            <div class="content">
                <nav>
                    <ul>
                        <? if ($_SESSION['Admin']['id_usuario']==1) { ?>
						<li class="alt"><a style="text-shadow:none" href="_usuarios.php" title="">Administradores</a></li>
						<? } ?>

	                    <li><a style="text-shadow:none" href="_senha.php" title="">Alterar senha</a></li>

	                    <li><a style="text-shadow:none" href="../_logoff.php" title="">Sair</a></li>

						<? if ($_SESSION['Admin']['id_usuario']>=2) { ?>
						<li class="alt"><a style="text-shadow:none" href="#" title=""></a></li>
						<li class="alt"><a style="text-shadow:none" href="#" title=""></a></li>
						<? } ?>
                    </ul>
                </nav>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function() {
            $('#activity-button').popover('#activity-popover', {preventRight: true});
            $('#notifications-button').popover('#notifications-popover', {preventRight: true});
            $('#settings-button').popover('#settings-popover', {preventRight: true});
 
        });
    </script>
    <!-- POPOVERS SETUP END-->

</body>
</html>
 



 

		
<!-- IMPORTANTES --> 

		<script type="text/javascript" src="http://dwpe.googlecode.com/svn/trunk/_shared/EnhanceJS/enhance.js"></script>	
   		<script type='text/javascript' src='http://dwpe.googlecode.com/svn/trunk/charting/js/excanvas.js'></script>
        
        <script type='text/javascript' src='../js/jquery.fancybox-1.3.4.pack.js'></script>
        <script type='application/javascript' src='../js/fullcalendar.min.js'></script>
        <script type='text/javascript' src='../js/jquery.wysiwyg.js'></script>
        <script type='text/javascript' src='../js/visualize.jQuery.js'></script>
        <script type='application/javascript' src='../js/functions.js'></script>
 
