	<!-- start sliderContainer -->
	<div class="sliderContainer">
		<ul class="bxslider">
			<?php if($sliders->num_rows() > 0) foreach ($sliders->result() as $slide) {?>
				<?php $url = strtolower($slide->titulo); $url = str_replace(" ", "-", $url); ?>
				<li><a href="<?=base_url()?>anuncios/<?=$url?>/<?=$slide->id_slider?>"><img src="<?=base_url()?>imgslider/<?=$slide->imagen?>" alt="" /></a></li>
			<?php } else {?>
			<li><a href="#"><img src="<?=base_url()?>img/2.jpg" alt=""></a></li>
			<?php } ?>
			<li><a href="#"><img src="<?=base_url()?>img/2.jpg" alt=""></a></li>
			<li><a href="#"><img src="<?=base_url()?>img/3.jpg" alt=""></a></li>
			<li><a href="#"><img src="<?=base_url()?>img/4.jpg" alt=""></a></li>
			<li><a href="#"><img src="<?=base_url()?>img/5.jpg" alt=""></a></li>
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
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
			</div>
		</section> <!-- end ofertas -->
		<!-- start destacados -->
		<section class="destacados">
			<div class="title">
				<p>Destacados</p>
			</div>
			<div class="products">
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
			</div>
		</section> <!-- end destacados -->
		<!-- start nuevos -->
		<section class="novedades">
			<div class="title">
				<p>Novedades</p>
			</div>
			<div class="products">
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
				<div class="boxProduct">
					<figure class="imagen">
						<img src="<?=base_url()?>img/lap.jpg" alt="" />
						<figcaption>Computadora Lenovo IdeaCentre Q180, Procesador Intel Atom </figcaption>
					</figure>
				</div>
			</div>

		</section> <!-- end nuevos -->
	</div>
	<aside class="lateral">
		<h3>Recomendados</h3>
		<section class="recomendados">
			<article>
				<figure class="imagen">
					<img src="<?=base_url()?>img/lap.jpg" alt="" />
					<figcaption>Laptop </figcaption>
				</figure>
			</article>
			<article>
				<figure class="imagen">
					<img src="<?=base_url()?>img/lap.jpg" alt="" />
					<figcaption>Laptop </figcaption>
				</figure>
			</article>
			<article>
				<figure class="imagen">
					<img src="<?=base_url()?>img/lap.jpg" alt="" />
					<figcaption>Laptop </figcaption>
				</figure>
			</article>
			<article>
				<figure class="imagen">
					<img src="<?=base_url()?>img/lap.jpg" alt="" />
					<figcaption>Laptop </figcaption>
				</figure>
			</article>
		</section>

	</aside>
	<div class="clear"></div>
	<!-- start section services -->
	<section class="services">
		<h3>Servicios</h3>
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
	</section> <!-- end services-->
