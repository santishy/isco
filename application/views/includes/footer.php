 <a href="#" class="lnkUp" id="lnkUp"><span><i class="fa fa-arrow-up"></i></span></a>
<footer>

	<div class="footerBefore">
		<ul class="listaFooter">
			<li>
				<h3>SOBRE ISCO</h3>
				<ul>
					<li>Quienes Somos</li>
					<li>Siguenos</li>
					<li>
						<a href="#"><img src="<?=base_url()?>img/face2.png" title="nuestra página en facebook" alt="facebook" /></a>
						<a href="#"><img src="<?=base_url()?>img/twi.png" title="siguenos en twitter" alt="twitter" /></a>
					</li>
				</ul>
			</li>
			<li>
				<h3>CATEGORIAS</h3> 
				<ul>
					<?php foreach ($query->result() as $cat) { ?>
					<li><a href=""><?= $cat->nombre ?></a></li>
						
					<?php } ?>
					
				</ul>
			</li>
			<li>
				<h3>SERVICIOS</h3> 
				<ul>
					<li>Quienes Somos</li>
					<li>Información legal</li>
				</ul>
			</li>
			<li>
				<h3>SUCURSALES</h3> 
				<ul>
					<li><a href="#"> Sahuayo Matriz</a></li>
					<li><a href="#"> Jiquilpan</a></li>
					<li><a href="#"> Los Reyes</a></li>
					<li><a href="#"> Cotija</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="footerAfter">
		2015 ISCO COMPUTADORAS. Todos los derechos reservados
	</div>
</footer>

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
<script src="<?=base_url()?>js/jquery.bxslider.min.js"></script>
<script src="<?=base_url()?>js/main.js"></script>

</body>
</htm>	
