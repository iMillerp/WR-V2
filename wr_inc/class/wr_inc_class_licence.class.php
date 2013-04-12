<?php

/**
 * WR-Panel
 *
 * @version 1.0.18
 * @author Miller P. Magalhães
 * @link http://www.millerdev.com.br
 *
 */
$host = $_SERVER['SERVER_NAME'];
define("host", $host);

class MySQLMPDEV {

  function construct() {

  }

  private $host = "localhost";
  private $dbnome = "";
  private $usuario = "";
  private $senha = "";
  private $conhost = "";

  public function getHost($nome) {
    $this->host = $nome;
  }

  public function getDb($nome) {
    $this->dbnome = $nome;
  }

  public function getUsuario($nome) {
    $this->usuario = $nome;
  }

  public function getSenha($nome) {
    $this->senha = $nome;
  }

  public function conexao() {
    if ($this->dbnome == "") {
      echo "Informe o nome do banco de dados";
      exit;
    }
    if ($this->usuario == "") {
      echo "Informe o nome do usuario do banco de dados";
      exit;
    }
    if ($this->senha == "") {
      echo "Informe a senha do usuario do banco";
      exit;
    }
    $this->conhost = mysql_connect($this->host, $this->usuario, $this->senha) or die(mysql_error());
    mysql_select_db($this->dbnome, $this->conhost) or die(mysql_error());
  }

  public function desconexao() {
    if (!mysql_close($this->conhost)) {
      mysql_error();
    }
  }

  function destruct() {

  }

}

function verificarLicenca($serial, $host) {
  //Configuração Local
  if ($host == "127.0.0.1") {
    $obj = new MySQLMPDEV();
    $obj->getHost("127.0.0.1");
    $obj->getDb("webradio");
    $obj->getUsuario("root");
    $obj->getSenha("mestre");
    $obj->conexao();
    $query = "SELECT * FROM licences WHERE serial = '$serial' AND host = '$host' AND status = 1";
    $a = mysql_query($query);
    $b = mysql_fetch_array($a);
    if ($b) {
      return $b;
    } else {
      echo "<br/><span style='padding:10px; margin-top: 20px; background-color: #ccc; color:red; text-shadow: 0 0 8px #CC0000; border-radius: 5px; border: 1px dashed red;'>Por favor insira uma lince&ccedil;a valida!</span>";
      exit;
    }
  }
  //Configuração Remota
  else {
    $obj = new MySQLMPDEV();
    $obj->getHost("millerdev.com.br");
    $obj->getDb("millerde_radio");
    $obj->getUsuario("millerp");
    $obj->getSenha("81268445");
    $obj->conexao();
    $query = "SELECT * FROM licences WHERE serial = '$serial' AND host = '$host' AND status = 1";
    $a = mysql_query($query);
    $b = mysql_fetch_array($a);
    if ($b) {
      return $b;
    } else {
      echo "<br/><span style='padding:10px; margin-top: 20px; background-color: #ccc; color:red; text-shadow: 0 0 8px #CC0000; border-radius: 5px; border: 1px dashed red;'>Por favor insira uma lince&ccedil;a valida!</span>";
      exit;
    }
  }
}
#######VERIFICAÇÃO DE LICENÇA##########
$c = verificarLicenca(serial, host);###
define("serial", $c['serial']);########
define("tipo_lc", $c['tipo']);#########
define("dominio", $c['host']);#########
define("proprietario", $c['prop']);####
define("valid", $c['valid']);##########
define("version", "1.0.18");###########
#######################################
?>