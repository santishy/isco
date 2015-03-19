
<section class="container">
<?php foreach ($imagenes->result() as $img) { ?>
<figure>
	<img src="<?=base_url()?>uploads/<?=$img->ruta?>" alt="">
</figure>
<?php } ?>
</section>
