<?php

/**
 * WR-Panel
 *
 * @version 1.0.18
 * @author Miller P. Magalhães
 * @link http://www.millerdev.com.br
 *
 */
/**
 * Inicialização - "Conexão com MySQL"
 */
$db = new MySQL();
if (!$db->Open(wr_mysql_db, wr_mysql_host, wr_mysql_user, wr_mysql_password)) {
  $db->Kill();
}
/**
 * Estatisticas - Conta usuarios Clube
 */
if ($db->Query("SELECT * FROM `usuarios`")) {
  if ($db->RowCount() < 1) {
    define("esta_usuarios_count", "0");
  } else {
    define("esta_usuarios_count", $db->RowCount());
  }
} else {
  echo "<p>Query Failed</p>";
}

/**
 * Estatisticas - Conta noticias
 */
if ($db->Query("SELECT * FROM `noticias`")) {
  if ($db->RowCount() < 1) {
    define("esta_noticias_count", "0");
  } else {
    define("esta_noticias_count", $db->RowCount());
  }
} else {
  echo "<p>Query Failed</p>";
}

/**
 * Estatisticas - Conta Visitas
 */
if ($db->Query("SELECT * FROM `visitas`")) {
  if ($db->RowCount() < 1) {
    define("esta_visitas_count", "0");
  } else {
    define("esta_visitas_count", $db->RowCount());
  }
} else {
  echo "<p>Query Failed</p>";
}

/**
 * Estatisticas - Conta Pedidos
 */
if ($db->Query("SELECT * FROM `pedidos`")) {
  if ($db->RowCount() < 1) {
    define("esta_pedidos_count", "0");
  } else {
    define("esta_pedidos_count", $db->RowCount());
  }
} else {
  echo "<p>Query Failed</p>";
}

/**
 * Estatisticas - Pedidos
 */
if ($db->Query("SELECT * FROM `painel_pedidos` WHERE id = 1")) {
  $a = $db->RecordsArray();
  if ($a[0]['status'] == "1") {
    define("status_painel", 1);
    if ($db->Query("SELECT * FROM `pedidos` WHERE visivel = 1")) {
      if ($db->RowCount() < 1) {
        $pedidos = array();
      } else {
        $pedidos = $db->RecordsArray();
      }
    }
  } elseif ($a[0]['status'] == "0") {
    define("status_painel", 0);
  } else {
    $pedidos = array();
  }
}

/**
 * Buscar lista de Usuarios
 */
if ($db->Query("SELECT * FROM usuarios")) {
  if ($db->RowCount() < 1) {
    $usuarios = array();
  } else {
    $usuarios = $db->RecordsArray();
  }
} else {
  echo "<p>Query Failed</p>";
}

/**
 * Buscar lista de Usuarios Ajax
 */
if ($db->Query("SELECT login FROM usuarios")) {
  if ($db->RowCount() < 1) {
    $usuarios_ajax = array();
  } else {
    $usuarios_ajax = $db->GetJSON();
  }
} else {
  echo "<p>Query Failed</p>";
}

/**
 * Estatisticas - Conta Logs
 */
if ($db->Query("SELECT * FROM `registro_de_logs`")) {
  if ($db->RowCount() < 1) {
    define("esta_logs_count", "0");
    $logsPainel = array();
  } else {
    define("esta_logs_count", $db->RowCount());
    $logs = new MySQL();
    if (!$logs->Open(wr_mysql_db, wr_mysql_host, wr_mysql_user, wr_mysql_password)) {
      $logs->Kill();
    }
    $logs->Query("SELECT * FROM `registro_de_logs` ORDER BY id_registro_de_logs DESC ");
    $logsPainel = $logs->RecordsArray();
  }
} else {
  echo "<p>Query Failed</p>";
}

/**
 * Estatisticas - Usuarios Online
 */
if ($db->Query("SELECT * FROM `usuarios` WHERE acesso = 1")) {
  if ($db->RowCount() < 1) {
    $usersOnline = array();
  } else {
    $usersOnline = $db->RecordsArray();
  }
} else {
  echo "<p>Query Failed</p>";
}

function formata_data($data) {
  //recebe o parâmetro e armazena em um array separado por -
  $data = explode('/', $data);
  //armazena na variavel data os valores do vetor data e concatena /
  $data = $data[2] . '-' . $data[1] . '-' . $data[0];

  //retorna a string da ordem correta, formatada
  return $data;
}

function formata_data_reverso($data) {
  //recebe o parâmetro e armazena em um array separado por -
  $data = explode('-', $data);
  //armazena na variavel data os valores do vetor data e concatena /
  $data = $data[2] . '/' . $data[1] . '/' . $data[0];

  //retorna a string da ordem correta, formatada
  return $data;
}

function verificarLogin($login) {
  global $db;
  if ($db->Query("SELECT * FROM `usuarios` WHERE login = '$login'")) {
    if ($db->RowCount() >= 1) {
      return true;
    } else {
      return false;
    }
  }
}

function verificarEmail($email) {
  global $db;
  if ($db->Query("SELECT * FROM `usuarios` WHERE email = '$email'")) {
    if ($db->RowCount() >= 1) {
      return true;
    } else {
      return false;
    }
  }
}

function invert_data($data){
  $data = explode('-', $data);
  return $data[2].'/'.$data[1].'/'.$data[0];
}

function formata_date_time($data) {
  $dados = explode(' ', $data);
  $data = invert_data($dados[0]);
  $time = $dados[1];
  return $data.' - '.$time;
}

#########FUNÇÃO DE LOGAR##########
$login = new Login();
if (isset($_POST['logar'])) {
  $logar = $login->logar($_POST['username'], $_POST['password']);
} elseif (!isset($_SESSION)) {
  $login->verificar("index.php");
}
if (isset($_GET['logout'])) {
  $login->logout("index.php");
}
if ($_SESSION['logout']) {
  $logar = "Saida Concluida.";
  session_destroy();
}
?>
