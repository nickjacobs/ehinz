$(function() {


	$(".nav-link").mouseover(function(e){
		$(".subpages").hide();
		$(".subnav").hide();
		if($("[data-in-id='"+$(this).attr("data-id")+"']").length > 0){
			$(".subnav").show();
			$("[data-in-id='"+$(this).attr("data-id")+"']").css({"display": "flex"});
		}
	});

	$(".subnav").mouseleave(function(e){
		$(".subnav").hide();
		$(".subpages").hide();
	});

	$(".toggle-clicker").click(function(e){
		$(this).find(".toggle-btn").toggleClass("open"); 
		$(this).parent().find(".row-toggle").toggleClass("open"); 
	});

	$(window).scroll(function(){
		console.log($(window).scrollTop());
		console.log($("#show-side-trigger").offset().top);
		if($(window).scrollTop() >= $("#show-side-trigger").offset().top) {
			$(".side-tabs .tab").addClass("showing");
		}else{
			$(".side-tabs .tab").removeClass("showing");
		}
	});

	/*
	$('.carousel-holder').flickity({
	  // options
	  cellAlign: 'left',	  
	  //wrapAround: true,
	  //autoPlay: true,
	  watchCSS: true,
	  prevNextButtons: true,
	  pageDots: false,
	  cellSelector: '.carousel-cell',
	  arrowShape: 'M96,34.48H4a4,4,0,0,0,0,8.08H96a4,4,0,1,0,0-8.08Zm-86.23,4L41.38,6.9a4,4,0,0,0-5.72-5.72L1.18,35.66a4.06,4.06,0,0,0,0,5.72L35.66,75.86a4,4,0,0,0,5.72-5.71Z'
	});
	*/




});




// var scene = document.getElementById('bannerScene');
// var parallaxInstance = new Parallax(scene);