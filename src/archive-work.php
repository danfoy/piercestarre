<?php get_header(); ?>

<main class="main" role="main">

    <?php
    if (have_posts()) :
    ?>
    <ul class="project-archive-grid">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <li class="project-archive-item">
            <a class="project-archive-item-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail('work-thumbnail'); ?>
            </a>
        </li>

    <?php
    endwhile;
    ?>
    </ul>
    <?php
    else :
    ?>

        <article>
            <h2>Sorry, nothing to display.</h2>
        </article>

    <?php
    endif;
    ?>

</main>

<?php get_footer();