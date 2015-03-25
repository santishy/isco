<div class="container">
	<h1>Ponte en contacto con nosotros</h1>
	<div class="contacto">
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
				<textarea name="txtmensaje" id="txtmensaje" cols="30" rows="10" required></textarea>
			</div>
			<div class="btnSub">
				<input type="submit" />
			</div>
		</form>
	</div>
	<div class="mapa">
		MAP
	</div>
</div>
<div class="clear"></div>