
<section class="container slide">
	<?php foreach ($sliders->result() as $slide) { ?>
	<figure>
		<img src="<?=base_url()?>imgslider/<?=$slide->imagen?>" alt="" />
	</figure>
	<h1><?=$slide->titulo?></h1>
	<div>
		<?php echo $slide->contenido; } ?>
	</div>
</section>