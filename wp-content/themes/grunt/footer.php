	</div>
	<!-- Main Row -->

  <?php
    $territory_acknowledgement = get_field("territory_acknowledgement", 19742);
    $accessibility = get_field("accessibility", 19742);
    $funder_text = get_field("funder_text", 19742);
  ?>
	<!-- Footer -->
	<footer class="row">

		<div class="twelve columns"><hr></div>

      <div class="row">
      
  <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
    
      <!--Card 1-->
      <div class="px-6 py-4">
        <p class="text-black">
          <span style="display:inline-block; line-height:2.0; font-size:140%;font-weight:bold;">grunt gallery</span>
          <br>#116&ndash;350 East 2nd Avenue
          <br>Vancouver, BC
          <br>V5T 4R8
          <br>Phone: <a href="tel:+16048759516">604&ndash;875&ndash;9516</a>
          <br>Hours: Tuesday&ndash;Saturday, Noon&ndash;5pm
          <br>
          <br><a href="https: //goo.gl/maps/nXNpHn7w427TKd6RA" target="_blank">MAP</a>
        </p>
      </div>
 
      <!--Card 2-->
      <div class="px-6 py-4">
        <h4>Connect with us on social media!</h4>			
        <div class="textwidget">
          <a href="https://twitter.com/gruntgallery"><img src="https://grunt.ca/wordpress/wp-content/uploads/2018/05/grunttwitter.png" width="42"></a>&nbsp;&nbsp;
          <a href="https://www.facebook.com/gruntgallery"><img src="https://grunt.ca/wordpress/wp-content/uploads/2018/05/gruntfacebook.png" width="42"></a>&nbsp;&nbsp;
          <a href="https://instagram.com/gruntgallery"><img src="https://grunt.ca/wordpress/wp-content/uploads/2018/05/gruntinstagram.png" width="42"></a>
        </div>
      </div>
   
      <!--Card 3-->
      <div class="px-6 py-4">
        <!-- Begin MailChimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
        <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;}
        body.home #mc_embed_signup {margin-left:-24px;}
        /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
        We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div id="mc_embed_signup">
        <form style="padding: 0;" action="//grunt.us8.list-manage.com/subscribe/post?u=befb1ca907e5641e22a9db3ec&amp;id=fecb72b0ad" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
        <div id="mc_embed_signup_scroll">
        <label for="mce-EMAIL">
        Subscribe to our free membership newsletter:</label>
        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required="">
        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;"><input type="text" name="b_befb1ca907e5641e22a9db3ec_fecb72b0ad" tabindex="-1" value=""></div>
        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </div>
        </form>
        </div>

        <!--End mc_embed_signup-->
      </div>

  </div>

  <?php if ($territory_acknowledgement) { ?>
    <div class="p-10 grid grid-cols-1">
      <div class="px-6 py-2 text-center">
        <?php echo $territory_acknowledgement; ?>
      </div>
    </div>
  <?php  } ?>

  <?php if ($accessibility) {?>
    <div class="p-10 grid grid-cols-1">
      <div class="px-6 py-2 text-center">
        <?php echo $accessibility; ?>
      </div>
    </div>
  <?php }?>

</div>
<!-- /end row -->

<div class="row">
  <div id="sponsor-logos" class="twelve columns">
    <?php if ($funder_text) {?>
      <p class="text-center">
        <?php echo $funder_text; ?>
      </p>
    <?php }?>
    <p><img class=" size-large wp-image-3440 aligncenter" alt="logos for footer of website-01" src="http://localhost:8888/grunt/wp-content/uploads/2013/06/logos-for-footer-of-website-01-1024x124.png" width="700" align="center" srcset="http://localhost:8888/grunt/wp-content/uploads/2013/06/logos-for-footer-of-website-01-1024x124.png 1024w, http://localhost:8888/grunt/wp-content/uploads/2013/06/logos-for-footer-of-website-01-250x30.png 250w" sizes="(max-width: 1024px) 100vw, 1024px"></p>
	</div>
	</div> <!-- /.row -->
	</footer> <!-- Footer -->

	</div>
	<!-- container -->

	<!-- Included JS Files -->
	<script src="<?php bloginfo('template_url');?>/js/foundation.js"></script>
	<script src="<?php bloginfo('template_url');?>/js/app.js"></script>

<?php wp_reset_query();?>
<?php if (is_front_page() || (is_page(19742))) {?>
<script>
	$(document).ready(function () {
		var paddyHeight = 100;
		var exFeatHeight = $('.exhibit-featured').height();
		var exFeatUp = exFeatHeight + 20;
		$('.primary-sidebar .exhibit-featured').css('height', exFeatHeight);
		$('.primary-sidebar .exhibit-featured').css('marginTop', -exFeatUp);
		$('nav.menu-main-container:before').click(function() {
  			$('#menu-main').toggle('show');
		});
	});
</script>
<?php }?>

	<?php wp_footer();?>

</body>
</html>