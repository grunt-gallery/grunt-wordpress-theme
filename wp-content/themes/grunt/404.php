<?php get_header(); ?>
	
	<div class="twelve columns centered">
		<h3 style="text-align:center">Sorry, the page you are looking for is not here.</h3>  
		<p style="text-align:center">Please search for what you're looking for below, or email <a href="mailto:communications@grunt.ca">communications@grunt.ca</a>.</p>
	<div  style="text-align:center">
		
	<?php get_search_form(); ?>
	
	<a href="<?php echo home_url( '/' ); ?>">&larr; Go Home?</a>

		</div>
<?php get_footer(); ?>