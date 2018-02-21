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
            <div class="bio">
                <?php the_content(); ?>
            </div>
            <div class="image">
                <?php the_post_thumbnail('large'); ?>
            </div>
        </div>

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

                    if ($query_education->have_posts()) :
                        $ps2017_current_year = 10000 
                        ?>

                        <h2 class="cv-section-title">Education</h2>
                        <?php
                        while ($query_education->have_posts()) :
                            $query_education->the_post();
                            global $ps2017_current_year;
                            $postmeta = get_post_meta( get_the_ID(), 'location', true);
                            if ( get_the_date('Y') < $ps2017_current_year ) {
                                $ps2017_current_year = get_the_date('Y');
                                echo '<h3>' . $ps2017_current_year . '</h3>';
                            };
                            ?>
                        <p>
                            <?php 
                            the_title();
                            if ( $postmeta ) {
                                echo ', <i class="location">' . $postmeta . "</i>";
                            }; 
                            ?>
                        </p>
                        <?php
                        endwhile;
                        $ps2017_current_year = 10000;
                    endif;
                    ?>
                </div>
                

                <div class="cv-block">
                    <?php

                    /*
                    LOOP FOR TALKS
                    */
                        
                    $query_talks = new WP_Query( array(
                        'category_name' => 'talks',
                        'posts_per_page' => 10
                        ) 
                    );

                    if ($query_talks->have_posts()) :
                        $ps2017_current_year = 10000 
                        ?>

                        <h2 class="cv-section-title">Talks</h2>
                        <?php
                        while ($query_talks->have_posts()) :
                            $query_talks->the_post();
                            global $ps2017_current_year;
                            $postmeta = get_post_meta( get_the_ID(), 'location', true);
                            if ( get_the_date('Y') < $ps2017_current_year ) {
                                $ps2017_current_year = get_the_date('Y');
                                echo '<h3>' . $ps2017_current_year . '</h3>';
                            };
                            ?>
                        <p>
                            <?php 
                            the_title();
                            if ( $postmeta ) {
                                echo ', <i class="location">' . $postmeta . "</i>";
                            }; 
                            ?>
                        </p>
                        <?php
                        endwhile;
                        $ps2017_current_year = 10000;
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

                    if ($query_live_performance->have_posts()) :
                        $ps2017_current_year = 10000 
                        ?>

                        <h2 class="cv-section-title">Live Performance</h2>
                        <?php
                        while ($query_live_performance->have_posts()) :
                            $query_live_performance->the_post();
                            global $ps2017_current_year;
                            $postmeta = get_post_meta( get_the_ID(), 'location', true);
                            if ( get_the_date('Y') < $ps2017_current_year ) {
                                $ps2017_current_year = get_the_date('Y');
                                echo '<h3>' . $ps2017_current_year . '</h3>';
                            };
                            ?>
                        <p>
                            <?php 
                            the_title();
                            if ( $postmeta ) {
                                echo ', <i class="location">' . $postmeta . "</i>";
                            }; 
                            ?>
                        </p>
                        <?php
                        endwhile;
                        $ps2017_current_year = 10000;
                    endif;
                    ?>
                </div>



                <div class="cv-block">
                    <?php
                    /*
                    LOOP FOR PERFORMANCE TO CAMERA
                    */
                        
                    $query_ptc = new WP_Query( array(
                        'category_name' => 'performance-to-camera',
                        'posts_per_page' => 10
                        ) 
                    );

                    if ($query_ptc->have_posts()) :
                        $ps2017_current_year = 10000 
                        ?>

                        <h2 class="cv-section-title">Performance to Camera</h2>
                        <?php
                        while ($query_ptc->have_posts()) :
                            $query_ptc->the_post();
                            global $ps2017_current_year;
                            $postmeta = get_post_meta( get_the_ID(), 'location', true);
                            if ( get_the_date('Y') < $ps2017_current_year ) {
                                $ps2017_current_year = get_the_date('Y');
                                echo '<h3>' . $ps2017_current_year . '</h3>';
                            };
                            ?>
                        <p>
                            <?php 
                            the_title();
                            if ( $postmeta ) {
                                echo ', <i class="location">' . $postmeta . "</i>";
                            }; 
                            ?>
                        </p>
                        <?php
                        endwhile;
                        $ps2017_current_year = 10000;
                    endif;
                    ?>
                </div>


            </div>

        </div>


        <?php
    endwhile;
    else :
    ?>

        <article>
            <h2 class="cv-section-title">Sorry, nothing to display.</h2>
        </article>

    <?php
    endif;
    ?>

</main>

<?php get_footer(); ?>
