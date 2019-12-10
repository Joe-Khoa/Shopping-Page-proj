jQuery(document).ready(function() {
"use strict";


/******************************************
   Newsletter popup
******************************************/

    jQuery('#myModal').appendTo("body");
          function show_modal(){
            jQuery('#myModal').modal('show');
          }

            jQuery('#myModal').modal({
            keyboard: false,
           backdrop:false
          }); 


/******************************************
   Featured slider
******************************************/

jQuery("#featured-slider .slider-items").owlCarousel({
		items: 3,
		itemsDesktop: [1024, 3],
		itemsDesktopSmall: [900, 2],
		itemsTablet: [640, 2],
		itemsMobile: [390, 1],
		navigation: !0,
		navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
		slideSpeed: 500,
		pagination: !1,
		autoPlay: false
	}),


/******************************************
	Top sellers slider
******************************************/

	jQuery("#top-sellers-slider .slider-items").owlCarousel({
		items: 3,
		itemsDesktop: [1024, 3],
		itemsDesktopSmall: [900, 2],
		itemsTablet: [640, 2],
		itemsMobile: [390, 1],
		navigation: !0,
		navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
		slideSpeed: 500,
		pagination: !1,
		autoPlay: true
	}),

/******************************************
	Special products slider
******************************************/

	jQuery("#special-products-slider .slider-items").owlCarousel({
		items: 4,
		itemsDesktop: [1024, 4],
		itemsDesktopSmall: [900, 3],
		itemsTablet: [640, 2],
		itemsMobile: [390, 1],
		navigation: !0,
		navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
		slideSpeed: 500,
		pagination: !1,
		autoPlay: false
	}),




/******************************************
	Our clients slider
******************************************/

	jQuery("#our-clients-slider .slider-items").owlCarousel({
		items: 2,
		itemsDesktop: [1024, 2],
		itemsDesktopSmall: [900, 2],
		itemsTablet: [640, 2],
		itemsMobile: [480, 1],
		navigation: false,
		navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
		slideSpeed: 500,
		pagination: false,
		autoPlay: true
	}),

/******************************************
	Latest news slider
******************************************/

	jQuery("#latest-news-slider .slider-items").owlCarousel({
		autoplay: !0,
		items: 3,
		itemsDesktop: [1024, 3],
		itemsDesktopSmall: [900, 2],
		itemsTablet: [640, 2],
		itemsMobile: [480, 1],
		navigation: !0,
		navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
		slideSpeed: 500,
		pagination: !1
	}),


/******************************************
	Mobile menu
******************************************/

	jQuery("#mobile-menu").mobileMenu({
		MenuWidth: 250,
		SlideSpeed: 300,
		WindowsMaxWidth: 767,
		PagePush: !0,
		FromLeft: !0,
		Overlay: !0,
		CollapseMenu: !0,
		ClassName: "mobile-menu"

	}),

/******************************************
	Mega Menu
******************************************/

	jQuery('.mega-menu-title').on('click', function() {
		// if (jQuery('.mega-menu-category').is(':visible')) {
		// 	jQuery('.mega-menu-category').slideUp();
		// } 
		if (jQuery('.mega-menu-category').is(':hidden')) {
		// else{
			jQuery('.mega-menu-category').slideDown();
		}
	});

	$(document).mouseup(function(event){
		console.log(event);

		if (!$(".mega-menu-title").is(event.target) && $(".mega-menu-title").has(event.target).length === 0) {
			$(".mega-menu-category").slideUp();
		}
	});


// jQuery('.mega-menu-category .nav > li').hover(function() {
// 	jQuery(this).addClass("active");
// 	jQuery(this).find('.popup').stop(true, true).fadeIn('slow');
// }, function() {
// 	jQuery(this).removeClass("active");
// 	jQuery(this).find('.popup').stop(true, true).fadeOut('slow');
// });


// jQuery('.mega-menu-category .nav > li.view-more').on('click', function(e) {
// 	if (jQuery('.mega-menu-category .nav > li.more-menu').is(':visible')) {
// 		jQuery('.mega-menu-category .nav > li.more-menu').stop().slideUp();
// 		jQuery(this).find('a').text('More category');
// 	} else {
// 		jQuery('.mega-menu-category .nav > li.more-menu').stop().slideDown();
// 		jQuery(this).find('a').text('Close menu');
// 	}
// 	e.preventDefault();
// });

/******************************************
   Category desc slider
******************************************/

jQuery("#category-desc-slider .slider-items").owlCarousel({
	autoPlay: true,
	items: 1, //10 items above 1000px browser width
	itemsDesktop: [1024, 1], //5 items between 1024px and 901px
	itemsDesktopSmall: [900, 1], // 3 items betweem 900px and 601px
	itemsTablet: [600, 1], //2 items between 600 and 0;
	itemsMobile: [320, 1],
	navigation: true,
	navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
	slideSpeed: 500,
	pagination: false
});

/******************************************
   Upsell product slider
******************************************/

jQuery("#upsell-product-slider .slider-items").owlCarousel({
		items: 4,
		itemsDesktop: [1024, 4],
		itemsDesktopSmall: [900, 3],
		itemsTablet: [640, 2],
		itemsMobile: [390, 1],
		navigation: !0,
		navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
		slideSpeed: 500,
		pagination: !1,
		autoPlay: false
	}),

/******************************************
	Related product slider
******************************************/

	jQuery("#related-product-slider .slider-items").owlCarousel({
		items: 4,
		itemsDesktop: [1024, 4],
		itemsDesktopSmall: [900, 3],
		itemsTablet: [640, 2],
		itemsMobile: [390, 1],
		navigation: !0,
		navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
		slideSpeed: 500,
		pagination: !1,
		autoPlay: true
	}),

/******************************************
	Related posts
******************************************/

	jQuery("#related-posts .slider-items").owlCarousel({
		items: 3,
		itemsDesktop: [1024, 3],
		itemsDesktopSmall: [900, 3],
		itemsTablet: [640, 2],
		itemsMobile: [390, 1],
		navigation: !0,
		navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
		slideSpeed: 500,
		pagination: !1,
		autoPlay: true
	}),


/******************************************
	testimonials slider
******************************************/

	jQuery("#testimonials-slider .slider-items").owlCarousel({
		items: 1,
		itemsDesktop: [1024, 1],
		itemsDesktopSmall: [900, 1],
		itemsTablet: [640, 1],
		itemsMobile: [390, 1],
		navigation: false,
		navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
		slideSpeed: 500,
		pagination: false,
		autoPlay: true,
		singleItem: true,
        transitionStyle: "goDown"
	}),

/******************************************
	Home testimonials slider
******************************************/

	jQuery(".subDropdown")[0] && jQuery(".subDropdown").on("click", function() {
		jQuery(this).toggleClass("plus"), jQuery(this).toggleClass("minus"), jQuery(this).parent().find("ul").slideToggle()
	})
if (jQuery('#home-testimonials-slider').length) {
	jQuery('#home-testimonials-slider').bxSlider({
		auto: true,
		infiniteLoop: true,
		hideControlOnEnd: true
	});
}

/******************************************
    PRICE FILTER
******************************************/

jQuery('.slider-range-price').each(function() {
	var min = jQuery(this).data('min');
	var max = jQuery(this).data('max');
	var unit = jQuery(this).data('unit');
	var value_min = jQuery(this).data('value-min');
	var value_max = jQuery(this).data('value-max');
	var label_reasult = jQuery(this).data('label-reasult');
	var t = jQuery(this);
	jQuery(this).slider({
		range: true,
		min: min,
		max: max,
		values: [value_min, value_max],
		slide: function(event, ui) {
			var result = label_reasult + " " + unit + ui.values[0] + ' - ' + unit + ui.values[1];
			console.log(t);
			t.closest('.slider-range').find('.amount-range-price').html(result);
		}
	});
})

/******************************************
    Footer expander
******************************************/

jQuery(".collapsed-block .expander").on("click", function(e) {
	var collapse_content_selector = jQuery(this).attr("href");
	var expander = jQuery(this);
	if (!jQuery(collapse_content_selector).hasClass("open")) expander.addClass("open").html("&minus;");
	else expander.removeClass("open").html("+");
	if (!jQuery(collapse_content_selector).hasClass("open")) jQuery(collapse_content_selector).addClass("open").slideDown("normal");
	else jQuery(collapse_content_selector).removeClass("open").slideUp("normal");
	e.preventDefault()
});

/******************************************
    Category sidebar
******************************************/

jQuery(function() {
	jQuery(".category-sidebar ul > li.cat-item.cat-parent > ul").hide();
	jQuery(".category-sidebar ul > li.cat-item.cat-parent.current-cat-parent > ul").show();
	jQuery(".category-sidebar ul > li.cat-item.cat-parent.current-cat.cat-parent > ul").show();
	jQuery(".category-sidebar ul > li.cat-item.cat-parent").on("click", function() {
		if (jQuery(this).hasClass('current-cat-parent')) {
			var li = jQuery(this).closest('li');
			li.find(' > ul').slideToggle('fast');
			jQuery(this).toggleClass("close-cat");
		} else {
			var li = jQuery(this).closest('li');
			li.find(' > ul').slideToggle('fast');
			jQuery(this).toggleClass("cat-item.cat-parent open-cat");
		}
	});
	jQuery(".category-sidebar ul.children li.cat-item,ul.children li.cat-item > a").on("click", function(e) {
		e.stopPropagation();
	});
});

/******************************************
    colosebut
******************************************/

jQuery("#colosebut1").on("click", function() {
	jQuery("#div1").fadeOut("slow");
});
jQuery("#colosebut2").on("click", function() {
	jQuery("#div2").fadeOut("slow");
});
jQuery("#colosebut3").on("click", function() {
	jQuery("#div3").fadeOut("slow");
});
jQuery("#colosebut4").on("click", function() {
	jQuery("#div4").fadeOut("slow");
});


/******************************************
    totop
******************************************/
// browser window scroll (in pixels) after which the "back to top" link is shown
var offset = 300,
	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
	offset_opacity = 1200,
	//duration of the top scrolling animation (in ms)
	scroll_top_duration = 700,
	//grab the "back to top" link
	jQueryback_to_top = jQuery('.totop');

//hide or show the "back to top" link
jQuery(window).scroll(function() {
	(jQuery(this).scrollTop() > offset) ? jQueryback_to_top.addClass('totop-is-visible'): jQueryback_to_top.removeClass('totop-is-visible totop-fade-out');
	if (jQuery(this).scrollTop() > offset_opacity) {
		jQueryback_to_top.addClass('totop-fade-out');
	}
});

//smooth scroll to top
jQueryback_to_top.on('click', function(event) {
	event.preventDefault();
	jQuery('body,html').animate({
		scrollTop: 0,
	}, scroll_top_duration);
});

/******************************************
    tooltip
******************************************/


jQuery('[data-toggle="tooltip"]').tooltip();


/* ---------------------------------------------
    slider typist
--------------------------------------------- */

if (typeof Typist == 'function') {
	new Typist(document.querySelector('.typist-element'), {
		letterInterval: 60,
		textInterval: 3000
	});
}

})







