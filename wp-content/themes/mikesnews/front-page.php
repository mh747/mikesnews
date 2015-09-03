<?php get_header(); ?>

<div class="hero-unit">
  <h1>Welcome!</h1>
  <p>Welcome to Mike's News! This is a simple, sample news site.</p>
</div>


<div class="row">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="span4">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <br><small><?php the_time('l, F jS, Y'); ?></small>
            <p><?php the_excerpt(); ?><a href="<?php the_permalink(); ?>">Read more...</a></p>
          </div>


<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div>

<br><br>
<div class="row">
  <div class="span6">
    <p class='older'><?php next_posts_link("<< Older Posts"); ?></p>
  </div>
  <div class="span6">
    <p class='newer'><?php previous_posts_link("Newer Posts >>"); ?></p>
  </div>
</div>
<?php get_footer(); ?>
