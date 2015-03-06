$(document).on('ready',function()
{
	var rutaFunctions=$("#frmCaracteristicas").attr('action');
	btn_addCaracteristica=$('#btn_addCaracteristica'); //features
	btn_addEspecificacion=$('#btn_addEspecificacion'); //especification
	$("#modalCaracteristicas").leanModal();
	$("#modalEspecificaciones").leanModal();
	var btn_modalCaracteristicas=$("#btn_modalCaracteristicas");
	var btn_modalEspecificaciones=$("#btn_modalEspecificaciones");
	//-------------caracteristicas-----------------------------------------------------
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
	});
	//---------------------especificaciones------------------------------------------------
	btn_addEspecificacion.on('click',function()
	{
		frmEspecificaciones=$("#frmEspecificaciones");
		$.getScript(rutaFunctions,function()
			{
				addEspecificacion();
			});
	});
	btn_modalEspecificaciones.on('click',function()
	{
		$("#modalEspecificaciones").openModal();
	});
});