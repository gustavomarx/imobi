<?

if (strlen($_GET['p'])>0) {
	if (file_exists('../paginas/'.$_GET['p'].'.php')) {
		include('../paginas/'.$_GET['p'].'.php');
	} else {

		switch($_GET["p"])
		{
			default:
				include("../paginas/principal.php"); 
				break;
		}

	}
} else include("../paginas/principal.php");


?>