<?php get_header(); ?>


<div id="main-page">
	<div class="hero-unit">
	  <h1>Welcome!</h1>
	  <p>Welcome to Mike's News! This is a simple, sample news site.</p>
	</div>

	<div class="row" id="loading">
	</div>

	<div class="row" id="posts_div">
	</div>

	<br><br>
	<div class="row">
	  <div class="span6">
	    <p id='older'></p>
	  </div>
	  <div class="span6">
	    <p id='newer'></p>
	  </div>
	</div>
</div>
<div id="single-page">
	<div class="jumbotron">
		<div class="headerimg">
			&nbsp
		</div>
		<a class="link_to_main" href="#">Back to Main Page</a>
	</div>

	<div class="row">
		<div class="span8" id='post_area'>
		</div>
	</div>
</div>

<?php get_footer(); ?>