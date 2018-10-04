<?php
if (have_posts()) :
    while (have_posts()) :
        the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- post title -->
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /post title -->

		<!-- post details -->
		<span class="date"><?php the_time('F j, Y'); ?></span>
		<!-- /post details -->


	</article>
	<!-- /article -->

<?php
    endwhile;
else :
?>

	<!-- article -->
	<article>
		<h2>Sorry, nothing to display</h2>
	</article>
	<!-- /article -->

<?php endif;