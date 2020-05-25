<?php	
  get_header();	
	include(__DIR__ . '/menu.php');
?>
		<div id="TPYTS">
			<?php
			while ( have_posts() ) :

				the_post();

				the_title('<div class="Title">', '</div>');
				the_excerpt();

			endwhile;
			?>
		</div>
<?php wp_footer(); ?>
