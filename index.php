<?php get_header(); ?>

<?php if ( is_front_page() ) :?>
<div class="page">
<div class="about">
	<h1><a href="<?php echo home_url(); ?>"><span><?php bloginfo('name'); ?></span></a></h1>

	<?php $info_query = new WP_Query('post_type=page&name=about'); ?>
	<?php while ($info_query->have_posts()) : $info_query->the_post(); ?>
			<?php the_content(); ?>			
	<?php endwhile; ?>

</div>
</div>
<?php elseif ( is_page('map') ) : ?>
<div class="page">
	<div class="contentholder">

	<?php
			$args = array(
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_parent' => 62,
			'post_type' => 'page',
			'numberposts'     => 100,
			'post_status' => 'publish'
			); 

			$postslist = get_posts($args); ?>

		<?php  $i = 1; ?>

		<?php	foreach ($postslist as $post) : setup_postdata($post); ?>

			<?php if ( get_geocode_latlng($post->ID) !== '' ) : ?>

			<div id="item<?php echo $i; ?>" class="infowindow">
				<p class="infowindowfooter">
					<a class="permalink" <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
					<span class="address"><?php echo get_geocode_address($post->ID); ?></span>
				</p>
				<?php the_excerpt(); ?>


			</div>

			<?php endif; ?>

			<?php $i++; ?>

		<?php endforeach; ?>

	</div>
				<script type="text/javascript">

				var locations = [

				<?php  $i = 1; ?>

				<?php	foreach ($postslist as $post) : setup_postdata($post); ?>

						<?php if ( get_geocode_latlng($post->ID) !== '' ) : ?>
						{
							title : '<?php the_title(); ?>', 
							latlng : new google.maps.LatLng<?php echo get_geocode_latlng($post->ID); ?>, 
							marker : new google.maps.MarkerImage("<?php echo get_stylesheet_directory_uri() ?>/images/<?php echo $i; ?>.png", null, null, new google.maps.Point(0, 34), new google.maps.Size(20, 34)),
							info : document.getElementById('item<?php echo $i; ?>')
						},
							<?php endif; ?>

							<?php $i++; ?>

						<?php endforeach; ?>
					];

				</script>

				<div id="map"></div>


				</div>


<?php elseif ( is_page('locations') ) : ?>
<div class="page">
	<?php
			$args = array(
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_parent' => 62,
			'post_type' => 'page',
			'numberposts'     => 100,
			'post_status' => 'publish'
			); 

			$postslist = get_posts($args); ?>

		<?php  $i = 1; ?>


	<div id="content" class="listview">
		<?php  $i = 1; ?>

		<?php	foreach ($postslist as $post) : setup_postdata($post); ?>

			<div class="item">
				<div class="titleblock">
					<h3><a href="<?php the_permalink(); ?>"><?php echo $i; ?>. <?php the_title(); ?></a></h3>
					<p class="address"><?php echo get_geocode_address($post->ID); ?></p>
				</div>

			</div>
			<?php $i++; ?>

			<?php endforeach; ?>

	</div>



	</div>

<?php elseif ( is_page('video') ) : ?>

	<div class="page">
		<?php if ( have_posts() ) : ?>
			<div id="content">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="item single">

				<?php the_content(); ?>

				</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>

<?php else: ?>
<div class="page">
	<?php if ( have_posts() ) : ?>
		<div id="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="item single">
			<h3><?php the_title(); ?></h3>
			<p class="address"><?php echo get_geocode_address($post->ID); ?></p>

			<?php the_content(); ?>

			</div>
		<?php endwhile; ?>
		</div>


		</div>


		<?php

		$args = array(
		'orderby' => 'menu_order', // Allows users to set order of subpages
		'order' => 'ASC',
		'post_parent' => 62,
		'post_type' => 'page',
		'numberposts'     => 100,
		'post_status' => 'publish'
		); 
		
		$pagelist = get_posts($args);

/*
		$args = array(
		'sort_column' => 'menu_order', 
		'sort_order' => 'ASC',
		'post_parent' => 62,
		'post_type' => 'page',
		'post_status' => 'publish'
		);


		$pagelist = get_pages($args);

*/

		$pages = array();
		foreach ($pagelist as $page) {
		   $pages[] += $page->ID;
		}

		$current = array_search(get_the_ID(), $pages);
		$prevID = $pages[$current-1];
		$nextID = $pages[$current+1];
		?>

		<div class="footer">
		<div id="navigation" class="buttonstyle">
			<div class="anotherwrapper">
		<ul>
		<li class="first"><span>
			<?php if (!empty($prevID)) { ?>
				<a href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>">&larr; Previous Stop</a>
			<?php } else { ?>
				<span>&nbsp;</span>
			<?php } ?>	
		</span></li>

		<li class="last"><span>
			<?php if (!empty($nextID)) { ?>
				<a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>">Next Stop &rarr;</a>
			<?php } else { ?>
				<span>&nbsp;</span>
			<?php } ?>		
		</span></li>
		
		</ul>

		</div></div></div>


	<?php else : ?>
		<div class="item">
		<h2>Page not found.</h2>
		<p>Apologies, but no results were found for the requested archive.</p>
		</div>
	<?php endif; ?>


<?php endif; ?>

<?php get_footer(); ?>