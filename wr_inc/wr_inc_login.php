<div id="mws-login-wrapper">
  <div id="mws-login">
    <h1>Login - WR-Panel v1.0</h1>
    <div class="mws-login-lock"><i class="icon-lock"></i></div>
    <div id="mws-login-form">
      <form class="mws-form" action="" method="post">
        <div class="mws-form-row">
          <div class="mws-form-item large">
            <input type="text" class="mws-login-username mws-textinput" name="username" placeholder="Usuario" />
          </div>
        </div>
        <div class="mws-form-row">
          <div class="mws-form-item large">
            <input type="password" class="mws-login-password mws-textinput" name="password" placeholder="Senha" />
          </div>
        </div>
        <div class="mws-form-row">
          <input type="submit" value="Logar" class="btn btn-success mws-login-button" name="logar" />
        </div>
      </form>
      <?php if ($logar) { ?>
        <div class="mws-form-message warning" style="-webkit-border-radius:4px;	-moz-border-radius:4px;	-o-border-radius:4px; -khtml-border-radius:4px;	border-radius:4px;">
          <p><?= $logar; ?></p>
        </div>
      <?php } ?>
    </div>
  </div>

</div>