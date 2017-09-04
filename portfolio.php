<?php
/* Template Name: نمونه کارها */
?>
<?get_header()?>

<?get_template_part("navbar")?>
<?php if ( have_posts() ) : ?>
    <? while ( have_posts() ) : the_post(); ?>
        <div class="content">
            <h1><?the_title()?></h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="pui-col xs-8">
                    <div class="chip">
                        <h2><?the_title()?></h2>
                        <?the_content()?>
        <?
        $the_query = new WP_Query( 'post_type=portfolio' );
        while ($the_query -> have_posts()) : $the_query -> the_post();
            ?>
                        <div class="chip pui-col md-3">
                            <?php if ( has_post_thumbnail()) :  ?>
                                <? the_post_thumbnail(null, ['class' => 'head']);?>
<!--                            --><?php //else: ?>
<!--                                <img src="--><?//=get_template_directory_uri()?><!--/assets/image/no-thumbnail.png" class="head">-->
                            <?php endif; ?>
                            <div class="body">
                                <h5><?the_title()?></h5>
                                <p class="muted-txt">
                                    <?the_excerpt()?>
                                </p>
                            </div>
                            <div class="footer" style="text-align: center">
                                <a class="btn primary" href="<?=get_post_meta( get_the_ID(), 'projLink', true )?>">مشاهده</a>
                                <a class="btn secondary" href="<?the_permalink()?>">توضیحات بیشتر</a>
                            </div>
                        </div>
        <? endwhile; ?>
                    </div>
                </div>
                <?get_template_part("left-sidebar")?>
            </div>
        </div>
    <? endwhile; ?>
<? endif; ?>
<?get_footer()?>