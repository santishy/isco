<div class="col s6">
	<div class="card-panel light-withe light-2">
		<div class="row">
			<form method="post" action="<?=base_url()?>usuarios/buscarUser">
			   <div class="input-field col s12">
				    <i class="mdi-action-search prefix"></i>
				    <input id="icon_prefix" type="text" name="titulo"class="validate">
				    <label for="icon_prefix">Titulo</label>
				</div>
			</form>
	    </div>
	</div>
</div>
<div class="col s6">
	<div id="panelUsuarios" class="card-panel light-withe light-2" data-ruta="<?=base_url()?>servicios/getLastUsers">
		<h4>Lista</h4>
		<table class="bordered">
			<thead>
				<th>Nombre</th>
				<th>Usuario</th>
				<th>Email</th>
				<th>Tipo</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				<?php foreach($query->result() as $row)
				{?>	
					<tr>
						<td><?=$row->nombre?></td>
						<td><?=$row->user?></td>
						<td><?=$row->correo?></td>
						<td><?php switch ($row->tipo) {
							case '1':
								echo 'ADMINISTRADOR';
								break;
							case '2':
								echo 'EMPLEADO';
								break;
							case '3':
								echo 'TECNICO';
								break;
							default:
								# code...
								break;
						}?></td>
						<td>
							<a class='dropdown-button btn' href='#' data-activates='dropdown3' style="padding:0 15px;margin:5px"><i class="mdi-action-view-headline"></i></a>
							<!-- Dropdown Structure -->
							<ul id='dropdown3' class='dropdown-content'>
							    <li class="edit-usuario" data-id="<?=$row->id_user?>"><a href="#!">Editar</a></li>
							    <li>
							    	<form method="post" action="<?=base_url()?>usuarios/eliminarUser">
							    		<input type="hidden" name="id_user" value="<?=$row->id_user?>"?>
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
</div>