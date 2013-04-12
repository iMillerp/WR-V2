<?php
global $db;
/**
 * Vizualizar Pedido
 */
if ($_REQUEST['atendido']) {
  $idpedido = $_REQUEST['idpedido'];
  if ($db->Query("UPDATE `pedidos` SET `status` = '0' WHERE `id_pedido` = {$idpedido}")) {
    $db->Query("INSERT INTO `registro_de_logs` SET
                `id_usuario` = ".$_SESSION['IdUsuario'].",
                `log_registrado` = 'Pedido N {$idpedido}, atendido.',
                 data = '".date('Y-m-d')."',
                 hora = '".date('H:i:s')."',
                `ip_registrado` = '".$_SERVER["REMOTE_ADDR"]."',
                `login_usuario` = '".$_SESSION['LoginUsuario']."'
             ");
    ?>
    <div class="mws-form-message success">
      Pedido Atendido! Aguarde...
    </div>
    <?php
    exit;
  } else {
    echo "<p>Query Failed</p>";
  }
}
if ($_REQUEST['idpedido']) {
  $idpedido = $_REQUEST['idpedido'];
  if ($db->Query("SELECT * FROM `pedidos` WHERE id_pedido = {$idpedido}")) {
    $verPedido = $db->RecordsArray();
  } else {
    echo "<p>Query Failed</p>";
  }
}
#var_dump($verPedido);
?>
<?php if($verPedido[0]['status'] == '0'){ ?>
<div class="mws-form-message error">
      Este pedido já foi atendido.
    </div>
<?php }else{ ?>
<b>
  Pedido de: <span style="color:#5F9FE0;"><?= $verPedido[0]['nome']; ?> </span><br/>
  Cidade/Estado: <span style="color:#5F9FE0;"><?= $verPedido[0]['cidadeestado']; ?></span>
  <br/><br/>
  Pedido: <div class="mws-inset" style="padding: 5px;color:#5F9FE0;"><?= $verPedido[0]['pedido']; ?>
  </div>
</b>
<?php } ?>
