<div class="col s6">
	<div class="card-panel light-withe light-2">
		<h4>Usuario</h4>
		<form action="<?=base_url()?>usuarios/addUsuario" method="post">
			<div class="row">
				<div class="input-field col s6">
		        	<input id="nombre" name="nombre"type="text" class="validate">
		       		<label for="nombre">Nombre</label>
		      	</div>
			    <div class="input-field col s6">
			       <input id="correo" type="text" name="correo" class="validate">
			       <label for="correo">Correo</label>
			    </div>
			</div>
			<div class="row">
				<div class="input-field col s6">
		        	<input id="user" type="text" name="user"class="validate">
		       		<label for="usuario">Usuario</label>
		      	</div>
			    <div class="input-field col s6">
			       <input id="pass" type="password" name="pass" class="validate">
			       <label for="pass">Password</label>
			    </div>
			</div>

			<div class="row">
				<div class="input-field col s6">
		        	<label>Nivel</label>
					<select name="tipo">
						<option value="1">Administrador</option>
						<option value="2">Empleado</option>
						<option value="3">Tecnico</option>
					</select>
		      	</div>
		      	<div class="input-field col s6">
		        	<button class="btn waves-effect waves-light  light-blue darken-2" type="submit" >Enviar
					    <i class="mdi-content-send right"></i>
					</button>
		      	</div>
		      	
	      	</form>
	      	<div class="input-field col s12" >
			    <?=validation_errors()?>
			    <span><p class="blue-text"><?=$mensaje?></p></span>	
			</div>
		</div>
	</div>
</div>