<?php
/**
 * WR-Panel
 *
 * @version 1.0.18
 * @author Miller P. Magalhães
 * @link http://www.millerdev.com.br
 *
 */
global $usuarios;
?>
<div class="mws-panel grid_8 mws-collapsible">
  <!-- Panel Header -->
  <div class="mws-panel-header">
    <span>
      Usuarios Clube - Todos
    </span>
    <div class="mws-collapse-button mws-inset"><span></span>
    </div>
  </div>
  <!-- Panel Body -->
  <div class="mws-panel-body no-padding">
    <table class="mws-table mws-datatable-fn" id="tabelapedidos">
      <thead>
        <tr>
          <th>#ID Usuario</th>
          <th>Nome</th>
          <th>Login</th>
          <th>Status</th>
          <th>Ultimo IP</th>
          <th>Cargo</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($usuarios as $row) {
          ?>
          <tr>
            <td><?= $row['id_usuario']; ?></td>
            <td><?= $row['nome']; ?></td>
            <td><?= $row['login']; ?></td>
            <td><?= $row['status']; ?></td>
            <td><?= $row['ip_usuario']; ?></td>
            <td><?= $row['cargo']; ?></td>
            <td>
        <center>
          <div class="btn-group">
            <a href="javascript: void(0);" class="btn btn-primary btn-small" id="mws-jui-dialog-btn-teste" onclick="editarUsuarioDialog('<?= $row['login']; ?>','editar')"><i class="icol-pencil"></i> Editar</a>
            <a href="javascript: void(0);" class="btn btn-danger btn-small" id="mws-jui-dialog-btn-teste" onclick="editarUsuarioDialog('<?= $row['login']; ?>','excluir')"><i class="icol-delete"></i> Excluir</a>
          </div>
        </center>
        </td>
        </tr>
      <?php }
      ?>
      </tbody>
    </table>
  </div>
</div>