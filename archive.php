<?php
/*
Template Name: آرشیو
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
                        <?the_content()?>
                        <div class="pui-col md-6">
                            <h2>آرشیو ماهانه</h2>
                            <ul>
                                <?php wp_get_archives('type=monthly'); ?>
                            </ul>
                        </div>
                        <div class="pui-col md-6">
                            <h2>آرشیو سالانه</h2>
                            <ul>
                                <?php wp_get_archives('type=yearly'); ?>
                            </ul>
                        </div>
                        <div class="pui-col md-12">
                            <h2>دسته بندی ها</h2>
                            <ul>
                                <?php wp_list_categories(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="pui-col xs-4">
                    <div class="chip sm">
                        <? dynamic_sidebar('ستون سمت چپ'); ?>
                    </div>
                </div>
            </div>
        </div>
    <? endwhile; ?>
<? endif; ?>
<?get_footer()?>