<?php get_header(); ?>

<main class="main" role="main">

<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>

    <h1>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_title(); ?>
        </a>
    </h1>

    <span class="date"><?php the_time('j F Y'); ?></span>

    <?php
    the_content();

    endwhile;
    else : ?>

    <h1>Sorry, nothing to display.</h1>

<?php
endif;
?>

</main>

<?php get_footer();