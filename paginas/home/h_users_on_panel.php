<?php
/**
 * WR-Panel
 *
 * @version 1.0.18
 * @author Miller P. Magalhães
 * @link http://www.millerdev.com.br
 *
 */
global $usersOnline;
?>
<table class="mws-table mws-datatable-fn" id="tabelaUsersPanel">
  <thead>
    <tr>
      <th>Login</th>
      <th>IP</th>
      <th>Ultima Página Visitada</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($usersOnline as $row) {
      ?>
    <tr>
      <td><a href="#"><?=$row['login'];?></a></td>
      <td><?=$row['ip_usuario'];?></td>
      <td><?=$row['ultima_pagina'];?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>