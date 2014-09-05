<?php
mysql_connect('localhost','imob7_admin','40aFQ5_@L8^[') or die("Erro de Conexão->".mysql_error());
mysql_select_db('imob7_imob7') or die("Erro de Banco de Dados->".mysql_error());

if(isset($_POST["id_imovel"])){
	$id_imovel=$_POST["id_imovel"];

	//echo "<script>alert('$id_imovel');</script>";

	$instrucaoSQL_bairro_imovel = "SELECT bairro FROM tbgalerias WHERE id_galeria='$id_imovel'";
	$result_bairro_imovel = mysql_query($instrucaoSQL_bairro_imovel) or die("Erro de SQL_bairro_imovel->".mysql_error());
	while($row_bairro_imovel=mysql_fetch_array($result_bairro_imovel)){
		$nome_bairro = $row_bairro_imovel["bairro"];
	}
}

$id=$_POST["id"];
//echo "<script>alert('$id');</script>";

	
if($id==0){
	echo "<option value=\"\" selected=\"selected\">Todos Bairros &nbsp&nbsp&nbsp&nbsp</option>";
}else{
	$instrucaoSQL = "SELECT * FROM tbbairros WHERE id_cidades='$id'";
	$result = mysql_query($instrucaoSQL) or die("Erro de SQL->".mysql_error());
	echo "<option value=\"todos\">Todos Bairros</option>";
	while($row=mysql_fetch_array($result)){
		if($nome_bairro==$row['nome']){
			$selected="selected";
		}else{
			$selected="";
		}

			echo "<option value='".htmlentities($row['nome'])."' $selected>".htmlentities($row['nome'])."</option>\n";
		
		
	}
}

?>