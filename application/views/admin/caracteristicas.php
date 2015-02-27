<div class="col s4">
	<div class="card-panel light-withe light-2">
		<div class="row">
			<h4>Caracteristicas</h4>
			<form id="frmCaracteristicas" name="frmCaracteristicas" action="<?=base_url()?>js/functions.js">
				<div id="rutaCaracteristicas"class="input-field col s12 " data-addcaracteristica="<?=base_url()?>admin/addCaracteristica">
					<input id="etiqueta_c" name="etiqueta_c" type="text" class="validate " <?php if(strlen($id_producto)==0) echo 'disabled'; else echo 'enabled';?>>
					<input type="hidden" name="id_producto" id="id_producto_c" value="<?=$id_producto?>">
        			<label for="etiqueta_c">Etiqueta</label>	
				</div>
				<div class="input-field col s12 ">
					<input id="caracteristica" name="caracteristica" type="text" class="validate "  <?php if(strlen($id_producto)==0) echo 'disabled'; else echo 'enabled';?>>
        			<label for="caracteristica">Nombre del Producto</label>	
				</div>
				<div class="input-field col s8 ">
					<button id="btn_addCaracteristica"class="btn waves-effect waves-light  light-blue darken-2" type="button" >Enviar
					    <i class="mdi-content-send right"></i>
					</button>
				</div>
				<div class="input-field col s4 ">
					<a id="modalCaracteristicas"class="btn-floating btn-large waves-effect waves-light red"><i class="mdi-action-open-in-new"></i></a>
				</div>
			</form>
		</div>
	</div><!--fin del panel caracteristicas-->
	<div class="card-panel light-withe light-2">
		<div class="row">
			<h4>Especificaciones</h4>
			<form>
				<div class="input-field col s12 ">
					<input id="etiqueta_e" name="etiqueta_e" type="text" class="validate "  <?php if(strlen($id_producto)==0) echo 'disabled'; else echo 'enabled';?>>
					<input type="hidden" name="id_producto" id="id_producto_e">
        			<label for="etiqueta_e">Etiqueta</label>	
				</div>
				<div class="input-field col s12 ">
					<input id="especificacion" name="especificacion" type="text" class="validate "  <?php if(strlen($id_producto)==0) echo 'disabled'; else echo 'enabled';?>>
        			<label for="especificacion">Especificacion</label>	
				</div>
				<div class="input-field col s8 ">
					<button class="btn waves-effect waves-light  light-blue darken-2" type="button" >Enviar
					    <i class="mdi-content-send right"></i>
					</button>
				</div>
				<div class="input-field col s4 ">
					<a class="btn-floating btn-large waves-effect waves-light red"><i class="mdi-action-open-in-new"></i></a>
				</div>
			</form>
		</div>
	</div><!--fin del panel caracteristicas-->
</div><!--div principal-->
<script src="<?=base_url()?>js/caracteristicas.js"></script>