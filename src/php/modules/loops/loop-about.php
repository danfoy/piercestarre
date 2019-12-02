<?php
$locationmeta 	= get_post_meta( get_the_ID(), 'location', true);
$linkmeta 		= get_post_meta( get_the_ID(), 'link', true);
$permalink      = get_the_permalink( get_the_ID() );
$content        = get_the_content();
?>

<li class="cv-item">
    <?php

    echo '<span class="cv-item-title">';

        if ($content || $linkmeta) {
            if ($linkmeta) {
                $thelink = $linkmeta;
            }
            else {
                $thelink = $permalink;
            }
        	echo '<a href="' . $thelink . '" target="_blank">' . get_the_title() . '</a>';
        } else {
        	the_title();
    	}
    echo '</span>';
    echo '<span class="cv-item-description">';

        if ( $locationmeta ) {
            echo '<i class="cv-item-description-location">' . $locationmeta . "</i>";
            echo '</span>';
        };

        echo ', <span class="cv-item-date">' . get_the_date('Y') . '</span>';

	echo '</span>';
    ?>
</li>
