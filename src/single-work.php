<?php get_header(); ?>

<main class="main" role="main">

<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
    
        $meta_location = get_post_meta( get_the_ID(), 'location', true);
    
        $content = get_the_content();
        preg_match("/<img[^>]+\>/i", $content, $matches);
        $content = preg_replace("/<img[^>]+\>/i", "", $content);
    
        echo $matches[0];
    
    ?>

    <h1 class="project-title"><?php the_title(); ?></h1>
    <div class="project-date"><?php the_time('j F Y'); ?></div>
    <?php
    if ( $meta_location ) {
        echo '<div class="project-location">' . $meta_location . "</div>";
    }; 
    ?>

    <div class="project-description">
       <?php echo wpautop( $content ); ?>
    </div>
    
    <?php
    endwhile;
else : ?>

    
    <h1>Sorry, nothing to display.</h1>

<?php
endif; ?>

</main>

<?php get_footer(); ?>