// ADD/EDIT/DEL cart


$(document).ready(function(){

    $.ajax({
		   url: 'http://localhost/shopping-page/public/CartController/chooseAction',
		  // url:'http://shopping0205.dx.am/public/CartController/chooseAction',

          type: 'POST',
          data : {
            action : 'refresh'
          },
          dataType : 'JSON',
          success : function(response){
              if(response.success){
                $('.totalNo').text(response.totalqty);
              }
          },
          error : function(){
             alert ('426 there is an error, plz try again ...');
          }
        })

    jQuery('.add-to-cart-mt, .button-cart, .pro-add-to-cart').click(function(){
      let id = ($(this).attr('data-id'));
      console.log(id);
        $.ajax({
		   url: 'http://localhost/shopping-page/public/CartController/chooseAction',
		  // url:'http://shopping0205.dx.am/public/CartController/chooseAction',
		//   http://shopping0205.dx.am/public/indexcontroller/index
          type: 'POST',
          data : {
            id : id,
            quantity : 1,
            action : 'addCart'
          },
          dataType : 'JSON',
          success : function(response){
              if(response.success){
                $('.totalNo').text(response.totalqty);
                $("#wrapper").toggle();
                $('.modalProdName').text(response.prod)
              }

              

          },
          error : function(){
             alert ('453 there is an error, plz try again');

          }
        })
    });
  
    jQuery('.delProd').click(function(){
      let idDel = $(this).attr('id-del');
      // alert('idDel');
      $.ajax({
		  // url:'http://shopping0205.dx.am/public/CartController/chooseAction',
		   url: 'http://localhost/shopping-page/public/CartController/chooseAction',

          type : 'POST',
          data : {
                  id : idDel,
                  action : 'delCart'                 
          },
          dataType : 'JSON',
          success : function(response){
            if(response.success){
                $('.tr-pro-id-'+idDel).remove();
                $('.totalPromtPrice').text(response.totalPromtPrice+' ₫');
                $('.totalPrice').text(response.totalPrice+' ₫');
                $('.totalNo').text(response.totalqty);
            }
          },
          error:function(){
            alert('please try this again');
          }
      })

      
    })

    jQuery('.fa-trash-alt').click(function(){
      $.ajax({
		   url: 'http://localhost/shopping-page/public/CartController/chooseAction',
		  // url:'http://shopping0205.dx.am/public/CartController/chooseAction',

          type :'POST',
          data :{
            action :'deleteAllCart'
          },
          dataType : 'JSON',
          success : function(response){ 
                if(response.success){
                  $('.body-Purchased').remove();
                  $('.totalPrice').text('0'+' ₫');
                  $('.totalPromtPrice').text('0'+' ₫');
                  $('.totalNo').text('0');
                }
          },
          error:function (){
            alert(' please try again');
          }
      })
    })
    jQuery('.fa-edit').click(function(){
      let idEdit = $(this).attr('id');
      // let quantity = $(this).siblings('input').val();
      let quantity = $(this).prev('input').val();
      console.log('515');
      if (quantity <= 0 || quantity ==''){
        alert(' Quantity must be aleast 1 or you can click Delete');
        $('#input-'+idEdit).val('');
        $('#input-'+idEdit).focus();
      }
      $.ajax({
		url : 'http://localhost/shopping-page/public/CartController/chooseAction',
		// url:'http://shopping0205.dx.am/public/CartController/chooseAction',

        type : 'POST',
        data : {
          id : idEdit, 
          qty : quantity,
          action : 'updateCart'
        },
        dataType : 'JSON',
        success : function(response){
          // console.log(response)
          if (response.sucess){
              if(response.prodPrice != response.prodPromtPrice){
                  $('.price-'+idEdit).text(response.prodPrice + ' ₫');
              }
              $('.promtPrice-'+idEdit).text(response.prodPromtPrice+' ₫');
              $('.totalPrice').text(response.totalPrice+' ₫');
              $('.totalPromtPrice').text(response.totalPromtPrice+' ₫');
              $('.totalNo').text(response.totalqty);
          }
        },
        // error: function (){
        //   alert('please try this again');
        // }
      })

    })
  })

  // SHOW THE MESSAGE BOX

