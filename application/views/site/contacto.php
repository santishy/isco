<div class="container">
	<h1>Ponte en contacto con nosotros</h1>
	<p>Francisco I. Madero 101, Centro, 59000 Sahuayo de Morelos, Mich.</p>
	<div class="contacto">
		<input type="hidden" id="ruta" value="20.058585,-102.721953">
		<form action="<?=base_url()?>contacto/sendMail" method="post" class="frmContact" id="frmContact">
			<div>
				<div><label for="txtname"><strong>Nombre</strong></label></div>
				<input type="text" id="txtname" name="txtname" required autofocus />
			</div>
			<div>
				<div><label for="txtemail"><strong>Email</strong></label></div>
				<input type="email" id="txtemail" name="txtemail" required />
			</div>
			<div>
				<div><label for="txtitle"><strong>Asunto</strong></label></div>
				<input type="text" id="txtitle" name="txttitle" required />
			</div>
			<div>
				<div><label for="txtmensaje"><strong>Mensaje</strong></label></div>
				<textarea name="txtmensaje" id="txtmensaje" cols="30" rows="7" required></textarea>
			</div>
			<div class="btnSub">
				<input type="submit" value="Enviar" />
			</div>
		</form>
	</div>
	<div class="mapa" id="mapa">
		
	</div>
</div>
<div class="clear"></div>