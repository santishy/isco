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
