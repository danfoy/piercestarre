<?php 
$locationmeta 	= get_post_meta( get_the_ID(), 'location', true); 
$linkmeta 		= get_post_meta( get_the_ID(), 'link', true);
?>

<li class="cv-item">
    <?php
    echo '<span class="cv-item-description">';
    if ($linkmeta) {
    	echo '<a href="' . $linkmeta . '" target="_blank">' . get_the_title() . '</a>';
    } else {
    	the_title();
	}
    if ( $locationmeta ) {
        echo ' &mdash; <i class="location">' . $locationmeta . "</i>";
    };
    echo ', <span class="cv-item-date"><span class="date">' . get_the_date('Y') . '.</span></span>';
	echo '</span>'; ?>
</li>