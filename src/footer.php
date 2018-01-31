
<footer>
    <?php
    if ( 'work' === get_post_type() && ! is_archive() ) : ?>
    <p class="copyright">All Images and Artwork &copy; Pierce Starre <?php echo date('Y'); ?></p>
    <?php
    endif; ?>

</footer>

<?php wp_footer(); ?>

</body>

</html>