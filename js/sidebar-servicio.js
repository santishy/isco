$(document).on('ready',function()
{
	var editServicio=$('.edit-servicio');
	editServicio.on('click',function()
		{
			var id=$(this).data('id');
			getServicio(id);
		});
});
function getServicio(ids)
{
	//alert('hola')
	var ruta=$('#panelServicio').data('ruta');
	$.ajax({
		url:ruta,
		type:'post',
		data:{id:ids},
		dataType:'json',
		beforesend:function(){},
		success:function(resp)
		{
			if(!jQuery.isEmptyObject(resp))
			{
				$("#titulo").val(resp[0].titulo);
				$("#contenido").val(resp[0].contenido);
				$("#id").val(resp[0].id);
				$("#slider").val(resp[0].slider);
				$("#rutaImagen").val(resp[0].imagen);
			}
			else
				alert('Recargue la pagina')
		},
		error:function(xhr,error,estado)
		{
			alert(xhr+" "+error+" "+estado);
		},
		complete:function()
		{

		}
	});
}