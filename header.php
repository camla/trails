<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php 
	wp_title( '|', true, 'right' );
	bloginfo( 'name' ); 
	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )
		echo ": $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	?></title>

	<meta name="viewport" content="initial-scale=1.0, width=device-width" />

	<script type="text/javascript" src="http://fast.fonts.com/jsapi/6e25e19c-6643-4496-b606-d165e32d9d5e.js"></script>

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon.ico" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php if ( is_page('map') ) { ?>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/map.js"></script>	
<?php } ?>

<?php wp_head(); ?>
	

</head>

<body <?php if ( is_page('map') ) : ?> onload="initializeMap();" <?php endif; ?>>

	<div class="header">
		
		<div class="title">
		<div class="wrap">
			<a href="/" class="trailslogo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/trails.png" /></a>
			<a href="http://www.camla.org/" class="camlogo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cam.gif" /></a>
		</div>
		</div>
		
		<div class="viewwrap">
			<div id="view" class="buttonstyle">
				<div class="anotherwrapper">
					<ul>
					<li class="first <?php if ( is_front_page() ) : ?>selected<?php endif; ?>"><span><a href="/">About</a></span></li>
						<li class="<?php if ( is_page('video') ) : ?>selected<?php endif; ?>"><span><a href="/video">Video</a></span></li>
					<li class="<?php if ( is_page('map') ) : ?>selected<?php endif; ?>"><span><a href="/map">Map</a></span></li>
					<li class="last <?php if ( is_page('locations') ) : ?>selected<?php endif; ?>"><span><a href="/locations">List</a></span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>


