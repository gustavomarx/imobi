<?php
include('../includes/Config.php');

$SQL = ("SELECT * FROM calendario");
        $array = array();
        $i = 0;
        while ($row = mysql_fetch_array($SQL)) {
            $array[$i]=array("id"=>$row["id_evento"],"title"=>$row["titulo"],"start"=>$row["data"],"allDay"=>false,"description"=>$row["descricao"],"editable"=>true);
            $i++;
        }

 echo json_encode($array);

?>
