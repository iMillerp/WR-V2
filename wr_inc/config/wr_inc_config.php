<?php
error_reporting(E_ALL ^ E_NOTICE); //Desativo os NOTICES
/**
 * WR-Panel
 *
 * @version 1.0.18
 * @author Miller P. Magalhães
 * @link http://www.millerdev.com.br
 *
 */

/**
 * Configuração - "Conexão com MySQL"
 */
$host = $_SERVER['SERVER_NAME'];
define("host", $host);

//Configuração Local
if (host == "127.0.0.1") {
  define("wr_mysql_host", "127.0.0.1"); //Servidor MySQL. Padrão: localhost
  define("wr_mysql_user", "root"); //Usuario MySQL. Padrão: root
  define("wr_mysql_password", "mestre"); //Senha do Usuario MySQL.
  define("wr_mysql_db", "webradio"); //Database do MySQL.

  define("serial", "baacc1761981fd351f1030a6460fdffab"); //Serial de ativação do Painel
}

//Configuração Remota
else {
  define("wr_mysql_host", "localhost"); //Servidor MySQL. Padrão: localhost
  define("wr_mysql_user", "millerp"); //Usuario MySQL. Padrão: root
  define("wr_mysql_password", "81268445"); //Senha do Usuario MySQL.
  define("wr_mysql_db", "millerde_radio"); //Database do MySQL.

  define("serial", "baacc1761981fd351f1030a6460fdffb"); //Serial de ativação do Painel
}
?>
