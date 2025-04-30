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



	$(".toggle-clicker").click(function(e){
        e.preventDefault();
		$(this).find(".toggle-btn").toggleClass("open");
		$(this).parent().find(".row-toggle").toggleClass("open");
	});



    $('a[href*="#ref"]').on('click', function (e) {
        const href = $(this).attr('href');
        const anchor = href.substring(href.indexOf('#')); // "#ref2"

        if (!anchor.startsWith('#ref')) return;

        const anchorName = anchor.substring(1); // "ref2"
        const $targetById = $('#' + anchorName);
        const $targetByName = $('[name="' + anchorName + '"]');
        const $target = $targetById.add($targetByName);

        const $toggle = $('.references .row-toggle');

        if ($toggle.length && !$toggle.hasClass('open')) {
            $toggle.addClass('open');
        }

        if ($target.length) {
            $('li.refhighlight').removeClass('refhighlight');
            $target.closest('li').addClass('refhighlight');
        }
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

