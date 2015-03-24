<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cf100
 */
?>

	</div><!-- #content -->

	<footer id="pageFooter" class="site-footer" role="contentinfo">
		<div class="darkOverlay">
			<div class="container">
				<nav class="footerNav textright">
					<?php wp_nav_menu( array( 'menu' => 'Footer Menu' ) ); ?>
				</nav>
			</div>
		</div>
		<div class="container">
			<div class="oneHalf">
				<?php dynamic_sidebar( 'Footer: left' ); ?>
			</div>
			<div class="oneHalf textright">
				<?php dynamic_sidebar( 'Footer: right' ); ?>
				<div class="credit textright">
					Website by <a href="http://tracyappsdesign.com">tracy apps design</a>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

	<script src="//code.jquery.com/jquery-latest.min.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script>
		vpw = $(window).width();
		vph = $(window).height();
		$('.fullheightss').height(vph);
		
	   	$(document).ready(function() {

		function reset_demensions() {
		    doc_height = $(window).height();
		    doc_width = $(window).width();
		    $(".fullheight").css("min-height", doc_height + "px");
		}
		
		    reset_demensions(); 
		    $(window).resize(function() {
		        reset_demensions();
		    });
		
		});

		$("#latestNewsContainer .entry-content .post-thumbnail-container img").each(function() {
			if (this.complete) {
				// img already loaded successfully, show it
				$(this).closest(".post-thumbnail-container").show();
			} else {
				// not loaded yet so install a .load handler to see if it loads
				$(this).load(function() {
					// loaded successfully so show it
					$(this).closest(".post-thumbnail-container").show();
				});
			}
		});
	</script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.lettering.js"></script>
	<script>
		$(document).ready(function() {
		  $(".word_split").lettering('words');
		});
	</script>
	
	<script src="<?php bloginfo('template_directory'); ?>/js/masonry.pkgd.min.js"></script>
	<script>
		var container = document.querySelector('#masonry');
		var msnry = new Masonry( container, {
		  // options
		  columnWidth: 200,
		  itemSelector: '.post'
		});
	</script>

<?php if(is_front_page()) { ?>
		<script src="//unslider.com/unslider.min.js"></script>
		<script>
			if(window.chrome) {
				$('.banner li').css('background-size', '100% 100%');
			}
			
			$('.banner').unslider({
				fluid: true,
				dots: false,
				delay: 8500,
				speed: 1000
			});
		
			//  Find any element starting with a # in the URL
			//  And listen to any click events it fires
			$('a[href^="#"]').click(function() {
				//  Find the target element
				var target = $($(this).attr('href'));
				
				//  And get its position
				var pos = target.offset(); // fallback to scrolling to top || {left: 0, top: 0};
				
				//  jQuery will return false if there's no element
				//  and your code will throw errors if it tries to do .offset().left;
				if(pos) {
					//  Scroll the page
					$('html, body').animate({
						scrollTop: pos.top,
						scrollLeft: pos.left
					}, 1000);
				}
				
				//  Don't let them visit the url, we'll scroll you there
				return false;
			});

		</script>
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.nav.js" type="text/javascript"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollTo.js" type="text/javascript"></script>
		
		
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.sticky.js" type="text/javascript"></script>
		<script type="text/javascript">
				$(function() {
					var bar = $('#stickyHeaderContainer');
					var top = bar.css('top');
				$(window).scroll(function() {
					if($(this).scrollTop() > 110) {
						bar.stop().animate({'top' : '20px'}, 500);
					} else {
						bar.stop().animate({'top' : top}, 500);
					}
				});
			});
		</script>

		
		<script> 
		
		var topMenu = $("#site-navigation-sticky"),
				topMenuHeight = topMenu.outerHeight()+15,
				// All list items
				menuItems = topMenu.find("a[href*=#]"),
				// Anchors corresponding to menu items
				scrollItems = menuItems.map(function(){ 
				  var item = $($(this).attr("href").replace("/",""));
				  
				  if (item.length) { return item; }
				});

		// Bind to scroll
		$(window).scroll(function(){
		   // Get container scroll position
		   var fromTop = $(this).scrollTop()+topMenuHeight; 
		   // Get id of current scroll item
		   var cur = []
		   var min = 999999999999;
		   scrollItems.map(function(){
						
			 if ($(this).offset().top < fromTop){ 
				if (min > (fromTop - $(this).offset().top )){ 
					min = fromTop - $(this).offset().top;
					cur  = this;
			   
			   } 
			   
			   }
		   });
		   
		     
		   // Get the id of the current element
		  if(cur[0]){
				var id = cur[0].id; 
		   // Set/remove active class 
				   menuItems
					 .parent().removeClass("active")
					 .end().filter("a[href='/#"+id+"']").parent().addClass("active"); 
					 
			 }
		});
		</script>
		
		<script src="<?php bloginfo('template_directory'); ?>/js/instagram.min.js"></script>
		<script>
		jQuery.fn.spectragram.accessData = {
		    accessToken: '2375968.90f0957.7a4765c79a474c4e8068b237bafa7f9e',
		    clientID: 'b1337f94e7bc466d9fa73d7e073f2f3d'
		};
		$('.instagram').spectragram('getRecentTagged',{
		    query: 'crossfit100',
		    max: 15,
		    wrapEachWith: '<div class="photo"></div>'
		});
		</script>
<?php } //end if is front page ?>

<?php wp_footer(); ?>

</body>
</html>