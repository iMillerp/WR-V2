<?php
/**
 * WR-Panel
 *
 * @version 1.0.18
 * @author Miller P. Magalhães
 * @link http://www.millerdev.com.br
 *
 */
?>
  <div id="vizualizarDadosUsuario">
    <div id="vizualizarDadosUsuarioForm">

    </div>
  </div>
<div id="mws-footer">
  Copyright WR-Panel v<?=version;?> - <?= date('Y') ?>. All Rights Reserved. Powered by <a href="javascript: void(0);" class="link" onclick="CopyRight();" style="color:#CC0000; text-shadow: 0 0 8px #CC0000;" id="mws-jui-dialog-mdl-btn">iMillerp</a>
  <div id="mws-jui-dialog">
    <div class="mws-form-message info">
      <h6>Infos Painel:</h6>
      Developer: <b>iMillerp (Miller Pereira)</b><br/>
      Versão: <b><?=version;?></b><br/>
      Contato: <b>miller.98@hotmail.com</b><br/>
      Skype: <b>millerpx</b></div>
    <div class="mws-form-message success">
      <h6>Infos Licença:</h6>
      Tipo: <b>Premium</b><br/>
      Serial: <b><?=serial;?></b><br/>
      Validade: <b><?=formata_date_time(valid);?></b><br/>
      Dominio Liberado: <b><?=dominio;?></b><br/>
      Proprietario: <b><?=proprietario;?></b>
    </div>
  </div>
</div>