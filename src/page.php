<?php get_header(); ?>

<main class="main" role="main">
<?php
    
?>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();  
        the_content();
    endwhile;
else : ?>

    <h1>Sorry, nothing to display.</h1>

<?php
endif; ?>

</main>

<?php get_footer(); ?>
