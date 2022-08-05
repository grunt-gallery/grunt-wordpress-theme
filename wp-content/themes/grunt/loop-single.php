<div class="twelve columns">

<!-- Skip Nav -->
<a id="content"></a>

	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php $custom = get_post_custom($post->ID); ?>
	
		<!-- Begin the first article -->
		<article>

    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-1 gap-5">

		    <div class="px-6">
				
			<!-- Display the Title as a link to the Post's permalink. -->
			<h2>
				<?php the_title(); ?>
			</h2>
			
			<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
			<p><?php the_time('F jS, Y') ?></p>
	
		
<?php 
	
$meta_event = isset( $custom["event"][0] ) ? $custom["event"][0] : "default value";
$meta_eventdate = isset( $custom["eventdate"][0] ) ? $custom["eventdate"][0] : "default value";
$meta_eventlocation = isset( $custom["eventlocation"][0] ) ? $custom["eventlocation"][0] : "default value";
	
//$meta_event = $custom["event"][0];
//$meta_eventdate = $custom["eventdate"][0];
//$meta_eventlocation = $custom["eventlocation"][0];

if(  !empty( $meta_event ) ) { ?>
<p class="exhibit-artist">Event:  <?php echo $meta_event; ?> </p>
<?php } 

if(  !empty( $meta_eventdate ) ) { ?>
<p>Date: <?php echo $meta_eventdate; ?></p>
<?php } 

if(  !empty( $meta_eventlocation ) ) { ?>
<p>Location: <?php echo $meta_eventlocation; ?></p>
<?php } ?>

			<!-- Display the Post's Content in a div box. -->
			<div class="entry">
				<?php the_content(); ?>
			</div>
			
			<!-- Display a comma separated list of the Post's Categories. -->
			<p class="postmetadata">Posted in <?php the_category(', '); ?></p>
		
		</article>
		<!-- Closes the first article -->
	
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<div class="alert-box error">Sorry, no posts matched your criteria.</div>
	
	<!--End the loop -->
	<?php endif; ?>
  </div>
    </div>
	
</div>