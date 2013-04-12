<?php
/**
 * WR-Panel
 *
 * @version 1.0.18
 * @author Miller P. Magalhães
 * @link http://www.millerdev.com.br
 *
 */
global $db;
if (isset($_POST['submit'])) {
  $loginr = verificarLogin($_POST['login']);
  $emailr = verificarEmail($_POST['email']);
  if ($loginr == false) {
    if ($emailr == false) {
      $data = formata_data($_POST['datanascimento']);
      $query = "INSERT INTO `usuarios` (`login` ,`senha` ,`nome` ,`apelido` ,`email` ,`cargo` ,`datanascimento` ,`telefone` ,`twitter` ,`skype` ,`facebook` ,`status` ,`foto` ,`alteracao` ,`ultima_visita` ,`ip_usuario` ,`acesso` ,`ultima_pagina`)
             VALUES ('" . $_POST['login'] . "','" . $_POST['password'] . "','" . $_POST['nome'] . "','" . $_POST['apelido'] . "','" . $_POST['email'] . "'," . $_POST['cargo'] . ",'" . $data . "','" . $_POST['telefone'] . "','" . $_POST['twitter'] . "','" . $_POST['skype'] . "','" . $_POST['facebook'] . "',1,'" . $_POST['foto'] . "','1','1','127.0.0.1','0','/')";
      if ($db->Query($query)) {

      } else {
        echo "<p>Query Failed</p>";
        exit;
      }
      echo '<div class="mws-form-message success">Cadastro Realizado com Sucesso.<br/>Login: ' . $_POST['login'] . '<br/> Senha: ' . $_POST['password'] . '</div>';
      exit;
    } else {
      echo '<div class="mws-form-message error">Falha ao realizar o cadastro <br/>O Email: ' . $_POST['login'] . ' já existe no banco de dados.</div>';
      exit;
    }
  } else {
    echo '<div class="mws-form-message error">Falha ao realizar o cadastro <br/>O Login: ' . $_POST['login'] . ' já existe no banco de dados.</div>';
    exit;
  }
}
?>
<div class="mws-panel grid_4 mws-collapsible"  id="cadastroUsuariosClube">
  <!-- Panel Header -->
  <div class="mws-panel-header">
    <span>
      Usuarios Clube - Cadastrar
    </span>
    <div class="mws-collapse-button mws-inset"><span></span>
    </div>
  </div>
  <!-- Panel Body -->
  <div class="mws-panel-body no-padding">
    <form id="mws-validate" class="mws-form" method="post" action="?paginas=users_cadastrar&local=paginas/usuarios">
      <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
      <div class="mws-form-inline">
        <div class="mws-form-row">
          <label class="mws-form-label">Login:</label>
          <div class="mws-form-item large">
            <input type="text" name="login" class="mws-textinput required" />
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Senha:</label>
          <div class="mws-form-item large">
            <input type="password" name="password" class="mws-textinput required password" />
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Nome:</label>
          <div class="mws-form-item large">
            <input type="text" name="nome" class="mws-textinput required" />
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Apelido:</label>
          <div class="mws-form-item large">
            <input type="text" name="apelido" class="mws-textinput required" />
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Email:</label>
          <div class="mws-form-item large">
            <input type="text" name="email" class="mws-textinput required email" />
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Foto:</label>
          <div class="mws-form-item large">
            <input type="text" name="foto" placeholder="Link da Imagem" maxlength="550" class="mws-textinput required url" />
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Cargo:</label>
          <div class="mws-form-item small">
            <select name="cargo" class="required">
              <option value="0">Usuario Normal</option>
              <option value="1">Locutor</option>
              <option value="2">DJ</option>
              <option value="3">Administrador</option>
            </select>
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Data de Nascimento:</label>
          <div class="mws-form-item large">
            <input type="text" name="datanascimento" placeholder="Formato(00/00/0000)" class="mws-textinput required date" />
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Telefone:</label>
          <div class="mws-form-item small">
            <input type="text" name="telefone" placeholder="Somente numeros" class="mws-textinput digits" />
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Twitter:</label>
          <div class="mws-form-item large">
            <input type="text" name="twitter" placeholder="Ex:http://twitter.com/meunome" class="mws-textinput url" />
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Skype:</label>
          <div class="mws-form-item small">
            <input type="text" name="skype" class="mws-textinput" />
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">Facebook:</label>
          <div class="mws-form-item large">
            <input type="text" name="facebook" placeholder="Ex:http://facebook.com/meunome" class="mws-textinput url" />
          </div>
        </div>

        <div class="mws-button-row">
          <input type="submit" value="Cadastrar" id="CadastrarUsers" name="submit" class="btn btn-primary" />
        </div>
        <div class="mws-form-message info" style="display: none;" id="processando">
          Aguarde enquanto o cadastro é realizado.
        </div>
      </div>
    </form>
  </div>
</div>
<div class="mws-panel grid_4 mws-collapsible" id="resutado" style="display:none;">
  <!-- Panel Header -->
  <div class="mws-panel-header">
    <span>
      Usuarios Clube - Cadastrar - Resultado
    </span>
    <div class="mws-collapse-button mws-inset"><span></span>
    </div>
  </div>
  <!-- Panel Body -->
  <div class="mws-panel-body no-padding" id="teste">

  </div>
</div>