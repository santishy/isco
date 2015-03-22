<script src="<?=base_url()?>js/jquery.elevateZoom-3.0.8.min.js"></script>
<script>
	$(function(){
		var contenedor = $('.containerImg');
		$('ul li:first-child() img').addClass('active');

		contenedor.css({
				'background-image':'url('+$('.active').attr('src')+')',
				'background-repeat':'no-repeat',
				'background-size':'100% 100%',
		});
		
		$('.imagen').on('click',function(){
			i = $(this);
			contenedor.css({
				'background-image':'url('+i.data('imagen') +')',
				'background-repeat':'no-repeat',
				'background-size':'100% 100%',
			});
			$('#zoom_01').attr('data-zoom-image',i.data('imagen'));
			$('.zoomWindowContainer div').css('background-image','url('+i.data('imagen') +')');

		});

		$('#zoom_01').elevateZoom({
			cursor:"crosshair",
			responsive:true,
			zoomWindowFadeIn:500,
			zoomWindowFadeOut:500,

		});
	});
</script>
<script>
	
</script>