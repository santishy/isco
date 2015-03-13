<div class="col s8">
	<div class="col s6">
		
	</div>
	<div class="card-panel light-withe light-2">
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
							    <li class="edit" data-id="<?=$row->id?>"><a href="#!">Editar</a></li>
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