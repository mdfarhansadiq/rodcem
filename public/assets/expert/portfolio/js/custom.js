(function ($) {
    "use strict";
    var $body 				= $("body"),
        $window 			= $(window),
        $testimonial 		= $('.testimonials'), // 7. Testimonials Carousel Slider
		$testimonials_2		= $('.testimonial_2'),		// Testimonials Slider Auto
		$testimonials_3		= $('.testimonial_3'),		// Testimonials Slider Auto
        $client_4 			= $('.testimonials_4'), // 7. Testimonials Carousel Slider
        $blog_slide 		= $('.blog_posts'), // 7. News Carousel Slider
		$contact			= $('#contact-form')
		
		
	// 1. Preloader For Hide loader
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(500).fadeOut(500);
			$('body').removeClass('page-load');
		}
	}
		
		
	$('.civil-slider').layerSlider({
		sliderVersion: '6.0.0b1',
		preventSliderClip: false,
		clipSlideTransition: 'enabled',
		autoStart: false,
		skin: 'v6',
		globalBGSize: 'cover',
		navPrevNext: false,
		hoverPrevNext: false,
		navStartStop: false,
		navButtons: false,
		showCircleTimer: false,
		thumbnailNavigation: 'disabled',
		height: 740,
		allowRestartOnResize: true,
		skinsPath: '../../../skins/'
	});
	
	$('#testmoniual-slide').layerSlider({
		sliderVersion: '6.0.0',
		type: 'fullwidth',
		responsiveUnder: 1280,
		maxRatio: 1,
		slideBGSize: 'auto',
		hideUnder: 0,
		hideOver: 100000,
		skin: 'v5',
		globalBGRepeat: 'repeat',
		globalBGAttachment: 'fixed',
		globalBGSize: 'contain',
		skinsPath: '../../../skins/'
	});

    //1..Add active class in nav-link class when it need active
    $body.scrollspy({
        target: ".navbar-collapse",
        offset: 20
    });

    //2.scroll for animation by clicking on nav-link 
	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
		// On-page links
		if (
		  location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		  && 
		  location.hostname == this.hostname
		) {
		  // Figure out element to scroll to
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		  // Does a scroll target exist?
		  if (target.length) {
			// Only prevent default if animation is actually gonna happen
			event.preventDefault();
			$('html, body').animate({
			  scrollTop: target.offset().top
			}, 1000, function() {
			  // Callback after animation
			  // Must change focus!
			  var $target = $(target);
			  $target.focus();
			  if ($target.is(":focus")) { // Checking if the target was focused
				return false;
			  } else {
				$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
				$target.focus(); // Set focus again
			  };
			});
		  }
		}
	});

    //3.Add fixed_header class  in header id when scroll down from top
    $window.on("scroll", function () {
        var bodyScroll = $window.scrollTop(),
            navbar = $("#header");
        if (bodyScroll > 100) {
            navbar.addClass("fixed_header")
        } else {
            navbar.removeClass("fixed_header")
        }
    });

    //4.Scroll to top from bottom by clicking scroll_to_top id
    $window.scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('#scroll_to_top').fadeIn()
        } else {
            $('#scroll_to_top').fadeOut()
        }
    });
    $('#scroll_to_top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        return !1
    });

		// 07. Testimonial Carousel HealthLine
    if ($testimonial.length) {
        $testimonial.owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            autoplayHoverPause: false,
            smartSpeed: 300,
            autoplay: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    };
	
	// 07. Testimonial Carousel HealthLine
    if ($testimonials_2.length) {
        $testimonials_2.owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            autoplayHoverPause: false,
            smartSpeed: 300,
            autoplay: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                1200: {
                    items: 2
                }
            }
        });
    };

	// 07. Testimonial_3 Carousel HealthLine
    if ($testimonials_3.length) {
        $testimonials_3.owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            autoplayHoverPause: false,
            smartSpeed: 300,
            autoplay: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    };
	
    // 6. Testimonials_4 Carousel Slider
    if ($client_4.length) {
        $client_4.owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            autoplayHoverPause: false,
            autoplay: 5000,
            smartSpeed: 700,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    };
	
	    // 6. Testimonials_4 Carousel Slider
		if ($blog_slide.length) {
			$blog_slide.owlCarousel({
				loop: true,
				margin: 30,
				nav: false,
				dots: true,
				autoplayHoverPause: false,
				autoplay: 5000,
				smartSpeed: 700,
				navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
				responsive: {
					0: {
						items: 1
					},
					992: {
						items: 2
					},
					1200: {
						items: 2
					}
				}
			});
		};


   // 11. Fact Counter For Achivement Counting
	 function factCounter() {
	  if($('.fact-counter').length){
	   $('.fact-counter .count.animated').each(function() {
	  
		var $t = $(this),
		 n = $t.find(".count-num").attr("data-stop"),
		 r = parseInt($t.find(".count-num").attr("data-speed"), 10);
		 
		if (!$t.hasClass("counted")) {
		 $t.addClass("counted");
		 $({
		  countNum: $t.find(".count-text").text()
		 }).animate({
		  countNum: n
		 }, {
		  duration: r,
		  easing: "linear",
		  step: function() {
		   $t.find(".count-num").text(Math.floor(this.countNum));
		  },
		  complete: function() {
		   $t.find(".count-num").text(this.countNum);
		  }
		 });
		}
		
		//set skill building height


		 var size = $(this).children('.progress-bar').attr('aria-valuenow');
		 $(this).children('.progress-bar').css('width', size+'%');

		
	   });
	  }
	 };
	 
	 
	// 14. Contact Form Validation
	if($contact.length){
		$contact.validate({  //#contact-form contact form id
			rules: {
				name: {
					required: true    // Field name here
				},
				email: {
					required: true, // Field name here
					email: true
				},
				subject: {
					required: true
				},
				message: {
					required: true
				}
			},
			
			messages: {
                name: "Please enter your First Name", //Write here your error message that you want to show in contact form
                email: "Please enter valid Email", //Write here your error message that you want to show in contact form
                subject: "Please enter your Subject", //Write here your error message that you want to show in contact form
				message: "Please write your Message" //Write here your error message that you want to show in contact form
            },

            submitHandler: function (form) {
                $('#send').attr({'disabled' : 'true', 'value' : 'Sending...' });
                $.ajax({
                    type: "POST",
                    url: "email.php",
                    data: $(form).serialize(),
                    success: function () {
                        $('#send').removeAttr('disabled').attr('value', 'Send');
                        $( "#success").slideDown( "slow" );
                        setTimeout(function() {
                        $( "#success").slideUp( "slow" );
                        }, 5000);
                        form.reset();
                    },
                    error: function() {
                        $('#send').removeAttr('disabled').attr('value', 'Send');
                        $( "#error").slideDown( "slow" );
                        setTimeout(function() {
                        $( "#error").slideUp( "slow" );
                        }, 5000);
                    }
                });
                return false; // required to block normal submit since you used ajax
            }

		});
	} 
	
	// 24. Elements Animation
    if ($('.wow').length) {
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();
    };

	// 18. When document is loading, do	
	$window.on('load', function() {
		handlePreloader();
	});
	
	// 25. When document is Scrollig, do
    $window.on('scroll', function () {
        factCounter();
    });
	
	
	  //5. Gallery With Filters List
    if ($('.filter-list').length) {
        $('.filter-list').mixItUp({});
    }
	
	// 32. Youtube and Vimeo video popup control
	jQuery(function(){
		jQuery("a.video-popup").YouTubePopUp();
		//jQuery("a.video-popup").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
	});

})(jQuery)
