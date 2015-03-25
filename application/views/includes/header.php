<!DOCTYPE html>
<htm lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1" />
	<title>isco</title>

	<!-- styles -->
	<link href='http://fonts.googleapis.com/css?family=Jura:500' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Coda' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>css/normalize.css" />
	<link rel="stylesheet" href="<?=base_url()?>css/style.css" />
	<link rel="stylesheet" href="<?=base_url()?>css/jquery.bxslider.css" />
	
	<!--Start of Zopim Live Chat Script-->
	<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
	$.src='//v2.zopim.com/?2qYv7nAbMFT61tuAZG2OLwYGlu7hyi0g';z.t=+new Date;$.
	type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
	</script>
<!--End of Zopim Live Chat Script-->

</head>
<body>
	<header>
		<div class="logoResp">
			<figure>
				<a href="<?=base_url()?>"><img src="<?=base_url()?>img/logo_isco1.png" alt="" /></a>
			</figure>
		</div>
		<div class="follow">
			<div class="contact">
				<strong>01 353 532 7373 y 01 353 532 5500	</strong>
			</div>
			<!--<div class="social">
				<a href="#"><img src="<?=base_url()?>img/face2.png" title="nuestra página en facebook" alt="facebook" /></a>
				<a href="#"><img src="<?=base_url()?>img/twi.png" title="siguenos en twitter" alt="twitter" /></a>
			</div>-->
			<div class="search">
				<form action="<?=base_url()?>inicio/busqueda" method="post">
					<input type="search" name="txtpattern" class="txtSearch" placeholder="Búsqueda" required />
					<input type="submit" value="">
				</form>
			</div>
		</div>
		
	</header>	
	<div class="headerNav">
		<div class="logo">
			<figure>
				<a href="<?=base_url()?>"><img src="<?=base_url()?>img/logo_isco1.png" alt="" /></a>
			</figure>
		</div>
		<nav>
			<ul class="menu">
				<li><a href="<?=base_url()?>">INICIO</a></li>
				<li><a href="#">QUIENES SOMOS</a></li>
				<li><a href="#">SERVICIOS</a>
					<ul>
						<?php foreach ($servicios->result() as $serv) { ?>
						<?php $url = strtolower($serv->titulo); $url = str_replace(" ", "-", $url); ?>
						<li><a href="<?=base_url()?>anuncios/<?=$url?>/<?=$serv->id?>"><?= $serv->titulo ?></a></li>
						<?php } ?>
					</ul>
				</li>
				<li><a href="">PRODUCTOS</a>
					<ul>
						<?php foreach ($categorias->result() as $cat) { ?>
						<li><a href="<?=base_url()?>categoria/<?=$cat->id_categoria?>"><?= $cat->nombre ?></a></li>
						<?php } ?>
					</ul>
				</li>
				<li><a href="<?=base_url()?>contacto">CONTACTO</a></li>
			</ul>
		</nav>
	</div>
	<nav class="navResp"></nav>
	


