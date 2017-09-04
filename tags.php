<?
/*
Template Name: برچسب ها
*/
?>
<?get_header()?>

<?get_template_part("navbar")?>
<?php if ( have_posts() ) : ?>
<? while ( have_posts() ) : the_post(); ?>
<?php if ( has_post_thumbnail()) :  ?>
<div class="post-header" style="background-image: url(<?=get_the_post_thumbnail_url(get_the_ID())?>),linear-gradient(to top, rgba(0,0,0,.5), transparent)">
    <?php else: ?>
    <div class="post-header" style="background-color: #607d8b;height: 250px">
        <?php endif; ?>
        <div class="content">
            <h1><?the_title()?></h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="pui-col xs-8">
                <div class="chip">
                    <?php if ( has_post_thumbnail()) :  ?>
                        <? the_post_thumbnail(null, ['class' => 'responsive img rounded image-post-center']);?>
                    <?php endif; ?>

                    <h2><?the_title()?></h2>
                    <?php wp_tag_cloud('number=0'); ?>

                </div>
            </div>
            <?get_template_part("left-sidebar")?>
        </div>
    </div>
    <? endwhile; ?>
    <? endif; ?>
    <?get_footer()?>
