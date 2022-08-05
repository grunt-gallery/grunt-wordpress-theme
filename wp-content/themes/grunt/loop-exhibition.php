<div class="twelve columns">

  <!-- Skip Nav -->
  <a id="content"></a>

  <!-- Start the Loop -->
    <?php if (have_posts()): while (have_posts()): the_post();?>
		    <?php $custom = get_post_custom();?>

				<article>

		  <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-1 gap-5">

		    <div class="px-6">

					<h2>
						<?php the_title();?>
					</h2>

		    </div>

		  </div>

		  <?php
        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
            the_post_thumbnail('large', array('class' => "featured-image", 'loading' => "lazy"));
        }
      ?>

		  <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-1 gap-5">

        <div class="px-6">

          <div class="exhibit-info">
                <p class="exhibit-title"><span>Exhibition Title:</span> <?php the_title();?></p>
                <p class="exhibit-artist"><span>Artist:</span>  <?php echo $custom["artist"][0]; ?> </p>
                <p><span>Opening:</span> <?php echo $custom["opening"][0]; ?></p>
                <p><span>Exhibition Dates:</span> <?php echo $custom["exhibitdates"][0]; ?></p>
          </div>
          
					<!-- Display the Post's Content in a div box. -->
					<div class="entry">
						<?php the_content();?>
					</div>

					<!-- Display a comma separated list of the Post's Categories. -->
					<!-- <p class="postmetadata">Posted in <?php echo get_the_term_list(get_the_ID(), 'medium', '', ', '); ?></p> -->

		    </div>

		    </article>
				<!-- Closes the first article -->

		  </div>





			<!-- Stop The Loop (but note the "else:" - see next line). -->
			<?php endwhile;else: ?>

		<div class="alert-box error">Sorry, no posts matched your criteria.</div>

	<!--End the loop -->
	<?php endif;?>

	<!-- Begin Pagination -->
	<?php if (function_exists("emm_paginate")) {
    emm_paginate();
}?>
	<!-- End Pagination -->

</div>

