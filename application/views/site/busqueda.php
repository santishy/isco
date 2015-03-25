<div class="productsPrincipal divCategoria">
	<section class="ofertas">
		<div class="title">
			<p class="pCat"><?=$categoria?></p>
		</div>
		<div class="products">
			<?php foreach ($result->result() as $res) { ?>
				<div class="boxProduct">
					<a href="<?=base_url()?>productos/<?=$res->id_producto?>">
						<figure class="imagen">
							<img src="<?=base_url()?>uploads/<?=$res->imagen?>" alt="">
							<figcaption><?=$res->nombreprod?></figcaption>
						</figure>
					</a>
					<!--<div><?=$offer->des?></div>-->
				</div>
			<?php } ?>
		</div>
	</section> 

</div>
<aside class="lateral offer">
	<h3>Ofertas</h3>
	<section class="recomendados">
		<?php foreach ($offer->result() as $oferta) {?>
		<a href="<?=base_url()?>productos/<?=$oferta->id_producto?>">
			<article>
				<figure class="imagen">
					<img src="<?=base_url()?>uploads/<?=$oferta->imagen?>" alt="" />
					<figcaption><?=$oferta->nombreprod?></figcaption>
				</figure>
			</article>
		</a>	
		<?php } ?>
	</section>
</aside>
<div class="clear"></div>	