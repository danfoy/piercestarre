<?php 

get_header();

// Open <main>
echo '<main class="main" role="main">';

// Start the loop, check for posts
if (have_posts()) {
    while (have_posts()) {
        
        // Setup post
        the_post();

        // Set up local variables
        $meta_location = get_post_meta( get_the_ID(), 'location', true);
        $content = get_the_content();
        
        // Get first image tag in $content and add to array $matches
        preg_match("/<img[^>]+\>/i", $content, $matches);
        // Strip images from $content
        $content = preg_replace("/<img[^>]+\>/i", "", $content);
        // Insert first stripped image here, above content, if available
        if ($matches) {
            echo $matches[0];
        };

        // Set up post title and meta area
        echo '<h1 class="project-title">' . get_the_title() . '</h1>';
        echo '<div class="project-date">'. get_the_time('j F Y') . '</div>';
        if ( $meta_location ) {
            echo '<div class="project-location">' . $meta_location . "</div>";
        };

        if (ps2017_has_gallery()) {
            ps2017_sidescroll_gallery();
        };

        // Set up post content/description area
        echo '<div class="project-description">';
        // Print post content, now stripped of images
        echo wpautop( $content );
        echo '</div>';

    };

// Display message if no posts found
} else {
    echo '<h1>Sorry, nothing to display.</h1>';
};

// Close <main>
echo '</main>';

get_footer();