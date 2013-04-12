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
<div id="mws-header" class="clearfix">
  <!-- Logo Wrapper -->
  <div id="mws-logo-container">
    <div id="mws-logo-wrap">
      <img src="images/temp/logo.png" alt="mws admin" />
    </div>
  </div>

  <!-- User Area Wrapper -->
  <div id="mws-user-tools" class="clearfix">
    <!-- User Messages -->
    <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>

                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>

                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>

    <!-- User Functions -->
    <div id="mws-user-info" class="mws-inset">
      <div id="mws-user-photo">
        <img src="<?=$_SESSION['ImagemUsuario'];?>" alt="Minha Foto" />
      </div>
      <div id="mws-user-functions">
        <div id="mws-username">
          Olá, <?=$_SESSION['NomeUsuario']?>, Seja Bem Vindo ao WR-Panel v1.0
        </div>
        <ul>
          <li><a href="javascript: void(0);" id="UserInfos" onclick="editarUsuarioDialog('<?=$_SESSION['LoginUsuario'];?>','editar')">Perfil</a></li>
          <li><a href="#">Trocar Senha</a></li>
          <li><a href="?logout=1">Sair</a></li>
        </ul>
      </div>
    </div>
    <!-- End User Funtions -->
  </div>
</div>