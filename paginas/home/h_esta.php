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

<div class="mws-stat-container clearfix">

  <!-- Statistic Item -->
  <a class="mws-stat" href="#">
    <!-- Statistic Icon (edit to change icon) -->
    <span class="mws-stat-icon icol32-user"></span>

    <!-- Statistic Content -->
    <span class="mws-stat-content">
      <span class="mws-stat-title">Usuarios Clube</span>
      <span class="mws-stat-value"><?= esta_usuarios_count; ?></span>
    </span>
  </a>

  <!-- Statistic Item -->
  <a class="mws-stat" href="#">
    <!-- Statistic Icon (edit to change icon) -->
    <span class="mws-stat-icon icol32-newspaper"></span>

    <!-- Statistic Content -->
    <span class="mws-stat-content">
      <span class="mws-stat-title">Total Noticias</span>
      <span class="mws-stat-value"><?= esta_noticias_count; ?></span>
    </span>
  </a>

  <!-- Statistic Item -->
  <a class="mws-stat" href="#">
    <!-- Statistic Icon (edit to change icon) -->
    <span class="mws-stat-icon icol32-orbit"></span>

    <!-- Statistic Content -->
    <span class="mws-stat-content">
      <span class="mws-stat-title">Total de Visitas</span>
      <span class="mws-stat-value"><?= esta_visitas_count; ?></span>
    </span>
  </a>

  <!-- Statistic Item -->
  <a class="mws-stat" href="#">
    <!-- Statistic Icon (edit to change icon) -->
    <span class="mws-stat-icon icol32-events"></span>

    <!-- Statistic Content -->
    <span class="mws-stat-content">
      <span class="mws-stat-title">Total Pedidos</span>
      <span class="mws-stat-value"><?= esta_pedidos_count; ?></span>
    </span>
  </a>

  <!-- Statistic Item -->
  <a class="mws-stat" href="#">
    <!-- Statistic Icon (edit to change icon) -->
    <span class="mws-stat-icon icol32-database-gear"></span>

    <!-- Statistic Content -->
    <span class="mws-stat-content">
      <span class="mws-stat-title">Logs Registados</span>
      <span class="mws-stat-value"><?= esta_logs_count; ?></span>
    </span>
  </a>
</div>