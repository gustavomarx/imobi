<?php

mysql_connect('localhost','imob7_admin','40aFQ5_@L8^[') or die("Erro de Conexão->".mysql_error());
mysql_select_db('imob7_imob7') or die("Erro de Banco de Dados->".mysql_error());

$instrucaoSQL1 = "SELECT * FROM tbgalerias";
$result1 = mysql_query($instrucaoSQL1) or die("Erro de SQL1->".mysql_error());

while($linha1=mysql_fetch_array($result1)){
	$preco = str_replace(".", "", $linha1['preco']);
	$preco = str_replace(",", ".", $preco);	
	$id = $linha1['id_galeria'];
	echo $instrucaoSQL2 = "<br> UPDATE tbgalerias SET preco = $preco WHERE id_galeria = $id;";
	//$result2 = mysql_query($instrucaoSQL2) or die("Erro de SQL1->".mysql_error());
}

?>