<div id="Navigation">
	<?php 
		get_header();		
		wp_nav_menu(
			array(
				'theme_location' => 'primary'
			)
		); 
	?>
</div>
<div id="TPYTS">
	<?php
	while ( have_posts() ) :
		the_post();
		the_title();
		the_content();
	endwhile;
	?>
</div>
<?php wp_footer();
