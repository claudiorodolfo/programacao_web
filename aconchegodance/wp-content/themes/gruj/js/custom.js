(function($) {
	'use strict';
	
	$(document).ready(function() {
		/*
			* Slider Script
		*/
		var $owlHome    = $('.main-slider-gruj');
		var $owlHomeParent  = $('.slider-wrapper-gruj');
		$owlHome.owlCarousel({
			rtl: $("html").attr("dir") == 'rtl' ? true : false,
			// nav:  $owlHome.children().length > 1,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
			dots: false,
			loop: $owlHome.children().length > 1,
			autoplayTimeout:10000,
			margin: 0,
			autoplay:true,
			autoHeight: true,	  
			thumbImage: true,
			loop:true,
			thumbsPrerendered: true,
			items:1,
			smartSpeed:450,
			responsive: {
				0: {
					items: 1,
					nav: false,
					dots: false
				},
				600: {
					items: 1
				},
				1000: {
					items: 1
				}
			}
		});
		$owlHome.owlCarousel();
		$owlHome.on('translate.owl.carousel', function (event) {
			var data_anim = $("[data-animation]");
			data_anim.each(function() {
				var anim_name = $(this).data('animation');
				$(this).removeClass('animated ' + anim_name).css('opacity', '0');
			});
		});
		$("[data-delay]").each(function() {
			var anim_del = $(this).data('delay');
			$(this).css('animation-delay', anim_del);
		});
		$("[data-duration]").each(function() {
			var anim_dur = $(this).data('duration');
			$(this).css('animation-duration', anim_dur);
		});
		$owlHome.on('translated.owl.carousel', function() {
			var data_anim = $owlHome.find('.owl-item.active').find("[data-animation]");
			data_anim.each(function() {
				var anim_name = $(this).data('animation');
				$(this).addClass('animated ' + anim_name).css('opacity', '1');
			});
		});
		
		
		//Thumbs Wrapper height Calculation and thumbs translation
		var inactive_thumb_height = $(".owl-thumbs .owl-thumb-item:last-child").outerHeight(true);
		var active_thumb_height = $(".owl-thumbs .owl-thumb-item.active").outerHeight(true);
		var thumbs_wrapper_height = 2*inactive_thumb_height + active_thumb_height;
		$(":root").css("--thumbs-wrapper-height",thumbs_wrapper_height+"px");
		
		$(".owl-thumb-item").each(function(e){		
			$(this).attr("data-translate",(e-1)*inactive_thumb_height);	
		});
		
		function translatethumb(){		
			var tr = $(".owl-thumb-item.active").attr("data-translate");
			$(".owl-thumbs").css("transform","translateY("+-tr+"px)");
		}
		
		translatethumb();
		$owlHome.on('translated.owl.carousel', function() {
			translatethumb();				
		});
		
		//Scolax CTA Section Auto Height
		function repos_cta(){
			var cta_height = $("#cta-unique").height();
			$(":root").css("--cta-height",-cta_height+"px");
		}
		
		repos_cta();
		
		$(window).resize(function(){
			repos_cta();	
		});
		
		
	});
	
}(jQuery));