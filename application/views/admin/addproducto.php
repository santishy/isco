	<div class="col s4">
		<div class="card-panel light-withe light-2">
			<div class="row">
				<h4>Producto</h4>
				<form id="frmProducto" method="post" action="<?=base_url()?>admin/addProducto">
				<div class="input-field col s10 " id="containerSelect" data-ruta="<?=base_url()?>js/functions.js">
				  	<label>Categoria</label>
					<select name="id_categoria" id="id_categoria">
						<?php foreach ($query->result() as $row) 
						{?>
							<option value="<?=$row->id_categoria?>"><?=$row->nombre?></option>
						<?php }?>
					</select>
				</div>
				<div class="input-field col s2 ">
					<a id="categorias" class="btn-floating btn-large waves-effect waves-light  teal"><i class="mdi-content-add"></i></a>
				</div>
				<div class="input-field col s12 ">
					<input id="nombreprod" name="nombreprod" type="text" class="validate ">
        			<label for="nombreprod">Nombre del Producto</label>	
				</div>
				<div class="input-field col s12 ">
					<input id="precio" type="text" name="precio" pattern="[-+]?(?:\b[0-9]+(?:\.[0-9]*)?|\.[0-9]+\b)(?:[eE][-+]?[0-9]+\b)?"  class="validate ">
        			<label for="precio">Precio</label>	
				</div>
				<div class="input-field col s12 ">
					<div class="file-field input-field">
				      <input class="file-path validate" type="text"/>
				      <div class="btn rutaImagen" data-ruta="<?=base_url()?>admin/addImg">
				        <span>Imagen</span>
				        <input type="file" id="fileImagen" name="fileImagen"/>
				       	<input type="hidden" name="rutaImagen" id="rutaImagen">
				       	<input type="hidden" name="id_producto" id="id_producto">
				      </div>
				    </div>
				</div>
				<div class="input-field col s12">
					<div  class="progress">
					    <div class="determinate" id="barraProgress" ></div>
					</div>
				</div>
				<div class="input-field col s3">
					<label>Destacable</label>
				</div>
				<div class="input-field col s9">
				 <div class="switch">
				    <label>
				      No
				      <input type="checkbox" id="destacado" name="destacado" value="1">
				      <span class="lever"></span>
				      Si
				    </label>
				  </div>
				</div>
				<div class="input-field col s3">
					<label>Oferta</label>
				</div>
				<div class="input-field col s9">
				 <div class="switch">
				    <label>
				      No
				      <input type="checkbox" id="oferta" name="oferta" value="1">
				      <span class="lever"></span>
				      Si
				    </label>
				  </div>
				</div>
				<div class="input-field col s12" style="margin-top:40px">
				    <textarea id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
				    <label for="textarea1">Descripcion</label>
				</div>
				<button class="btn waves-effect waves-light  light-blue darken-2" type="submit" >Enviar
				    <i class="mdi-content-send right"></i>
				</button>
				<div class="input-field col s12" style="margin-top:40px">
				    <?=validation_errors()?>
				    <span><p class="blue-text"><?=$mensaje?></p></span>	
				</div>
			</div>
			</form>
		</div>
	</div>
<?php $this->load->view('modales/modalcategoria')?><!--Ventana modal de agregar categoria-->
<script>
	$(document).on('ready',function()
	{
		var rutascript=$("#containerSelect").data('ruta');
		$("#modalCategorias").leanModal({opacity:.1});
		var addCategory=$("#addCategory");
		addCategory.on('click',addCategoryAjax)
		$("#categorias").on('click',function()
		{
			$("#nombreCategoria").val("");
			$("#nombreCategoria").attr('disabled',false);
			$("#modalCategorias").openModal();
		});
		$("#fileImagen").on('change',function(e){
		$.getScript(rutascript,function()
		{
			subirImagen(e);
		});	
	});
	function addCategoryAjax()
	{
		var ruta = $('#modalCategorias').data('ruta');
		var pnombre=$("#nombreCategoria");
		$.ajax({
			url:ruta,
			beforeSend:function()
			{
				//pnombre.attr('disabled','disabled');
			},
			type:'post',
			dataType:'json',
			data:{nombre:pnombre.val()},		
			success:function(resp){
				if(!jQuery.isEmptyObject(resp))
				{
					if(resp.ban)
					{
						$("#id_categoria").removeClass('initialized');
						$('#id_categoria').append($('<option value="'+resp.id_categoria+'">'+resp.nombre+'</option>'));
						$.getScript(rutascript,function()
							{
								clonCategory();
							})
						$("#modalCategorias").closeModal();	
					}
					else 
						alert('Ya existe esa categoria');
					
				}
				else 
					alert("No se pudo insertar");
			},
			complete:function(){
				//pnombre.attr('disabled','enabled')
			},
			error:function(error,xhr,estado){
				alert(error+" "+xhr+" "+estado);
			}
		});
	}
	//parte del sidebar
	$('.edit').on('click',function(){
		id=$(this).data('id');
		$("#frmProducto").get(0).reset();
		$.getScript(rutascript,function()
		{
			getProducto(id);
		});

	})
	});
</script>