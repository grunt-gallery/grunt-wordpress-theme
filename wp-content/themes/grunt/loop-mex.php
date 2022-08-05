
<?php 
  $feature_item = get_field("featured_item", 19742);
  $left = get_field("secondary_left", 19742);
  $center = get_field("secondary_center", 19742);
  $right = get_field("secondary_right", 19742);
  $feature = array($feature_item);
  $featured_posts = array($left, $center, $right);
?>

<div id="mainexhibition" class="twelve columns clearfix">

<!-- Skip Nav -->
<a id="content"></a>

  <?php if ($feature): ?>

        <?php foreach ($feature as $post):
        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post);?>
          <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <?php the_post_thumbnail('full', array('class' => 'featured-image wp-post-image'));?>
            <div class="exhibit-featured clearfix" style="height: 179px; margin-top: -199px;">
              <h2>
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
              </h2>
              <!-- custom field values here... tricky -->
              <?php
                $meta_values = get_post_meta($post->ID);
                // var_dump($meta_values);
              ?>
              <p class="exhibit-title">Exhibition Title: <?php the_title(); ?></p>
              <p class="exhibit-artist">Artist: <?php echo ($meta_values["artist"][0]);?></p>
              <p>Opening: <?php echo ($meta_values["opening"][0]); ?></p>
              <p>Exhibition Dates: <?php echo ($meta_values["exhibitdates"][0]); ?></p>
            </div><!-- exhibit-featured -->
          
          </div>
          <!-- primary-sidebar -->
    
        <?php endforeach;?>
    <?php
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata();?>
    <?php endif;?>

    

<div class="row" id="home-secondary">
  <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
    <?php
    if ($featured_posts): ?>
        <?php foreach ($featured_posts as $post):
        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post);?>
        <div class="rounded overflow-hidden">
          <?php the_post_thumbnail('full', array('class' => 'w-full')); ?>
          <div class="px-6 py-4 bg-zinc-900">
            <h2 class="text-4xl"><a href="<?php the_permalink(); ?>" class="text-white"><?php the_title(); ?></a></h2>
            <span class="text-white"><?php the_excerpt(); ?></span>
          </div>
        </div>
          <?php endforeach;?>
        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata();?>
    <?php endif;?>
  </div>
</div>
<!-- /end secondary -->

</div>