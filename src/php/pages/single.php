<?php get_header(); ?>

<main class="main" role="main">

<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>

    <h1 class="title">
        <?php the_title(); ?>
    </h1>

    <div class="content">
        <?php the_content(); ?>
    </div>

    <p class="date"><?php the_time('j F Y'); ?></p>

    <?php
    endwhile;
    else :
    ?>

    <h1 class="title">Sorry, nothing to display.</h1>

<?php
endif;
?>

</main>

<?php get_footer();
