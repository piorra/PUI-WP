<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <title><?php
                global $page, $paged;
                wp_title( '|', true, 'right' );
                // Add the blog name.
                bloginfo( 'name' );
                // Add the blog description for the home/front page.
                $site_description = get_bloginfo( 'description', 'display' );
                if ( $site_description && ( is_home() || is_front_page() ) )
                    echo " | $site_description";
                // Add a page number if necessary:
                if ( $paged >= 2 || $page >= 2 )
                    echo ' | ' . sprintf('صفحه %s', max( $paged, $page ) );
            ?></title>
        <link rel="stylesheet" media="screen" type="text/css" href="<?bloginfo('stylesheet_url')?>">
        <? if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
        <link rel="alternate" type="appliction/rss+xml" href="<? bloginfo('rss2_url'); ?>" title="<? printf(__( 'آخرین مطالب %s', 'mytheme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" >
        <link rel="alternate" type="appliction/rss+xml" href="<? bloginfo('comments_rss2_url'); ?>" title="<? printf(__( 'آخرین نظرات %s', 'mytheme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" >
        <link rel="pingback" href="<? bloginfo('pingback_url'); ?>" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
        <meta name="theme-color" content="#00bcd4">
        <?// wp_footer();?>
    </head>
    <body <? body_class(); ?>>