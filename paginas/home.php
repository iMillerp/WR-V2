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

<!-- Panel Wrapper -->
<div class="mws-panel grid_8 mws-collapsible">
  <!-- Panel Header -->
  <div class="mws-panel-header">
    <a href="javascript: void(0);" class="mws-tooltip-s" original-title="Atualizar" onclick="load_wr('?paginas=h_esta&local=paginas/home', 'esta', 'GET');"><div class="mws-inset icol-arrow-refresh" style="float: left; margin-top: 5px; margin-right: 5px;"></div></a>
    <span>
      Estatísticas
    </span>
  </div>
  <!-- Panel Body -->
  <div class="mws-panel-body no-padding" id="esta">

  </div>

</div>
<div class="mws-panel grid_8 mws-collapsible">
  <!-- Panel Header -->
  <div class="mws-panel-header">
    <span>Painel de Pedidos </span>
  </div>
  <div class="mws-panel-toolbar">
    <div class="btn-toolbar">
      <div class="btn-group">
        <a href="javascript: void(0);" class="btn" onclick="load_wr('?paginas=h_pedidos&local=paginas/home&ativarpainel=1', 'pedidos', 'GET');reloadPedidos();"><i class="icol-accept"></i>Ativar</a>
        <a href="javascript: void(0);" class="btn" onclick="load_wr('?paginas=h_pedidos&local=paginas/home&desativarpainel=1', 'pedidos', 'GET');reloadPedidos();"><i class="icol-cross"></i>Desativar</a>
        <a href="javascript: void(0);" class="btn" onclick="load_wr('?paginas=h_pedidos&local=paginas/home&limparpainel=1', 'pedidos', 'GET');reloadPedidos();"><i class="icol-delete"></i>Limpar Painel</a>
        <a href="javascript: void(0);" class="btn" onclick="load_wr('?paginas=h_pedidos&local=paginas/home', 'pedidos', 'GET');"><i class="icol-arrow-refresh"></i>Atualizar</a>
      </div>
    </div>
  </div>
  <!-- Panel Body -->
  <div class="mws-panel-body no-padding" id="pedidos">

  </div>
</div>

<div class="mws-panel grid_8 mws-collapsible">
  <!-- Panel Header -->
  <div class="mws-panel-header">
    <span>Ultimos Logs Registrados</span>
  </div>
  <!-- Panel Body -->
  <div class="mws-panel-body no-padding" id="ultimoslogs">

  </div>
</div>
<div class="mws-panel grid_8 mws-collapsible">
  <!-- Panel Header -->
  <div class="mws-panel-header">
    <a href="javascript: void(0);" class="mws-tooltip-s" original-title="Atualizar" onclick="load_wr('?paginas=h_users_on_panel&local=paginas/home', 'onlinepanel', 'GET');"><div class="mws-inset icol-arrow-refresh" style="float: left; margin-top: 5px; margin-right: 5px;"></div></a>
    <span>
      Usuarios Online
    </span>
  </div>
  <!-- Panel Body -->
  <div class="mws-panel-body no-padding" id="onlinepanel">

  </div>
</div>