<?php
/* Template Name: About Page Template */
get_header(); ?>

<main class="main" role="main">

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>

            <div class="strapline">
                <?php
                $strapline = get_post_meta( get_the_ID(), 'strapline', true);
                if ( $strapline ) {
                    echo '<p>' . $strapline . '</p>';
                } ?>
            </div>

            <div class="image">
                <?php the_post_thumbnail('large'); ?>
            </div>

        <?php
        endwhile;
    endif; ?>

        <div class="statement">
            <?php the_content(); ?>
        </div>

        <div class="cv">

            <?php

            /**
             * Loop through each category manually
             *
             * I was originally going to build a plugin to allow Pierce to rearrange these,
             * but ultimately decided to move to Gutenberg instead.
             */
            ps2017_generate_cv_block('education', 'Education');
            ps2017_generate_cv_block('talks', 'Talks');
            ps2017_generate_cv_block('live-performance', 'Live Performance');
            ps2017_generate_cv_block('exhibitions', 'Exhibitions');
            ps2017_generate_cv_block('residencies', 'Residencies');
            ps2017_generate_cv_block('awards-funding', 'Awards and Funding');
            ps2017_generate_cv_block('publications-media', 'Publications and Media');

            ?>


        </div>

        <div class="download">
            <a href="#" target="_blank">Click here to download CV</a>
        </div>

</main>

<?php get_footer();
