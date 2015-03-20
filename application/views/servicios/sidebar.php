<div class="col s8">
		<div class="card-panel light-withe light-2">
			<div class="row">
				<form method="post" action="<?=base_url()?>servicios/buscartitulo">
			    <div class="input-field col s12">
				     <i class="mdi-action-search prefix"></i>
				     <input id="icon_prefix" type="text" name="titulo"class="validate">
				     <label for="icon_prefix">Titulo</label>
				</div>
				</form>
	     	</div>
		</div>
	</div>
<div class="col s8">
	<div id="panelServicio" class="card-panel light-withe light-2" data-ruta="<?=base_url()?>servicios/getServicio">
		<h4>Lista</h4>
		<table class="bordered">
			<thead>
				<th>Titulo</th>
				<th>Contenido</th>
				<th>Tipo</th>
				<th>Imagen</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				<?php foreach($query->result() as $row){?>
					<tr>
						<td>
							<?=$row->titulo?>
						</td>
						<td>
							<?=$row->contenido?>
						</td>
						<td>
							<?php if($row->slider==1) echo 'Slider'; else echo 'Servicio';?>
						</td>
						<td>
							   
						        <div class="card z-depth-2" style="width:100px;height:70px;">
						             <img style="width:100%;max-height:100%;" src="<?=base_url()?>uploads/<?=$row->imagen?>">
						        </div>
						</td>
						<td>
							<a class='dropdown-button btn' href='#' data-activates='dropdown2' style="padding:0 15px;margin:5px"><i class="mdi-action-view-headline"></i></a>
							<!-- Dropdown Structure -->
							<ul id='dropdown2' class='dropdown-content'>
							    <li class="edit-servicio" data-id="<?=$row->id?>"><a href="#!">Editar</a></li>
							    <li>
							    	<form method="post" action="<?=base_url()?>servicios/eliminarServicio">
							    		<input type="hidden" name="id" value="<?=$row->id?>"?>
							    		<button class="btn waves-effect waves-light  pink accent-3"><i class="mdi-navigation-cancel"></i></button>
							    	</form>
							    </li>
							</ul>
						</td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div><!-- fin -->
<script src="<?=base_url()?>js/sidebar-servicio.js"></script>