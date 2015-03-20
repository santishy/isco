<div class="detailPro">
	<div class="imagenPro">
		<figure>
			<img src="" alt="">
		</figure>
		<ul>
			<?php foreach ($imagenes->result() as $img) { ?>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<?php } ?>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			<li><img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt=""></li>
			
		</ul>
	</div>
	<div class="prodName">
		<?php foreach ($product->result() as $p) { ?>
			<h1><?=$p->nombreprod?></h1>
			<p><?=$p->descripcion?></p>
			<p>Precio $ <span><?=$p->precio?></span></p>
		<?php } ?>
	</div>
</div>

<span>hola</span>