<?php get_header(); ?>

<main class="main" role="main">

<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>

    <div class="content">
        <?php the_content(); ?>
    </div>

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