$(document).ready(function(){
	$("#close").click(function(){
		$("#wrapper").toggle();
	});
	$(document).mouseup(function(event){
		console.log(event);
		if (!$("#modal").is(event.target) && $("#modal").has(event.target).length === 0) {
			$("#wrapper").hide();
		}
	});
});


function showBox(modal){
		$(modal).show();
	$(document).mouseup(function(event){
		// console.log(event);
		if (!$(modal).is(event.target) && $(modal).has(event.target).length === 0) {
			$(modal).hide();
		}
	});
}

  //  SEARCH PRODUCT


$(document).ready(function(){
	$(document).keypress(function(e){
		if(event.which == 13){
			
			let searchData = $('.form-control').val();
			// alert(searchData);
			// console.log(searchData);
			if(searchData != ''){
				callAjaxSearch(searchData);
			}
		}
	})

	$('.btn-search').click(function(){
		let formSearch = $('.form-control');
		$('.search').remove();
		// console.log(formSearch)

		let searchData = formSearch.val();
		console.log(searchData)

		if(searchData != ''){
			callAjaxSearch(searchData);
		}
	})

	function callAjaxSearch(searchData){
			$.ajax({
				// url:'http://shopping0205.dx.am/public/SearchController/SearchProcess',
				// url : 'http://localhost/shopping-page/public/SearchController/SearchProcess',

				// http://shopping0205.dx.am/public/
				type : 'post',
				data : {
					action :'searchProd',
					data : searchData,
				},
				dataType :'JSON',
				success : function (response){
					if(response.success){
						// alert('sucess');
						console.log('qty: '+response.dataQty);
						var i = 1;
						
						$('.showSearchData').append("<p class ='search'>"+response.dataQty+' result(s) found for: '+"'"+response.name+"'"+'</p>');
						response.resData.forEach(element => {
							console.log(i+++'. '+element.url+'\n');
							let url  = 'detailController/detail/'+element.url;
							$('.showSearchData').append("<a class ='search' href='"+url+"'>"+element.name+"</a>");
						});
						showBox('.showSearchData')
					}
				},
				err : function (err){
					alert('an error');
				},
			})
		
	}
})


