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
<body class="cyan darken-1">
	<div class="row" >
	<div class="col s4 offset-s4">
		<div class="card-panel   light-2">
			<h4 style="text-align:center">Ingresar</h4>
			<div class="divider"></div>
			<form action="<?=base_url()?>usuarios/login" method="post">
				<div class="row">
					<div class="input-field col s12">
			        	<input id="user" type="text" name="user"class="validate cyan lighten-5">
			       		<label for="usuario">Usuario</label>
			      	</div>
				    <div class="input-field col s12">
				       <input id="pass" type="password" name="pass" class="validate cyan lighten-5">
				       <label for="pass">Password</label>
				    </div>
				</div>
				<div class="row">
					<button class="btn waves-effect waves-light  light-blue darken-2" type="submit" >Enviar
					    <i class="mdi-content-send right"></i>
					</button>
				    <div class="input-field col s12" <?php if(strlen(validation_errors())==0 and strlen($mensaje)==0) echo 'style="display:none"';?>>
				       <?=validation_errors()?>
				       <span><p class="blue-text"><?=$mensaje?></p></span>	
				    </div>
				</div>
			</form>
		</div>
	</div>
	</div>
</body>
</html>