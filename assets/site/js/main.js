/* global */


/*********************** disable class to select *****************/
	$('select#parentCategory').on('change', function() {
	 var optionValue=this.value ; 
	 if(optionValue!==0){
		   $('#subCategory').removeAttr('disabled');
		 }
		 if(optionValue===0){
		   $('#subCategory').attr('disabled','');
		 }
	 });


/*Select Menu
=========================*/
//$('.ui-select-box, .search-select-box').selectmenu();

/*Toggle Grid and List view
============================*/
$(document).ready(function () {
    "use strict";
    $(".toggle-items > a").click(function (e) {
        e.preventDefault();
        
        var $this = $(this),
            container = $($this.parent().data('container'));
        
        $this.addClass('active').siblings().removeClass('active');
        
        container.removeClass('grid_view list_view').addClass($this.data('layout'));
        
    });

});

/* Show Product Zoom
==============================*/
$(document).ready(function () {
    "use strict";
	
   
});



$(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 140,
    itemMargin: 15,
    asNavFor: '#slider'
  });
 
  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });
});

/* Magnafic PopUp
================================*/
$('.open-popup-box').magnificPopup({
  type:'inline',
  midClick: true 
});


// ---------------------------------------
// Progress Bar
// ---------------------------------------
jQuery(document).ready(function () {
    
    'use strict';

	function progressBar() {
		
        var scrollTop = $(window).scrollTop(),
		
            bars = $('.not-loaded');
		
        bars.each(function () {
			
            $(this).removeClass('not-loaded');
				
            $(this).css('width', $(this).data('width') + '%');

		});
	}
        
    progressBar();


});