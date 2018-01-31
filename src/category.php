<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1>Categories for <?php single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>


		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
