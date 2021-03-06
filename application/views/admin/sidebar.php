<div class="col s4">
	<div class="card-panel light-withe light-2">
		<div class="row">
			<form method="post" action="<?=base_url()?>admin/buscarProducto">
		    <div class="input-field col s12">
			     <i class="mdi-action-search prefix"></i>
			     <input id="icon_prefix" type="text" name="nombreprod"class="validate">
			     <label for="icon_prefix">Nombre del Producto.</label>
			</div>
			</form>
     	</div>
	</div>
	<div id="productos" class="card-panel light-withe light-2" data-ruta="<?=base_url()?>admin/getProducto">
		<table class="bordered">
			<thead>
				<th>Opciones</th>
				<th>Nombre</th>
				<th>Descripcion</th>
			</thead>
			<tbody>
				<?php foreach ($caracteristicas->result() as $row) {?>
				<tr>
					<td>
						<a class='dropdown-button btn' href='#' data-activates='dropdown4' style="padding:0 15px;margin:5px"><i class="mdi-action-view-headline"></i></a>
						<!-- Dropdown Structure -->
						<ul id='dropdown4' class='dropdown-content'>
						    <li class="edit" data-id="<?=$row->id_producto?>"><a href="#!">Editar</a></li>
						    <li class="edit" data-id="<?=$row->id_producto?>">
						    	<a href="#!">
						    		<form method="post" action="<?=base_url()?>admin/eliminarProducto">
						    			<input type="hidden"name="id_producto" value="<?=$row->id_producto?>"/>
						    			<button class="btn waves-effect waves-light red accent-3" ><i class="mdi-navigation-cancel"></i></button>
						    		</form>
						    	</a>
							</li>
						</ul>
					</td>
					<td>
						<?=$row->nombreprod?>
					</td>
					<td>
						<?=$row->descripcion?>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>