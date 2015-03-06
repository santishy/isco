$(document).on('ready',function()
{
	var rutaFunctions=$("#frmCaracteristicas").attr('action');
	btn_addCaracteristica=$('#btn_addCaracteristica');
	$("#modalCaracteristicas").leanModal();
	var btn_modalCaracteristicas=$("#btn_modalCaracteristicas");
	btn_addCaracteristica.on('click',function()
	{
		frmCaracteristicas=$("#frmCaracteristicas");
		$.getScript(rutaFunctions,function()
			{
				addCaracteristica();
			});
	});
	btn_modalCaracteristicas.on('click',function()
	{
		$("#modalCaracteristicas").openModal();
	})
});