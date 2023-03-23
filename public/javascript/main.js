$(function() {


	function toggleDropdown (e) {
		var _d = $(e.target).closest('.dropdown'),
		  _m = $('.dropdown-menu', _d);
		setTimeout(function(){
            var shouldOpen = e.type !== 'click' && _d.is(':hover');
		  _m.toggleClass('show', shouldOpen);
		  _d.toggleClass('show', shouldOpen);
		  $('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
		}, e.type === 'mouseleave' ? 300 : 0);
	  }

	  $('body')
		.on('mouseenter mouseleave','.dropdown',toggleDropdown)
		.on('click', '.dropdown-menu a', toggleDropdown);

	// $("#topLevelNav .nav-link").mouseover(function(e){
	// 	$(".subpages").hide();
	// 	$(".subnav").hide();
	// 	if($("[data-in-id='"+$(this).attr("data-id")+"']").length > 0){
	// 		$(".subnav").show();
	// 		$("[data-in-id='"+$(this).attr("data-id")+"']").css({"display": "flex"});
	// 	}
	// });

	// $(".subnav").mouseleave(function(e){
	// 	$(".subnav").hide();
	// 	$(".subpages").hide();
	// });

	$(".toggle-clicker").click(function(e){
        e.preventDefault();
		$(this).find(".toggle-btn").toggleClass("open");
		$(this).parent().find(".row-toggle").toggleClass("open");
	});

	$(window).scroll(function(){
		//console.log($(window).scrollTop());
		//console.log($("#show-side-trigger").offset().top);
		if($("#show-side-trigger").length){
			if($(window).scrollTop() >= $("#show-side-trigger").offset().top) {
				$(".side-tabs .tab").addClass("showing");
			}else{
				$(".side-tabs .tab").removeClass("showing");
			}
		}
	});

	// $(".mobile-top-header .menu").click(function(e){
	// 	$("#mobileLevelNav").toggleClass("open");
	// });

	// $(window).on('resize', function(){
	// 	var win = $(this);
	//     if (win.width() >= 992) {
	//     	$("#mobileLevelNav").removeClass("open");
	//     };
	// });

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





    // indicator list search
    $('#IndicatorListSearch').on('change keyup paste', function () {
        var searchTerm = $(this).val();
        var acc = "#IndicatorListAccordion";

        $(acc + ' .indicator-table-row').removeClass('item--active');
        //console.log(acc);
        if(searchTerm.length === 0) {
            $(acc + ' .indicator-panel').collapse("hide");
            $(acc + ' .indicator-table-row').removeClass('item--active');
        }
        if(searchTerm.length >3 ){
            $(acc + ' .indicator-panel').each(function () {
                var DocGroupID = '#' + $(this).attr('id');
                if($(DocGroupID + ":not(:contains('" + searchTerm + "'))").length > 0){
                    $(this).collapse("hide");
                    $(DocGroupID + " .indicator-table-row").removeClass('item--active');
                }
                if($(DocGroupID + ":contains('" + searchTerm + "')").length > 0){
                    $(this).collapse("show");
                    $(DocGroupID + " .indicator-table-row").each(function () {
                        var rowid = '#' + $(this).attr('id');
                        $(rowid + ":contains('" + searchTerm + "')").addClass("item--active");
                    });
                }

            })
        }
    });

    $('#IndicatorListAllBtn').on('click',function(e){
        e.preventDefault();
        console.log('all');
        var acc = "#IndicatorListAccordion";
        $('#IndicatorListSearch').val([]);
        $(acc + ' .indicator-table-row').removeClass('item--active');
        if($(this).hasClass('open')){
            $(".indicator-panel").collapse("hide");
            $(this).text('All');
        }else{
            $(".indicator-panel").collapse("show");
            $(this).text('Hide');
        }
        $(this).toggleClass('open');
    });

    $('.accordion-button').on('click',function(){
        var acc = "#IndicatorListAccordion";
        if($(acc + ' .accordion-button.collapsed').length > 0){
            $('#IndicatorListAllBtn').removeClass('open').text('All');
        }else {
            $('#IndicatorListAllBtn').addClass('open').text('Hide');
        }
    });








});




// var scene = document.getElementById('bannerScene');
// var parallaxInstance = new Parallax(scene);
