
/*FIXED Header*/


$(window).scroll(function () {
    var sc = $(window).scrollTop()
    if (sc > 0) {
    	$("#myHeader").addClass("myHeader-fixed");
    	
    } else {
        $("#myHeader").removeClass("myHeader-fixed");
        $("#myHeader").addClass("top");
        
    }
});


/*Over fixed header*/



(function($,sr){

  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
      var timeout;

      return function debounced () {
          var obj = this, args = arguments;
          function delayed () {
              if (!execAsap)
                  func.apply(obj, args);
              timeout = null;
          };

          if (timeout)
              clearTimeout(timeout);
          else if (execAsap)
              func.apply(obj, args);

          timeout = setTimeout(delayed, threshold || 100);
      };
  }
  // smartresize 
  jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');


(function(){

	$wrapper = $('#wrapper');
	$drawerRight = $('#drawer-right');

	///////////////////////////////
	// Set Home Slideshow Height
	///////////////////////////////

	/*function setHomeBannerHeight() {
		var windowHeight = jQuery(window).height();	
		jQuery('#header').height(windowHeight);
	}*/

	///////////////////////////////
	// Center Home Slideshow Text
	///////////////////////////////

	/*function centerHomeBannerText() {
			var bannerText = jQuery('#header > .center');
			var bannerTextTop = (jQuery('#header').actual('height')/2) - (jQuery('#header > .center').actual('height')/2) - 40;		
			bannerText.css('padding-top', bannerTextTop+'px');		
			bannerText.show();
	}*/



	///////////////////////////////
	// SlideNav
	///////////////////////////////

	function setSlideNav(){
		jQuery(".toggleDrawer").click(function(e){
			//alert($wrapper.css('marginRight'));
			e.preventDefault();

			if($wrapper.css('marginLeft')=='0px'){
				$drawerRight.animate({marginRight : 0},500);
				$wrapper.animate({marginLeft : -300},500);
			}
			else{
				$drawerRight.animate({marginRight : -300},500);
				$wrapper.animate({marginLeft : 0},500);
			}
			
		})
	}

	/*function setHeaderBackground() {		
		var scrollTop = jQuery(window).scrollTop(); // our current vertical position from the top	
		var imgHeight= $('.solid').height();
		if (scrollTop > 300 || jQuery(window).width() < 700) { 
			jQuery('#header .top').addClass('solid');
			$('#header .top.solid img').height(imgHeight);
		} else {
			jQuery('#header .top').removeClass('solid');
			$('#header img').css('height','150');		
		}
	}
*/



	///////////////////////////////
	// Initialize
	///////////////////////////////


	setSlideNav();
	/*jQuery.noConflict();
	setHomeBannerHeight();
	centerHomeBannerText();*/
	/*setHeaderBackground();*/

	//Resize events
	/*jQuery(window).smartresize(function(){
		setHomeBannerHeight();
		centerHomeBannerText();
		setHeaderBackground();
	});*/


	//Set Down Arrow Button
	jQuery('#scrollToContent').click(function(e){
		e.preventDefault();
		jQuery.scrollTo("#portfolio", 1000, { offset:-(jQuery('#header .top').height()), axis:'y' });
	});

	jQuery('nav > ul > li > a').click(function(e){
		e.preventDefault();
		jQuery.scrollTo(jQuery(this).attr('href'), 400, { offset:-(jQuery('#header .top').height()), axis:'y' });
	})

	jQuery(window).scroll( function() {
	   /*setHeaderBackground();*/
	});


	window.onresize = function(event) {
	  $(".carousel-inner").css("max-height",$(window).height()*0.85);
	};

})();


$(document).ready(function(){
	$("#home").click(function() {
	    $('html, body').animate({
	        scrollTop: $("#homeDiv").offset().top
	    }, 700);
	});

	$("#about").click(function() {
	    $('html, body').animate({
	        scrollTop: $("#aboutDiv").offset().top
	    }, 700);
	    $('html, body').css("top",100);
	});

	$("#home").click(function() {
	    $('html, body').animate({
	        scrollTop: $("#homeDiv").offset().top
	    }, 700);
	});

	$("#home").click(function() {
	    $('html, body').animate({
	        scrollTop: $("#homeDiv").offset().top
	    }, 700);
	});

	$("#home").click(function() {
	    $('html, body').animate({
	        scrollTop: $("#homeDiv").offset().top
	    }, 700);
	});
})








$(document).ready(function() {
 
  /*
 *  jQuery OwlCarousel v1.15
 *  
 *
 */


// Object.create function
if ( typeof Object.create !== 'function' ) {
    Object.create = function( obj ) {
        function F() {};
        F.prototype = obj;
        return new F();
    };
}
(function( $, window, document, undefined ) {
  
  var Carousel = {
    init :function(options, el){
      var base = this;
            base.options = $.extend({}, $.fn.owlCarousel.options, options);

            var elem = el;
            var $elem = $(el);
            base.$elem = $elem;

            base.baseClass();
            
            //Hide and get Heights
            base.$elem
            .css({opacity: 0,
              "display":"block"})

            base.checkTouch();
            base.support3d();

            base.wrapperWidth = 0;
            base.currentSlide = 0; //Starting Position

            base.userItems = $elem.children();
            base.itemsAmount = base.userItems.length;
            base.wrapItems();

            base.owlItems = base.$elem.find(".owl-item");
            base.owlWrapper = base.$elem.find(".owl-wrapper");

            base.orignalItems = base.options.items;
            base.playDirection = "next";

            base.onstartup = true;

            //setTimeout(function(){
          base.updateVars();
          //},0);
    },

    baseClass : function(){
      var base = this;
      var hasBaseClass = base.$elem.hasClass(base.options.baseClass);
      var hasThemeClass = base.$elem.hasClass(base.options.theme);

      if(!hasBaseClass){
        base.$elem.addClass(base.options.baseClass);
      }

      if(!hasThemeClass){
        base.$elem.addClass(base.options.theme);
      }

    },

    updateSize : function(){
      var base = this;

      var width = $(window).width();

      if(width > (base.options.itemsDesktop[0] || base.orignalItems) ){
         base.options.items = base.orignalItems
      } 

      if(width <= base.options.itemsDesktop[0] && base.options.itemsDesktop !== false){
        base.options.items = base.options.itemsDesktop[1];
      }  

      if(width <= base.options.itemsDesktopSmall[0] && base.options.itemsDesktopSmall !== false){
        base.options.items = base.options.itemsDesktopSmall[1];
      }  

      if(width <= base.options.itemsTablet[0]  && base.options.itemsTablet !== false){
        base.options.items = base.options.itemsTablet[1];
      } 

      if(width <= base.options.itemsMobile[0] && base.options.itemsMobile !== false){
        base.options.items = base.options.itemsMobile[1];
      }
      
    },
    updateVars : function(){
      var base = this;

      if(base.options.responsive === true){
        base.updateSize();
      }

      base.calculateAll();

      //Only on startup
      if(base.onstartup === true){

            base.buildControlls();

            if(base.options.responsive === true){
              base.response();
            }

            base.moveEvents();
            base.play();
            base.$elem.animate({opacity: 1});
            base.onstartup = false;
          }

          base.updatePagination();
    },

    response : function(){
      var base = this,
        width,
        smallDelay;

      $(window).resize(function(){
        if(base.options.autoPlay !== false){
          clearInterval(base.myInterval);
        }
        clearTimeout(smallDelay)
        smallDelay = setTimeout(function(){

          base.update();
            
        },200);
      })
    },

    update : function(){
      var base = this;

      base.updateVars();
      if(base.support3d === true){
        if(base.positionsInArray[base.currentSlide] > base.maximumPixels){
          base.transition3d(base.positionsInArray[base.currentSlide]);
        } else {
          base.transition3d(0);
          base.currentSlide = 0 //in array
        }
      } else{
        if(base.positionsInArray[base.currentSlide] > base.maximumPixels){
          base.css2slide(base.positionsInArray[base.currentSlide]);
        } else {
          base.css2slide(0);
          base.currentSlide = 0 //in array
        }
      }
      if(base.options.autoPlay !== false){
        base.play();
      }

    },

    wrapItems : function(){
      var base = this;
      base.userItems.wrapAll("<div class=\"owl-wrapper\">").wrap("<div class=\"owl-item\"></div>");
    },

    appendItemsSizes : function(){
      var base = this;

      var roundPages = 0;
      var lastItem = base.itemsAmount - base.options.items

      base.owlItems.each(function(index){
        $(this)
        .css({"width": base.itemWidth})
        .data("owl-item",Number(index));

        if(index % base.options.items === 0 || index === lastItem){
          if(!(index > lastItem)){
            roundPages +=1;
          }
        }
        $(this).data("owl-roundPages",roundPages);
        base.wrapperWidth =  base.wrapperWidth+ base.itemWidth
      })
    },

    appendWrapperSizes : function(){
      var base = this;
      base.owlWrapper.css({
        //add one more pixel to fix ie9 bug
        "width": base.wrapperWidth+1,
        "left": 0
      });
    },

    calculateAll : function(){
      var base = this;
      base.calculateWidth();
      base.appendItemsSizes();
      base.appendWrapperSizes();
      base.loops();
      base.max();
    },

    calculateWidth : function(){
      var base = this;
      base.itemWidth = Math.round(base.$elem.width()/base.options.items)
    },

    max : function(){
      var base = this;
      base.maximumSlide = base.itemsAmount - base.options.items;
      var maximum = (base.itemsAmount * base.itemWidth) - base.options.items * base.itemWidth;
        maximum = maximum * -1
      base.maximumPixels = maximum;
      return maximum;
    },

    min : function(){
      return 0;
    },

    loops : function(){
      var base = this;

      base.positionsInArray = [0];
      var elWidth = 0;

      for(var i = 0; i<base.itemsAmount; i++){
        elWidth += base.itemWidth;
        base.positionsInArray.push(-elWidth)
      }
    },

    buildControlls : function(){
      var base = this;

      if(base.options.navigation === true || base.options.pagination === true){
        base.owlControlls = $("<div class=\"owl-controlls\"/>").appendTo(base.$elem)
      }
      if (base.isTouch === false){
        base.owlControlls.addClass("clickable")
      }

      if(base.options.pagination === true){
        base.buildPagination();
      }
      if(base.options.navigation === true){
        base.buildButtons();
      }
  
    },

    buildButtons : function(){
      var base = this;
      var buttonsWrapper = $("<div class=\"owl-buttons\"/>")
      base.owlControlls.append(buttonsWrapper)

      base.buttonPrev = $("<div/>",{
        "class" : "owl-prev",
        "text" : base.options.navigationText[0] || ""
        });

      base.buttonNext = $("<div/>",{
        "class" : "owl-next",
        "text" : base.options.navigationText[1] || ""
        });

      buttonsWrapper
      .append(base.buttonPrev)
      .append(base.buttonNext);

      buttonsWrapper.on( base.getEvent() , "div[class^=\"owl\"]", function(event){
        event.preventDefault();
        if($(this).hasClass('owl-next')){
          base.next();
        } else{
          base.prev();
        } 
      })

      //Add 'disable' class
      base.checkNavigation();
    },

    getEvent : function(){
      var base = this;
      if (base.isTouch === true){
        return "touchstart.owlControlls"
      } else {
        return "click.owlControlls"
      }
    },

    buildPagination : function(){
      var base = this;

      base.paginationWrapper = $("<div class=\"owl-pagination\"/>");
      base.owlControlls.append(base.paginationWrapper);

      base.paginationWrapper.on(base.getEvent(), ".owl-page", function(event){
        event.preventDefault();
        if(Number($(this).data("owl-page")) !== base.currentSlide){
          base.goTo( Number($(this).data("owl-page")), true)
        }
      });
      base.updatePagination();
      
    },

    updatePagination : function(){
      var base = this;
      if(base.options.pagination === false){
        return false;
      }
      base.paginationWrapper.html("");

      var counter = 0;
      var lastPage = base.itemsAmount - base.itemsAmount % base.options.items

      for(var i = 0; i<base.itemsAmount; i++){
        if(i % base.options.items === 0){
          counter +=1
          if(lastPage === i){
            var lastItem = base.itemsAmount - base.options.items
          }
          var paginationButton = $("<div/>",{
            "class" : "owl-page"
            });
          var paginationButtonInner = $("<span></span>",{
            "text": base.options.paginationNumbers === true ? counter : "",
            "class": base.options.paginationNumbers === true ? "owl-numbers" : ""
          });
          paginationButton.append(paginationButtonInner)

          paginationButton.data("owl-page",lastPage === i ? lastItem : i);
          paginationButton.data("owl-roundPages",counter);

          base.paginationWrapper.append(paginationButton)
        }
      }
      base.checkPagination();
    },
    checkPagination : function(arg){
      var base = this;

      base.paginationWrapper.find(".owl-page").each(function(i,v){
        if($(this).data("owl-roundPages") === $(base.owlItems[base.currentSlide]).data("owl-roundPages") ){
        //Subject to discuss
        //if($(this).data("owl-page") == base.currentSlide){
          base.paginationWrapper
          .find(".owl-page")
          .removeClass("active")
          //.removeAttr("disabled", "disabled");
          //$(this).addClass("active").attr("disabled", "disabled");
          $(this).addClass("active");
        } 
      });
    },

    checkNavigation : function(){
      var base = this;

      if(base.currentSlide === 0){
        base.buttonPrev.addClass('disabled');
        base.buttonNext.removeClass('disabled');

      } else if (base.currentSlide === base.maximumSlide){
        base.buttonPrev.removeClass('disabled');
        base.buttonNext.addClass('disabled');

      } else if(base.currentSlide !== 0 && base.currentSlide !== base.maximumSlide){
        base.buttonPrev.removeClass('disabled');
        base.buttonNext.removeClass('disabled');
      }
    },

    destroyControlls : function(){
      var base = this;
      if(base.owlControlls){
        base.owlControlls.remove();
      }
    },

    next : function(speed){
      var base = this;
      base.currentSlide += 1;
      if(base.currentSlide > base.maximumSlide){
        base.currentSlide = base.maximumSlide;
        return false;
      }
      base.goTo(base.currentSlide,speed);
    },

    prev : function(speed){
      var base = this;
      base.currentSlide -= 1
      if(base.currentSlide < 0){
        base.currentSlide = 0;
        return false;
      }
      base.goTo(base.currentSlide,speed);
    },

    goTo : function(position,pagination){
      var base = this;
      if(position >= base.maximumSlide){
        position = base.maximumSlide
      } 
      else if( position <= 0 ){
        position = 0
      }
      base.currentSlide = position;

      var goToPixel = base.positionsInArray[position];

      if(base.support3d === true){
        base.isCss3Finish = false;

        if(pagination === true){
          base.swapTransitionSpeed("paginationSpeed");
          setTimeout(function() {
              base.isCss3Finish = true;
            }, base.options.paginationSpeed);

          } else if(pagination === "goToFirst" ){
            base.swapTransitionSpeed(base.options.goToFirstSpeed);
            setTimeout(function() {
              base.isCss3Finish = true;
            }, base.options.goToFirstSpeed);

          } else {
          base.swapTransitionSpeed("slideSpeed");
          setTimeout(function() {
              base.isCss3Finish = true;
            }, base.options.slideSpeed);
        }
        base.transition3d(goToPixel);
      } else {
        if(pagination === true){
          base.css2slide(goToPixel, base.options.paginationSpeed);
        } else if(pagination === "goToFirst" ){
          base.css2slide(goToPixel, base.options.goToFirstSpeed);
        } else {
          base.css2slide(goToPixel, base.options.slideSpeed);
        }
      }

      if(base.options.pagination === true){
        base.checkPagination()
      }
      if(base.options.navigation === true){
        base.checkNavigation()
      }
      if(base.options.autoPlay !== false){
        base.play()
      }
    },

    stop: function(){
      var base = this;
      base.options.autoPlay = false;
      clearInterval(base.myInterval);
    },

    play : function(){
      var base = this;
      if(base.options.autoPlay === false){
        return false;
      }
      clearInterval(base.myInterval);
      base.myInterval = setInterval(function(){
        if(base.currentSlide < base.maximumSlide && base.playDirection === "next"){
          base.next(true);
        } else if(base.currentSlide === base.maximumSlide){
          if(base.options.goToFirst === true){
            base.goTo(0,"goToFirst");
          } else{
            base.playDirection = "prev";
            base.prev(true);
          }
        } else if(base.playDirection === "prev" && base.currentSlide > 0){
          base.prev(true);
        } else if(base.playDirection === "prev" && base.currentSlide === 0){
          base.playDirection = "next";
          base.next(true);
        }
      },base.options.autoPlay)  
    },

    swapTransitionSpeed : function(action){
      var base = this;
      if(action === "slideSpeed"){
        base.owlWrapper.css(base.addTransition(base.options.slideSpeed));
      } else if(action === "paginationSpeed" ){
        base.owlWrapper.css(base.addTransition(base.options.paginationSpeed));
      } else if(typeof action !== "string"){
        base.owlWrapper.css(base.addTransition(action));
      }
    },

        addTransition : function(speed){
          var base = this;      
          return {
                "-webkit-transition": "all "+ speed +"ms ease",
        "-moz-transition": "all "+ speed +"ms ease",
        "-o-transition": "all "+ speed +"ms ease",
        "transition": "all "+ speed +"ms ease"
            }
        },
        removeTransition : function(){
      return {
                "-webkit-transition": "",
        "-moz-transition": "",
        "-o-transition": "",
        "transition": ""
            }
        },

        doTranslate : function(pixels){
      return { 
                "-webkit-transform": "translate3d("+pixels+"px, 0px, 0px)",
                "-moz-transform": "translate3d("+pixels+"px, 0px, 0px)",
                "-o-transform": "translate3d("+pixels+"px, 0px, 0px)",
                "-ms-transform": "translate3d("+pixels+"px, 0px, 0px)",
                "transform": "translate3d("+pixels+"px, 0px,0px)"
                };
        },

        transition3d : function(value){
      var base = this;
      base.owlWrapper.css(base.doTranslate(value));
    },
    css2move : function(value){
      var base = this;
      base.owlWrapper.css({"left" : value})
    },
    css2slide : function(value,speed){
      var base = this;

      base.isCssFinish = false;
      base.owlWrapper.stop(true,true).animate({
        "left" : value
      }, {
        duration : speed || base.options.slideSpeed ,
          complete : function(){
            base.isCssFinish = true;
        }
      })
    },

    support3d : function(){
        var base = this;
        
          var sTranslate3D = "translate3d(0px, 0px, 0px)";
          var eTemp = document.createElement("div");
          eTemp.style.cssText = "  -moz-transform:"    + sTranslate3D +
                                "; -ms-transform:"     + sTranslate3D +
                                "; -o-transform:"      + sTranslate3D +
                                "; -webkit-transform:" + sTranslate3D +
                                "; transform:"         + sTranslate3D;
          var rxTranslate = /translate3d\(0px, 0px, 0px\)/g;
          var asSupport = eTemp.style.cssText.match(rxTranslate);
          var bHasSupport = (asSupport !== null && asSupport.length === 1);
          base.support3d = bHasSupport
          return bHasSupport;
    },
    
    checkTouch : function(){
      var base = this;
      if ("ontouchstart" in document.documentElement)
      {
        base.isTouch = true;
      } else {
        base.isTouch = false;
      }
    },

    

    //Touch
    moveEvents : function(check){

      var base = this,
              offsetX = 0,
              offsetY = 0,
              baseElWidth = 0,
              relativePos = 0,
              minSwipe,
              maxSwipe,
              sliding;

            var links = base.$elem.find('a');

            base.isCssFinish = true;
        
            var start = function(event){
              if(base.isCssFinish === false){
                return false;
              } 
              if(base.isCss3Finish === false){
                return false;
              }

              var oEvent = event.originalEvent,
                  pos = $(this).position();
                  base.newRelativeX = 0;

                if(base.options.autoPlay !== false){
          clearInterval(base.myInterval);
        }
        $(this)
              .css(base.removeTransition())

              base.newX = 0;

                relativePos = pos.left;

                if(base.isTouch === true){
                  offsetX = oEvent.touches[0].pageX - pos.left;
                  offsetY = oEvent.touches[0].pageY - pos.top;
              } else {
                $(this).addClass("grabbing");
                offsetX = event.pageX - pos.left;
                offsetY = event.pageY - pos.top;
                $(document).on("mousemove.owl", move);
                $(document).on("mouseup.owl", end);
              }

              sliding = false;
              if(jQuery._data( base.$elem.get(0), "events" ).touchmove === undefined){
                base.$elem.on("touchmove.owl", ".owl-wrapper", move);
              }

            };

            var move = function(event){
              var oEvent = event.originalEvent;

              if(base.isTouch === true){
                base.newX = oEvent.touches[0].pageX - offsetX;
                base.newY = oEvent.touches[0].pageY - offsetY;

              } else {
                base.newX = event.pageX - offsetX;
              }
              
              base.newRelativeX = base.newX - relativePos

              if(base.newRelativeX > 8 || base.newRelativeX < -8  ){
                  event.preventDefault();
                  sliding = true;
              }

              if(  (base.newY > 10 || base.newY < -10) && sliding === false  ){
                   base.$elem.off("touchmove.owl");
              }

              minSwipe = function(){
                return  base.newRelativeX / 5;
              }
              maxSwipe = function(){
                return  base.maximumPixels + base.newRelativeX / 5;
              }
              //Calculate min and max
                base.newX = Math.max(Math.min( base.newX, minSwipe() ), maxSwipe() );
                if(base.support3d === true){
                  base.transition3d(base.newX);
                } else {
                  base.css2move(base.newX);
                }

            };

             var end = function(event){

              if(base.isTouch === true){
                var $this = $(this);
              } else{
                var $this = base.owlWrapper
                $this.removeClass("grabbing")
                $(document).off("mousemove.owl");
                $(document).off("mouseup.owl");
              }


              if(base.newX !== 0){
                var newPosition = base.getNewPosition();
                base.goTo(newPosition)
              } else {
                if(links.length>0){
                  links.off('click.owlClick');
                }
              }
              
            };


            if(base.isTouch === true){
              base.$elem.on("touchstart.owl", ".owl-wrapper", start);
          base.$elem.on("touchend.owl", ".owl-wrapper", end);
            }else{
              links.on('click.owlClick', function(event){event.preventDefault();})
              base.$elem.on("mousedown.owl", ".owl-wrapper", start);              
        base.$elem.on('dragstart.owl',"img", function(event) { event.preventDefault();});
        base.$elem.bind('mousedown.disableTextSelect', function() {return false;});
       }
    },

    clearEvents : function(){
      var base = this;
      base.$elem.off('.owl');
      $(document).off('.owl');
    },

    getNewPosition : function(){
      var base = this,
        newPosition;

      //Calculate new Position
      var newPosition = base.improveClosest();

        if(newPosition>base.maximumSlide){
          base.currentSlide = base.maximumSlide;
          newPosition  = base.maximumSlide;
        } else if( base.newX >=0 ){
          newPosition = 0;
          base.currentSlide = 0;
        }
        return newPosition;
    },

    improveClosest : function(){
      var base = this;
      var array = base.positionsInArray;
      var goal = base.newX;
      var closest = null;
      $.each(array, function(i,v){
        if( goal - (base.itemWidth/20) > array[i+1] && goal - (base.itemWidth/20)< v && base.moveDirection() === "left") {
          closest = v;
          base.currentSlide = i;
        } 
        else if (goal + (base.itemWidth/20) < v && goal + (base.itemWidth/20) > array[i+1] && base.moveDirection() === "right"){
          closest = array[i+1];
          base.currentSlide = i+1;
        }
      });
      return base.currentSlide;
    },

    moveDirection : function(){
      var base = this,
        direction;
      if(base.newRelativeX < 0 ){
        direction = "right"
        base.playDirection = "next"
      } else {
        direction = "left"
        base.playDirection = "prev"
      }
      return direction
    },
    

    //unused
    closest : function(a,x){
      var base = this;
      var theArray = a;
      var goal = x;
      var closestItem = 0;
      var closest = null;
      $.each(theArray, function(i,v){
        if (closest === null || Math.abs(v - goal) < Math.abs(closest - goal)) {
          closest = v;
        }
      });
      return closest;
    }
    };


    $.fn.owlCarousel = function( options ) {
        return this.each(function() {
            var carousel = Object.create( Carousel );
            carousel.init( options, this );
            $.data( this, 'owlCarousel', carousel );
        });
    };

    $.fn.owlCarousel.options = {
      slideSpeed : 200,
      paginationSpeed : 800,

      autoPlay : false,
      goToFirst : true,
      goToFirstSpeed : 1000,

      navigation : false,
      navigationText : ["Prev","Next"],
      pagination : true,
      paginationNumbers: false,

      responsive: true,

      items : 4,
      itemsDesktop : [1199,4],
    itemsDesktopSmall : [979,3],
    itemsTablet: [768,2],
    itemsMobile : [479,1],

    baseClass : "owl-carousel",
    theme : "owl-theme"
    };

})( jQuery, window, document );
  $("#owl-demo").owlCarousel({
    navigation : true,
    autoplay:false,
    autoplayTimeout:5000
  });
 
});



/*============ Carousel =========*/

$(document).ready(function () {
    $('#myCarousel').carousel({
        interval: 200000,
        height:400

    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
});


$(document).ready(function() {
  $('#lightgallery').lightGallery({
    pager: true
  });
});

$('#aniimated-thumbnials').lightGallery({
    thumbnail:true,
    animateThumb: false,
    showThumbByDefault: false
}); 