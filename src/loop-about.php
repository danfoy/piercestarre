<?php 
$locationmeta 	= get_post_meta( get_the_ID(), 'location', true); 
$linkmeta 		= get_post_meta( get_the_ID(), 'link', true);
?>

<p>
    <?php
    echo '<span class="date">' . get_the_date('Y') . '.</span> ';
    if ($linkmeta) {
    	echo '<a href="' . $linkmeta . '" target="_blank">' . get_the_title() . '</a>';
    } else {
    	the_title();
	}
    if ( $locationmeta ) {
        echo ', <i class="location">' . $locationmeta . "</i>";
    }; ?>
</p>