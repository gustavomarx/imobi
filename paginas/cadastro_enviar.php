<?
 

# Configurações
$quemsomos = db_dados("SELECT * FROM tbdepartamentos WHERE id_departamentos=150 LIMIT 1");
?>
	
<?php
 
/* Medida preventiva para evitar que outros domínios sejam remetente da sua mensagem. */
if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
        $emailsender = $quemsomos['email']; // Substitua essa linha pelo seu e-mail@seudominio
} else {
        $emailsender = $quemsomos['email'];
        //    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
        // Você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
}
 
/* Verifica qual éo sistema operacional do servidor para ajustar o cabeçalho de forma correta.  */
if(PATH_SEPARATOR == ";") $quebra_linha = "\r\n"; //Se for Windows
else $quebra_linha = "\n"; //Se "nÃ£o for Windows"
 
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nomeremetente     = $_POST['nome'];
$emailremetente    = $_POST['email'];
$emaildestinatario = $emailsender;
$comcopia          = $_POST['comcopia'];
$comcopiaoculta    = $_POST['comcopiaoculta'];
$telefone           = $_POST['telefone'];
$verba           = $_POST['verba'];
$mensagem          = $_POST['mensagem'];
 
 
$finalidade = $_POST['finalidade'];
$tipo = $_POST['tipo'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$areatotal =  $_POST['areatotal'];
$areaprivada = $_POST['areaprivada'];
$dormitorios = $_POST['dormitorios'];
$garagem = $_POST['garagem'];
$valor = $_POST['valor'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem']; 
 
 if (($nomeremetente == "") || ($emailremetente == "") || ($telefone == ""))

  {

    echo "<script>alert('Nenhum campo pode ficar em branco.');</script>";

	echo "<script>history.go(-1);</script>";
	exit;
  }





// Validando o campo com E-mail



if (substr_count($emailremetente,"@") == 0 || substr_count($emailremetente,".") == 0)

  {

   echo "<script>alert('Por favor, utilize um e-mail válido');</script>";

   echo "<script>history.go(-1);</script>";
	exit;
   }
   
   
 
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<P><i>Mensagem enviada por '.$nomeremetente.' - '.$emailremetente.'</i></P>
<p><b><i>Telefone: '.$telefone.'</i></b></p>
<p><b><i>Mensagem: '.$mensagem.'</i></b></p>

<p><b><i>Gostaria de cadastrar meu imóvel para: '.$finalidade.'</i></b></p>
<p><b><i>Imóvel do tipo: '.$tipo.'</i></b></p>
<p><b><i>Na cidade: '.$cidade.'</i></b></p>
<p><b><i>No bairro: '.$bairro.'</i></b></p>
<p><b><i>Com: '.$dormitorios.' dormitórios</i></b></p>
<p><b><i>Área privada: '.$areaprivada.' m²</i></b></p>
<p><b><i>Área total: '.$areatotal.' m²</i></b></p>
<p><b><i>Vagas de garagem: '.$garagem.' </i></b></p>


<p><b><i>Valor de '.$finalidade.'   : '.$valor.' Reais</i></b></p>

<hr>';
 
 
/* Montando o cabeÃ§alho da mensagem */
$headers = "MIME-Version: 1.1" .$quebra_linha;
$headers .= "Content-type: text/html; charset=UTF-8" .$quebra_linha;
// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
$headers .= "From: " . $emailsender.$quebra_linha;
$headers .= "Cc: " . $comcopia . $quebra_linha;
$headers .= "Bcc: " . $comcopiaoculta . $quebra_linha;
$headers .= "Reply-To: " . $emailremetente . $quebra_linha;
// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)

// assunto
$eleenvioou = $nomeremetente.' - '.$telefone;
/* Enviando a mensagem */

//É obrigatório o uso do parâmetro -r (concatenação do "From na linha de envio"), aqui na Locaweb:

if(!mail($emaildestinatario, $eleenvioou, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
    $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
    mail($emaildestinatario, $telefone, $mensagemHTML, $headers );
}
 
/* mostrando mensagem ao usuário e redirecionando */
   echo '<script>alert("Mensagem enviada com sucesso!");</script>';

   echo "<script>history.go(-1);</script>";


?>