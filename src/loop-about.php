<?php 
$postmeta = get_post_meta( get_the_ID(), 'location', true); ?>

<p>
    <?php
    echo '<span class="date">' . get_the_date('Y') . '.</span> ';
    the_title();
    if ( $postmeta ) {
        echo ', <i class="location">' . $postmeta . "</i>";
    }; ?>
</p>