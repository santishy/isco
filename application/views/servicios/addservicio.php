<div class="col s4">
	<div class="card-panel light-withe light-2">
		<h4>Servicios</h4>
		<div class="divider"></div>
		<form method="post" action="<?=base_url()?>servicios/addServicio">
			<div class="input-field col s12 ">
				<input id="titulo" name="titulo" type="text" class="validate">
        		<label for="nombreprod">Titulo</label>	
			</div>
			<div class="input-field col s3">
				<label>Slider</label>
			</div>
			<div class="input-field col s9">
				<div class="switch">
				    <label>
				    	No
					    <input type="checkbox" id="slider" name="slider" value="1">
					    <span class="lever"></span>
					    Si
					</label>
				</div>
			</div>
			<div class="input-field col s12" style="margin-top:40px">
			    <textarea id="contenido" name="contenido" rows="5" class="materialize-textarea"></textarea>
			    <label for="textarea1">Contenido</label>
			</div>
			<div class="input-field col s12 ">
				<div class="file-field input-field">
				    <input class="file-path validate" type="text"/>
				    <div class="btn rutaImagen" data-ruta="<?=base_url()?>admin/addImg">
				        <span>Imagen</span>
				        <input type="file" id="fileImagen" name="fileImagen"/>
				       	<input type="hidden" name="imagen" id="rutaImagen">
				       	<!--input type="hidden" name="id" id="id_producto"-->
				       	<input type="hidden" name="id" id="id">
				    </div>
			    </div>
			</div>
			<div class="input-field col s12">
				<div  class="progress">
				    <div class="determinate" id="barraProgress" ></div>
				</div>
			</div>
			<button class="btn waves-effect waves-light  light-blue darken-2" type="submit" >Enviar
				<i class="mdi-content-send right"></i>
			</button>
			<div class="input-field col s12" style="margin-top:40px">
			    <?=validation_errors()?>
			    <span><p class="blue-text"><?=$mensaje?></p></span>	
			</div>
		</form>
	</div><!--panel add servicio-->
</div><!-- s4 rejilla -->
<script src="<?=base_url()?>js/addservicio.js"></script>