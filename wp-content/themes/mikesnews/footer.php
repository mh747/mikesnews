     <hr>

    </div> <!-- /container -->

    <script src="<?php bloginfo('stylesheet_directory'); ?>/bootstrap/js/bootstrap.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.js"></script>

	<?php if(is_front_page()): ?>
		<script src="<?php bloginfo('stylesheet_directory'); ?>/js/functions.js"></script>
		<script>

			var current_page = 1;
			$( document ).ready(function() {
				$('#single-page').hide();
				$('#posts_div').hide();
				$('#older').hide();
				$('#newer').hide();
				var current_page = 1;

				$('#loading').html("<center><img src=<?php bloginfo('stylesheet_directory'); ?>/images/ajax-loader.gif></center>");
				setUpPage(current_page);
			});

			$('body').on('click', 'a.older_link', function(e){
				e.preventDefault();
				$('#loading').html("<center><img src=<?php bloginfo('stylesheet_directory'); ?>/images/ajax-loader.gif></center>");
				current_page++;
				console.log(current_page);
				setUpPage(current_page);
			});
			$('body').on('click', 'a.newer_link', function(e){
				e.preventDefault();
				$('#loading').html("<center><img src=<?php bloginfo('stylesheet_directory'); ?>/images/ajax-loader.gif></center>");
				current_page--;
				setUpPage(current_page);
			});
			$('body').on('click', 'a.link_to_single', function(e){
				e.preventDefault();
				var post_id = e.target.id;
				console.log("getting post id: " + post_id);
				getSinglePost(post_id, function(post_html){
					$('#post_area').html(post_html);
					$('#main-page').fadeOut('slow', function(){
						$('#single-page').fadeIn('slow', function(){
							//ready
						});
					});
				});
			});
			$('body').on('click', 'a.link_to_main', function(e){
				e.preventDefault();
				$('#single-page').fadeOut('slow', function(){
					$('#main-page').fadeIn('slow', function(){
						//ready
					});
				});
			});
		</script>
<?php endif; ?>

  </body>
</html>
