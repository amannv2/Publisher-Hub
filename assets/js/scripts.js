// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});



function process()
{
    console.log();
}

//author req del
$(".btn.btn-danger").click(function() {
   // alert($(this).attr("ama"));
    $.post('delauth.php', {
			did: $(this).attr("ama")
			
		}, function(d) {
			if (d > 0) {
				alert('Author Request Deleted ');location.reload(true);
			} else {
				alert('Error');
			} 
		});
});


//perm author del
$(".btn.btn-dangerrr").click(function() {
   // alert($(this).attr("ama"));
    $.post('delauth.php', {
			perauthdel: $(this).attr("ama")
			
		}, function(d) {
			if (d > 0) {
				alert('Author Deleted ');
                location.reload(true);
			} else {
				alert('Error');
			} 
		});
});

//pub req dele
$(".btn.btn-dangerr").click(function() {
   // alert($(this).attr("ama"));
    $.post('delauth.php', {
			pdid: $(this).attr("ama")
			
		}, function(d) {
			if (d > 0) {
				alert('Publisher Request Deleted ');location.reload(true);
			} else {
				alert('Error');
			} 
		});
});


//perm pub dele
$(".btn.btn-dangr").click(function() {
    //alert($(this).attr("ama"));
    $.post('delauth.php', {
			permpdel: $(this).attr("ama")
			
		}, function(d) {
			if (d > 0) {
				alert('Publisher Deleted ');location.reload(true);
			} else {
				alert('Error');
			} 
		});
});


//auth req add
$(".btn.btn-success").click(function() {
   // alert($(this).attr("ama"));
    $.post('delauth.php', {
			aid: $(this).attr("ama")
			
		}, function(d) {
			if (d > 0) {
				alert('Author Added');location.reload(true);
			} else {
				alert('Error');
			} 
		});
});
 
 
//pub req add
$(".btn.btn-successs").click(function() {
   // alert($(this).attr("ama"));
    $.post('delauth.php', {
			paid: $(this).attr("ama")
			
		}, function(d) {
			if (d > 0) {
				alert('Publisher Added');location.reload(true);
			} else {
				alert('Error');
			} 
		});
});


/* Portfolio */
$(window).load(function() {
    var $cont = $('.portfolio-group');
    
    $cont.isotope({
        itemSelector: '.portfolio-group .portfolio-item',
        masonry: {columnWidth: $('.isotope-item:first').width(), gutterWidth: -20, isFitWidth: true},
        filter: '*',
    });

    $('.portfolio-filter-container a').click(function() {
        $cont.isotope({
            filter: this.getAttribute('data-filter')
        });

        return false;
    });

    var lastClickFilter = null;
    $('.portfolio-filter a').click(function() {

        //first clicked we don't know which element is selected last time
        if (lastClickFilter === null) {
            $('.portfolio-filter a').removeClass('portfolio-selected');
        }
        else {
            $(lastClickFilter).removeClass('portfolio-selected');
        }

        lastClickFilter = this;
        $(this).addClass('portfolio-selected');
    });

});

/* Image Hover  - Add hover class on hover */
$(document).ready(function(){
    
    
    
    
    
    if (Modernizr.touch) {
        // show the close overlay button
        $(".close-overlay").removeClass("hidden");
        // handle the adding of hover class when clicked
        $(".image-hover figure").click(function(e){
            if (!$(this).hasClass("hover")) {
                $(this).addClass("hover");
            }
        });
        // handle the closing of the overlay
        $(".close-overlay").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            if ($(this).closest(".image-hover figure").hasClass("hover")) {
                $(this).closest(".image-hover figure").removeClass("hover");
            }
        });
    } else {
        // handle the mouseenter functionality
        $(".image-hover figure").mouseenter(function(){
            $(this).addClass("hover");
        })
        // handle the mouseleave functionality
        .mouseleave(function(){
            $(this).removeClass("hover");
        });
    }
});

// thumbs animations
$(function () {
    
    $(".thumbs-gallery i").animate({
             opacity: 0
    
          }, {
             duration: 300,
             queue: false
          });

   $(".thumbs-gallery").parent().hover(
       function () {},
       function () {
          $(".thumbs-gallery i").animate({
             opacity: 0
          }, {
             duration: 300,
             queue: false
          });
   });
 
   $(".thumbs-gallery i").hover(
      function () {
          $(this).animate({
             opacity: 0
    
          }, {
             duration: 300,
             queue: false
          });

          $(".thumbs-gallery i").not( $(this) ).animate({
             opacity: 0.4         }, {
             duration: 300,
             queue: false
          });
      }, function () {
      }
   );

});

// Mobile Menu
$(function(){
    $('#hornavmenu').slicknav();
    $( "div.slicknav_menu" ).addClass( "hidden-lg" );
});

// Stellar Parallax
$(function(){
  if (Modernizr.touch) {
      } else {
          $(window).stellar({
      horizontalScrolling: false
    });
  }
});       