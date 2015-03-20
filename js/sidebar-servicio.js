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
				$.each(resp[0],function(index,value)
				{
					if(index!="slider" )
					{
						$('#'+index).focus();
						$('#'+index).val(value);
					}
					else 
						if(value==1 )
							$('#'+index).attr('checked',true);
						else 
							$('#'+index).attr('checked',false);
				});
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