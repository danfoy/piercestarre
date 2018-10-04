<?php 

get_header();

echo '<main class="main" role="main">';

// Check for posts
if (have_posts()) {

    // Open list of projects
    echo '<ol class="project-archive-grid">';

    // For each post...
    while (have_posts()) {

        // Setup post
        the_post();
        
        // Create a list item for each post
        echo '<li class="project-archive-item">';
        echo    '<a class="project-archive-item-link" href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
        
        if (has_post_thumbnail()) {
            the_post_thumbnail('work-thumbnail');
        } else {
            echo '<span class="post-thumbnail-placeholder">PS</span>';
        };

        echo    '</a>'; // .project-archive-item-link
        echo '</li>'; // .project-archive-item
    }
    
    // Close the list
    echo '</ol>'; // .project-archive-grid
    
} else {
    // Handle display when there are no posts
    echo '<article>';
    echo    '<h2>Sorry, nothing to display.</h2>';
    echo '</article>';
}

echo '</main>'; // .main

get_footer();