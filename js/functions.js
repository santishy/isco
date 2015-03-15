function despegable()
{
	$(".dropdown-button").dropdown();
}
 function subirImagen(e)
{
	e.preventDefault();
	var rutaimg=$(".rutaImagen").data('ruta');
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
					ajax.open('POST',rutaimg,true);
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
		dataType:'json',
		success:function(resp)
		{
			switch(resp.ban)
			{
				case 1:
				case "1":
					$("#tableCaracteristicas").append('<tr><td>'+resp.etiqueta_c+'</td><td>'+resp.caracteristica+'</td><td><button class="btn waves-effect waves-light red accent-3 btnEliCaracteristica" data-id="'+resp.id_caracteristica+'"><i class="mdi-navigation-cancel"></></button></td></tr>');
					$("#caracteristica").val("");
					$("#etiqueta_c").val("");
					$.each($('.btnEliCaracteristica'),function(){
						$(this).on('click',function(){eliminarCaracteristica($(this))});
					});
					break;
				case "0":
				case 0:
					alert('Complete los campos');
					break;
				case 2:
				case "2":
					alert('Ya tiene agregada esa etiqueta y caracteristica');
					break;
				default:
					alert('algo ocurrio'+resp.ban)
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

function addEspecificacion()
{
	var rutaEspecificaciones=$("#rutaEspecificaciones").data('addespecificacion');
	$.ajax({
		url:rutaEspecificaciones,
		beforeSend:function()
		{
		},
		type:'post',
		data:frmEspecificaciones.serialize(),
		dataType:'json',
		success:function(resp)
		{
			switch(resp.ban)
			{
				case 1:
				case "1":
					$("#tableEspecificaciones").append('<tr><td>'+resp.etiqueta_e+'</td><td>'+resp.especificacion+'</td><td><button class="btn waves-effect waves-light red accent-3 btnEliEspecificacion" data-id="'+resp.id_especificacion+'"><i class="mdi-navigation-cancel"></></button></td></tr>');
					$("#especificacion").val("");
					$("#etiqueta_e").val("");
					$.each($('.btnEliEspecificacion'),function(){
						$(this).on('click',function(){eliminarEspecificacion($(this))});
					});
					break;
				case "0":
				case 0:
					alert('Complete los campos');
					break;
				case 2:
				case "2":
					alert('Ya tiene agregada esa etiqueta y especificacion');
					break;
				default:
					alert('algo ocurrio'+resp.ban)
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
function eliminarCaracteristica(ele)
{
	var idcaracteristica=$(this).data('id');
	var rutafeatures=$("#rutaCaracteristicas").data('rutafeatures');
	$.ajax({
		url:rutafeatures,
		beforeSend:function()
		{
		},
		type:'post',
		data:{id_caracteristica:idcaracteristica},
		dataType:'text',
		success:function(resp)
		{
			if(resp==1 || resp=="1")
				ele.parent().parent().remove();
			else 
				alert(resp)
		},
		error:function(xhr,error,estado)
		{
			alert(xhr+" "+error+" "+estado+" ");
		},
		complete:function()
		{

		}
	});
}
function eliminarEspecificacion(ele)
{
	var idespecificacion=$(this).data('id');
	var rutaEspecification=$("#modalEspecificaciones").data('ruta');
	$.ajax({
		url:rutaEspecification,
		beforeSend:function()
		{
		},
		type:'post',
		data:{id_especificacion:idespecificacion},
		dataType:'text',
		success:function(resp)
		{
			if(resp==1 || resp=="1")
				ele.parent().parent().remove();
			else 
				alert(resp)
		},
		error:function(xhr,error,estado)
		{
			alert(xhr+" "+error+" "+estado+" ");
		},
		complete:function()
		{

		}
	});
}
function getProducto(id)
{
	var ruta=$("#productos").data('ruta');
	$.ajax({
		url:ruta,
		beforeSend:function(){

		},
		type:'post',
		data:{id_producto:id},
		dataType:'json',
		success:function(resp)
		{
			

			if(!jQuery.isEmptyObject(resp))
			{
				$("#id_categoria").removeClass('initialized');
				$.each(resp[0],function(index,value)
				{
					if(index!="destacado" && index!="oferta" && index!="id_categoria")
					{
						$('#'+index).focus();
						$('#'+index).val(value);
					}
					else 
						if(value==1 || value=="1")
							$('#'+index).attr('checked',true);
						else 
							$('#'+index).attr('checked',false);
						if(index=="id_categoria")
						{
							$('#'+index+' option[value="'+value+'"]').attr('selected',true);
							clonCategory();
						}
							
					});
			}
			else
				alert('Recargue la pagina');
		},
		error:function(xhr,estado,error){

		},
		complete:function()
		{

		}
	});
}
function clonCategory()
{
	clon = document.getElementById('id_categoria').cloneNode(true);
	$("#containerSelect").remove();
	label=document.createElement('label');
	label.text="Categoria";
	clon.id="id_categoria";
	clon.name="id_categoria";
	$('select').material_select();
	div=document.createElement('div');
	div.classList.add('input-field','col','s10');
	div.id="containerSelect";
	clon.classList.remove('initialized');
	div.appendChild(label.cloneNode(true));
	div.appendChild(clon);
	clon.classList.remove('initialized');
	$("#frmProducto").prepend(div);
	$("#id_categoria").material_select();
	$('select').material_select();
}