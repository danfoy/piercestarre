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
        $meta_location          = get_post_meta( get_the_ID(), 'location',          true);
        $meta_image_credit_name = get_post_meta( get_the_ID(), 'image-credit-name', true);
        $meta_image_credit_link = get_post_meta( get_the_ID(), 'image-credit-link', true);
        $content                = get_the_content();

        // Get first image tag in $content and add to array $matches
        preg_match("/<img[^>]+\>/i", $content, $matches);
        // Strip images from $content
        $content = preg_replace("/<img[^>]+\>/i", "", $content);
        // Strip [gallery] shortcode from $content
        $content = preg_replace("/\[gallery[^\]]+\]/i", "", $content);
        // Insert first stripped image here, above content, if available
        if ($matches) {
            echo $matches[0];
        };

        // Print post title
        echo '<h1 class="title">' . get_the_title() . '</h1>';

        // Insert the sidescroll gallery if there is one
        if (ps2017_has_gallery()) {
            ps2017_sidescroll_gallery();
        };

        // Print project date, which is set to the post date
        echo '<div class="date">'. get_the_time('j F Y') . '</div>';

        // Print the project location from custom post meta, if exists
        if ( $meta_location ) {
            echo '<div class="location">' . $meta_location . '</div>';
        };

        // Print credit for the project photo if exists, optionally inside a link
        if ( $meta_image_credit_name ) {
            echo '<div class="image-credit">';
            echo '<span class="image-credit-title">Image: </span>';

            // Create a link if there is one, else wrap in a <span>
            if ($meta_image_credit_link) {
                // Add http to the link if ommitted. Avoids WordPress generating a relative URL.
                if (strpos($meta_image_credit_link, 'http') === false) {
                    $meta_image_credit_link = 'http://' . $meta_image_credit_link;
                };
                echo '<a href="' . $meta_image_credit_link . '" class="image-credit-link" target="_blank">';
            } else {
                echo '<span class="image-credit-name">';
            };

            // Print the the name we're crediting
            echo $meta_image_credit_name;

            // Close either the link or the <span>
            if ($meta_image_credit_link) {
                echo '</a>'; // .image-credit-link
            } else {
                echo '</span>'; // .image-credit-name
            };

            echo '</div>'; // .image-credit
        };


        // Set up post content/description area
        echo '<div class="content">';
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
