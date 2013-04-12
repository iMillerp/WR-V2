<?php

class Login {

  // DEFININDO VARIÁVEIS
  private $SenhaUsuario;
  private $tabela;
  private $campoLogin;
  private $campoSenha;
  public $LoginUsuario;
  public $msgErro;

  // DEFINIR AS INFORMAÇÕES DA CLASSE
  function Login($tabela = "usuarios", $campoLogin = "login", $campoSenha = "senha", $msgErro = "Login ou senha inválido") {
    $this->tabela = $tabela;
    $this->campoLogin = $campoLogin;
    $this->campoSenha = $campoSenha;
    $this->msgErro = $msgErro;
  }

  // FAZENDO LOGIN DO USUARIO
  function logar($login, $senha, $redireciona = false) {
    // Informações do formulário
    $this->SenhaUsuario = mysql_real_escape_string(addslashes($senha));
    $this->LoginUsuario = mysql_real_escape_string(addslashes($login));

    // Verifica se o usuário existe
    $que = "SELECT * FROM usuarios WHERE login = '" . $this->LoginUsuario . "' AND senha = '" . $this->SenhaUsuario . "' AND status = 1 LIMIT 0,1";
    $consulta = mysql_query($que);
    $campos = mysql_num_rows($consulta);
    $resultado = mysql_fetch_array($consulta);
    if ($resultado['acesso'] == 1) {
      return $this->msgErro = "Usuario já esta logado.";
    }
    // Se o usuário existir
    if ($campos != 0):
      // Se a senha estiver incorreta
      if ($this->SenhaUsuario != mysql_result($consulta, 0, $this->campoSenha)):
        return $this->msgErro;
      // Se a senha estiver correta
      else:
        // Coloca as informações em sessões
        mysql_query("UPDATE `usuarios` SET `acesso` = '1', ip_usuario ='".$_SERVER["REMOTE_ADDR"]."' WHERE `login` ='" . $this->LoginUsuario . "'");
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['LoginUsuario'] = $login;
        $_SESSION['NomeUsuario'] = $resultado['nome'];
        $_SESSION['IdUsuario'] = $resultado['id_usuario'];
        $_SESSION['ImagemUsuario'] = $resultado['foto'];
        $_SESSION['SenhaUsuario'] = $senha;
        // Se for necessário redirecionar
        if ($redireciona):
          header("Location: " . $redireciona . "");
        endif;
      endif;
    // Se o usuário não existir
    else:
      return $this->msgErro;
    endif;
  }

  // LOGOUT
  function logout($redireciona = false) {
    session_start();
    $query = "UPDATE `usuarios` SET `acesso` = '0' WHERE `login` ='" . $_SESSION['LoginUsuario'] . "'";
    mysql_query($query);
    // Limpa a Sessão
    $_SESSION = array();
    // Destroi a Sessão
    session_destroy();
    // Modifica o ID da Sessão
    session_regenerate_id();

    // Se for necessário redirecionar
    if ($redireciona):
      session_start();
      $_SESSION['logout'] = true;
      header("Location: " . $redireciona . "");
      define("logout", "Saida concluida.");
      exit;
    endif;
  }

  // VERIFICA SE O USUÁRIO ESTÁ LOGADO
  function verificar($redireciona = false) {
    session_start();
    // Se estiver logado
    $que = "SELECT * FROM usuarios WHERE login = '" . $_SESSION["LoginUsuario"] . "' AND senha = '" . $_SESSION['SenhaUsuario'] . "' AND status = 1 LIMIT 0,1";
    $consulta = mysql_query($que);
    $resultado = mysql_fetch_array($consulta);
    if ($resultado['acesso'] == 1) {
      if (isset($_SESSION['LoginUsuario']) and isset($_SESSION['logado'])) {
        global $LoginUsuario;
        $LoginUsuario = $_SESSION["LoginUsuario"];
        return true;
        // Se não estiver logado
      } else {
        $log = new Login();
        $log->logout("index.php");
        // Se for necessário redirecionar
        if ($redireciona):
          header("Location: " . $redireciona . "");
        endif;
        return false;
        exit;
      }
    }
  }
}
?>