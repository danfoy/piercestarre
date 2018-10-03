<?php 
/* Template Name: About Page Template */ 
get_header(); ?>

<main class="main" role="main">

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>

        <div class="sectionheader row">
            <div class="bio cv-block">
                <?php 
                $strapline = get_post_meta( get_the_ID(), 'strapline', true);
                if ( $strapline ) {
                    echo '<p>' . $strapline . '</p>';
                } ?>
            </div>
            <div class="image cv-block">
                <?php the_post_thumbnail('large'); ?>
            </div>
        </div>
        <?php
        endwhile;
    endif; ?>

        <div class="row">
            <div class="statement cv-block">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="cv">

            <?php
            /**
             * Creates a new WP Query and loops through a cateogry
             * 
             * @param  string $slug Lowercase slug name of the category
             * @param  string $title Title-case version of the slug, for headers
             * @return null
             */
            function createAboutLoop(string $slug, string $title) {

                // Open a cv block
                echo '<div class="cv-block">';

                // Start a new WP Query and fetch 10 recent posts from this category
                $query_{$slug} = new WP_Query(
                    array(
                        'category_name' => $slug,
                        'posts_per_page' => 10
                    )
                );

                // Test if the WP Query contains posts
                if ($query_{$slug}->have_posts()) {
                    
                    // Output a title and start a list
                    echo '<h2 class="cv-section-title">' . $title . '</h2>';
                    echo '<ol class="cv-list">';

                    // Loop through each post
                    while ($query_{$slug}->have_posts()) {

                        // Setup post
                        $query_{$slug}->the_post();

                        // Use a custom loop template
                        get_template_part('loop', 'about');
                    };

                    // Close the list
                    echo '</ol>';
                };

                // Close the CV block
                echo '</div>';
            };

            /**
             * Loop through each category manually
             *
             * I was originally going to build a plugin to allow Pierce to rearrange these,
             * but ultimately decided to move to Gutenberg instead.
             */
            createAboutLoop('education', 'Education');
            createAboutLoop('talks', 'Talks');
            createAboutLoop('live-performance', 'Live Performance');
            createAboutLoop('exhibitions', 'Exhibitions');
            createAboutLoop('residencies', 'Residencies');
            createAboutLoop('publications-media', 'Publications and Media');

            ?>


        </div>

        <div class="cv-block download">
            <a href="#" target="_blank">Click here to download CV</a>
        </div>

</main>

<?php get_footer(); ?>
