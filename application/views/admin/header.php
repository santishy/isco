<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/materialize.min.css" media="screen,projection">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<script  src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="<?=base_url()?>js/materialize.min.js"></script>
	<title>APP</title>
</head>
<body>
	<ul id="dropdown1" class="dropdown-content ">
		  <li><a href="#!">Salir</a></li>
		</ul>
		<nav>
		  <div class="nav-wrapper blue darken-1">
		    <div class="col s12">
		      <a href="<?=base_url()?>admin" class="brand-logo">Administrador de contenidos</a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="<?=base_url()?>servicios/addServicio">Servicios y Sliders</a></li>
		        <li><a href="components.html">Usuarios</a></li>
		        <!-- Dropdown Trigger -->
		        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Opciones<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
	<div id="rutascript" class="row" data-ruta="<?=base_url()?>js/functions.js">
		<!-- Dropdown Structure -->
		