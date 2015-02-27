function despegable()
{
	$(".dropdown-button").dropdown();
}
function subirImagen(e)
{
	e.preventDefault();
	var ruta=$(".rutaImagen").data('ruta');
	$('#barraProgress').css('width','0%');
	var files=e.target.files;
	if(window.FormData)
		for(i=0;i<files.length;i++)
		{
			var file=files[i];
			if(file.size<=2097152)
			{
				if(file.type.match(/image|pdf.*/))
				{
					var fd=new FormData();
					fd.append('user_file',file);
					ajax= new XMLHttpRequest();
					ajax.open('POST',ruta,true);
					ajax.addEventListener('load',function(e)
					{
						if(this.status==200){
							if(this.response!='error'){
								//document.querySelector()
								$('#rutaImagen').val(this.response);
							}
						}
					});
					ajax.upload.addEventListener('progress',function(e)
					{
						if(e.lengthComputable)
							document.querySelector('#barraProgress').style.width=((e.loaded/e.total)*100)+'%';
						//alert((e.loaded/e.total)*100)
					});
					ajax.send(fd);

				}//tipo de extencion
				else 
				{
					
				}
			}
		}
}
function addCaracteristica()
{
	var rutaCaracteristicas=$("#rutaCaracteristicas").data('addcaracteristica');
	$.ajax({
		url:rutaCaracteristicas,
		beforeSend:function()
		{

		},
		type:'post',
		data:frmCaracteristicas.serialize(),
		dataType:'text',
		success:function(resp)
		{
			switch(resp.ban)
			{
				case 1:
				case "1":
					addTablaCaracteristica(resp);
					break;
				case "0":
				case 0;
					alert('Complete los campos');
					break;
				case 2:
				case "2":
					alert('Ya tiene agregada esa etiqueta y caracteristica');
					break
				default:
					break;
			}
		},
		error:function(error,xhr,estado)
		{
			alert(error+" "+estado+" "+xhr);
		},
		complete:function()
		{

		}
	});
}
function addCaracteristica(resp)
{
	$("#TablaCaracteristicas").append('<tr><td>'+resp.etiqueta_c+'</td><td>'+resp.caracteristica+'</td><td><button>X</eliminar></td></tr>')
}