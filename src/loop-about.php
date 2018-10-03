<?php
$locationmeta 	= get_post_meta( get_the_ID(), 'location', true);
$linkmeta 		= get_post_meta( get_the_ID(), 'link', true);
?>

<li class="cv-item">
    <?php

    echo '<span class="cv-item-title">';

        if ($linkmeta) {
        	echo '<a href="' . $linkmeta . '" target="_blank">' . get_the_title() . '</a>';
        } else {
        	the_title();
    	}
    echo '</span>';
    echo '<span class="cv-item-description">';

        if ( $locationmeta ) {
            echo '</span>';
            echo '<i class="location">' . $locationmeta . "</i>";
        };

        echo ', <span class="cv-item-date">' . get_the_date('Y') . '</span>';

	echo '</span>';
    ?>
</li>