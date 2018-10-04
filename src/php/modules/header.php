<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
        <?php wp_title(''); ?>
        <?php if(wp_title('', false)) { echo ' |'; } ?>
        <?php bloginfo('name'); ?>
    </title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
        (function(doc, classToAdd){
            doc.className = (doc.className).replace("no-js", classToAdd);
        })(document.documentElement, "js");
    </script>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="headerwrapper">
            <h1 class="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
            <nav class="site-nav">
                <a class="menubutton">&#9776;</a>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'sitenav',
                    'container' => '',
                    'depth' => 1
                )); ?>
            </nav>
        </div>
    </header>