$(document).ready(function(){

	 $('.bxslider').bxSlider({
	 	 auto: true,
	 	 //autoControls: true,
	 	 adaptiveHeight: true,
	 	 //mode:'fade',
	 	 mode: 'vertical',
	 	 slideMargin: 18,
	 });

	 /* created elements for nav */

	 $('<select />').appendTo('nav.navResp');

	 $("<option />",{
	 	"selected":"selected",
	 	"value":"",
	 	"text":"Menú"

	 }).appendTo('nav.navResp select');

	 $("nav a").each(function() {
		 var el = $(this);
		 if(el.attr("href") == "#"){
		 	 $("<option />", {
			     "value"   : el.attr("href"),
			     "text"    :'---'+el.text()+'---',
			     "class"   :'bold' 
			 }).appendTo("nav.navResp select");

		 }
	 	else{
			 $("<option />", {
			     "value"   : el.attr("href"),
			     "text"    : el.text()
			 }).appendTo("nav.navResp select");
	  	}
	});

	 $("nav.navResp select").change(function() {
 		 window.location = $(this).find("option:selected").val();
	});

	 /* button top */
	$(window).scroll(function(){
   		if ($(this).scrollTop() > 50) {
        	/*$('.lnkUp').fadeIn(function(){
        		$(this).animate({
        			"right":'5px'
        		},'slow');
        	});*/
			$('.lnkUp').addClass('uno');
			$('.lnkUp').removeClass('dos');
   		} 

   		else 
   		{
        	//$('.lnkUp').fadeOut('slow');
        	$('.lnkUp').removeClass('uno');
        	$('.lnkUp').addClass('dos');
        	
  	 	}

	});	 

	$('#lnkUp').on('click',function(e){
		e.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, 300);
   		return false;
	});

});