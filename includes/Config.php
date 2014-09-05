<?php



	# Iniciando sessão
	@session_start();

	# Banco de Dados
	define(DB_SERVIDOR,		'localhost',	true); //Aqui vai o servidor geralmente é localhost, outras pode ser um ip ou um endereco fornecido pelo seu host
	define(DB_USUARIO,		'imob7_admin',	true); //aqui o usuario do banco de dados, no cPanel vem acompanhado de usuariodocpanel_usuariodobanco
	define(DB_SENHA,		'40aFQ5_@L8^[',	true); //senha do usuario do banco de dados
	define(DB_BANCO,		'imob7_imob7',	true); //banco de dados no cpanel é usuariodocpanel_bandodedados
	db_conectar();


	# Constantes
	define(CONF_EMAIL, 'atendimento@imobiliaria7setembro.com.br', true); # antere o e-mail do administrador


	# Paginação
	if (isset($_GET["pg"]) && is_numeric($_GET["pg"])) $PGATUAL = $_GET["pg"]; else $PGATUAL = 1; 





?>
