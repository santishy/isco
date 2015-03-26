<div class="detailPro">
	<div class="imagenPro">
	<?php foreach ($imagenes->result() as $img) { ?>
		<div  class="containerImg" id="zoom_01" data-zoom-image="<?=base_url()?>uploads/<?=$img->ruta?>">
			
		</div>
	<?php break; } ?>	
		<ul>
			<?php foreach ($imagenes->result() as $img) { ?>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt="" class="imagen" data-imagen="<?=base_url()?>uploads/<?=$img->ruta?>" /></li>
			<?php } ?>
		</ul>
	</div>
	<div class="prodName">
		<?php foreach ($product->result() as $p) { ?>
			<h1><?=$p->nombreprod?></h1>
			<p><?=$p->descripcion?></p>
			<p>Precio $ <span><?=$p->precio?></span></p>
		<?php } ?>
	</div>
	<div class="divDatos">
		<table>
			<thead>
				<tr>
					<th colspan="2" class="carac">Características</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($carac->result() as $c) { ?>
					<tr>
						<td><strong><?=$c->etiqueta_c?></strong></td>
						<td><?=$c->caracteristica?></td>
					</tr>
				<?php } ?>
			</tbody>
			<thead>	
				<tr>
					<th colspan="2" class="espe">
						Especificaciones
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($espe->result() as $e) { ?>
					<tr>
						<td><strong><?=$e->etiqueta_e?></strong></td>
						<td><?=$e->especificacion?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="relacionados">
		<section class="destacados">
			<div class="title">
				<p>Articulos relacionados</p>
			</div>
			<div class="products">
				<?php foreach ($relacionados->result() as $rel) { ?>
					<div class="boxProduct">
						<a href="<?=base_url()?>productos/<?=$rel->id_producto?>">
							<figure class="imagen">
								<img src="<?=base_url()?>uploads/<?=$rel->imagen?>" alt="">
								<figcaption><?=$rel->nombreprod?></figcaption>
							</figure>
						</a>
						<!--<div><?=$offer->des?></div>-->
					</div>
				<?php } ?>
			</div>
		</section> 
	</div>
	</div>
</div>
