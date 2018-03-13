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
                <?php the_content(); ?>
            </div>
            <div class="image cv-block">
                <?php the_post_thumbnail('large'); ?>
            </div>
        </div>
        <?php
        endwhile;
    endif; ?>

        <div class="cv">
            
            <div class="row">
                
                <div class="cv-block">
                    <?php
                    /*
                    LOOP FOR EDUCATION
                    */
                    $query_education = new WP_Query( array(
                        'category_name' => 'education',
                        'posts_per_page' => 10
                        ) 
                    );

                    if ($query_education->have_posts()) : ?>

                        <h2 class="cv-section-title">Education</h2>
                        <?php
                        while ($query_education->have_posts()) :
                            $query_education->the_post();
                            get_template_part('loop', 'about');
                        endwhile;
                    endif;
                    ?>
                </div>
                

                <div class="cv-block">
                    <?php

                    /*
                    LOOP FOR TALKS AND RESIDENCIES
                    */
                        
                    $query_talks = new WP_Query( array(
                        'category_name' => 'talks-and-residencies',
                        'posts_per_page' => 10
                        ) 
                    );

                    if ($query_talks->have_posts()) : ?>

                        <h2 class="cv-section-title">Talks and Residencies</h2>
                        <?php
                        while ($query_talks->have_posts()) :
                            $query_talks->the_post();
                            get_template_part('loop', 'about');
                        endwhile;
                    endif;
                    ?>
                </div>

            
            </div>
            
            
            <div class="row">
                


                <div class="cv-block">
                    <?php
                    /*
                    LOOP FOR LIVE PERFORMANCE
                    */
                    $query_live_performance = new WP_Query( array(
                        'category_name' => 'live-performance',
                        'posts_per_page' => 10
                        ) 
                    );

                    if ($query_live_performance->have_posts()) : ?>

                        <h2 class="cv-section-title">Live Performance</h2>
                        <?php
                        while ($query_live_performance->have_posts()) :
                            $query_live_performance->the_post();
                            get_template_part('loop', 'about');
                        endwhile;
                    endif;
                    ?>
                </div>



                <div class="cv-block">
                    <?php
                    /*
                    LOOP FOR EXHIBITIONS
                    */
                        
                    $query_ptc = new WP_Query( array(
                        'category_name' => 'exhibitions',
                        'posts_per_page' => 10
                        ) 
                    );

                    if ($query_ptc->have_posts()) : 
                        ?>

                        <h2 class="cv-section-title">Exhibitions</h2>
                        <?php
                        while ($query_ptc->have_posts()) :
                            $query_ptc->the_post();
                            get_template_part('loop', 'about');
                        endwhile;
                    endif;
                    ?>
                </div>


            </div>

        </div>

</main>

<?php get_footer(); ?>
