<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="initial-scale=1.6; maximum-scale=1.0; width=device-width; "/>

<title><?php if ( is_front_page() ) { echo 'Home'; } else { wp_title(''); } ?> | <?php bloginfo('name'); ?></title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	
<!-- 
	<link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/1a12e613-f232-4143-89ad-b78671df9370.css"/>
 -->
	<!-- <script type="text/javascript" src="http://fast.fonts.com/jsapi/1a12e613-f232-4143-89ad-b78671df9370.js"></script> -->

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>

	<!-- Global site tag (gtag.js) - Google Ads: 741140217 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-741140217"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-741140217');
</script>
	
	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2250091545085722');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2250091545085722&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	
</head>

<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Begin Container -->
	<div class="container">
		
		<!-- Header Row -->
		<div class="row">
			
				<!-- Header Column -->
				<div class="twelve columns" id="access" role="navigation">
					
					<span id="skipnav" class="show-on-phones"><a href="#content">Skip to Content?</a></span>
				
					<!-- Site Description & Title -->
					<hgroup id="header">
						<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('title'); ?></a></h1>
            <div id="header_widgets">
              <div class="textwidget">
                <div id="bookstoreCTA">
                  <a href="http://gruntgallery.bigcartel.com">BOOKSTORE</a>
                  <a class="donate" href="https://grunt.ca/donate/">DONATE</a>
                  <div id="CTA_bg"></div>
                </div>
              </div>
            </div>

					</hgroup>

					<!-- Navigation --> 					
 				    <?php wp_nav_menu( array( 'theme_location' => 'header-menu','menu_class' => 'nav-bar', 'container' => 'nav') ); ?>
				
				</div>
				<!-- Header Column -->
				
		</div>
		<!-- Header Row -->
		
		<!-- Main Row -->
		<div class="row" id="mainrow">
		
		
				