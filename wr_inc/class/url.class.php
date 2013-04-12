<?php

/**
 * WR-Panel
 *
 * @version 1.0.18
 * @author Miller P. Magalhães
 * @link http://www.millerdev.com.br
 *
 */
class url {

  var $GetString;
  var $GetLocal;

  function writepage() {
    if (isset($this->GetString) == true) {
      $login = new Login();
      if ($login->verificar()) {
        if (file_exists($this->GetLocal . "/" . $this->GetString . ".php")) {
          require_once($this->GetLocal . "/" . $this->GetString . ".php" );
          exit();
        } else {
          require_once("paginas/error.php");
          exit();
        }
      } else {
        echo '<div class="mws-form-message error">
      <h3>Você precisa estar logado para acessar essa pagina.</h3>
      <a href="index.php"> Clique aqui para logar.</a>
    </div>';
        exit;
      }
    }
  }

}

?>
