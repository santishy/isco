	<!-- start sliderContainer -->
	<div class="sliderContainer">
		<ul class="bxslider">
			<?php if($sliders->num_rows() > 0) foreach ($sliders->result() as $slide) {?>
				<?php $url = strtolower($slide->titulo); $url = str_replace(" ", "-", $url); ?>
				<li><a href="<?=base_url()?>anuncios/<?=$url?>/<?=$slide->id?>"><img src="<?=base_url()?>uploads/<?=$slide->imagen?>" alt="" /></a></li>
			<?php } else {?>
			<li><a href="#"><img src="<?=base_url()?>img/2.jpg" alt=""></a></li>
			<?php } ?>
		</ul>
	</div>
	<!-- end SliderContainer-->
	<!-- start ofertas -->
	<div class="productsPrincipal">
		<section class="ofertas">
			<div class="title">
				<p>Ofertas</p>
			</div>
			<div class="products">
				<?php foreach ($ofertas->result() as $offer) { ?>
					<div class="boxProduct">
						<a href="<?=base_url()?>productos/<?=$offer->id_producto?>">
							<figure class="imagen">
								<img src="<?=base_url()?>uploads/<?=$offer->imagen?>" alt="">
								<figcaption><?=$offer->nombreprod?></figcaption>
							</figure>
						</a>
						<!--<div><?=$offer->des?></div>-->
					</div>
				<?php } ?>	
				
				
			</div>
		</section> <!-- end ofertas -->
		<!-- start destacados -->
		<section class="destacados">
			<div class="title">
				<p>Destacados</p>
			</div>
			<div class="products">
				<?php foreach ($destacados->result() as $dest) { ?>
					<div class="boxProduct">
						<a href="<?=base_url()?>productos/<?=$dest->id_producto?>">
							<figure class="imagen">
								<img src="<?=base_url()?>uploads/<?=$dest->imagen?>" alt="">
								<figcaption><?=$dest->nombreprod?></figcaption>
							</figure>
						</a>
						<!--<div><?=$offer->des?></div>-->
					</div>
				<?php } ?>	
			</div>
		</section> <!-- end destacados -->
		<!-- start nuevos -->
		<section class="novedades">
			<div class="title">
				<p>Novedades</p>
			</div>
			<div class="products">
				<?php foreach ($novedades->result() as $new) { ?>
					<div class="boxProduct">
						<a href="<?=base_url()?>productos/<?=$new->id_producto?>">
							<figure class="imagen">
								<img src="<?=base_url()?>uploads/<?=$new->imagen?>" alt="">
								<figcaption><?=$new->nombreprod?></figcaption>
							</figure>
						</a>
						<!--<div><?=$offer->des?></div>-->
					</div>
				<?php } ?>	
				
				
			</div>

		</section> <!-- end nuevos -->
	</div>
	<aside class="lateral">
		<h3>Recomendados</h3>
		<section class="recomendados">
			<?php foreach ($recomendados->result() as $rec) {?>
			<a href="<?=base_url()?>productos/<?=$rec->id_producto?>">
				<article>
					<figure class="imagen">
						<img src="<?=base_url()?>uploads/<?=$rec->imagen?>" alt="" />
						<figcaption><?=$rec->nombreprod?></figcaption>
					</figure>
				</article>
			</a>	
			<?php } ?>
			
		</section>

	</aside>
	<div class="clear"></div>
	<!-- start section services -->
	<section class="services">
		<h3>Servicios</h3>
		<?php if($principalserv->num_rows() > 0){ foreach($principalserv->result() as $s) { ?>
		<?php  $url = strtolower($s->titulo); $url = str_replace(" ", "-", $url); ?> 
			<div>
				<a href="<?=base_url()?>anuncios/<?=$url?>/<?=$s->id?>" class="lnkNormal">
					<p></p>
					<p><?=$s->titulo?></p> 
				</a>
			</div>
		<?php } } else { ?>
		<div>
			<a href="" class="lnkNormal">
				<p></p>
				<p>Mantenimiento de équipo</p> 
			</a>
		</div>
		<div>
			<a href="" class="lnkNormal">
				<p></p>
				<p>Cámaras de seguridad</p> 
			</a>
		</div>
		<div>
			<a href="" class="lnkNormal">
				<p></p>
				<p>Sistemas de administración</p> 
			</a>
		</div>
		<div>
			<a href="" class="lnkNormal">
				<p></p>
				<p>Redes</p> 
			</a>
		</div>
		<?php } ?>
	</section> <!-- end services-->
