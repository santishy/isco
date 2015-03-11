	<div class="rutaFunctions" data-ruta="<?=base_url()?>js/functions.js"></div>
	
	<script >
	$(document).on('ready',function()
	{
		$('select').material_select();
		$(".dropdown-button").dropdown
		({
      		inDuration: 300,
	      	outDuration: 50,
	      	constrain_width: false, // Does not change width of dropdown to that of the activator
	      	hover: false, // Activate on click
	     	alignment: 'left', // Aligns dropdown to left or right edge (works with constrain_width)
	     	gutter: 0, // Spacing from edge
	      	belowOrigin: true // Displays dropdown below the button
	   	});
	});
	</script>
	</div>
</body>
</html>