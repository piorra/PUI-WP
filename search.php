<?get_header()?>
<?get_template_part("landing-header")?>
<div class="container">
    <div class="row">
        <div class="pui-col xs-12">
<?php
$s=get_search_query();
$args = array(
    's' =>$s
);
// The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
    ?>
        <h2>نتایج جستجو برای <?= get_query_var('s') ?></h2>
        <?php
    while ($the_query->have_posts()) :
        $the_query->the_post()
        ?>
        <div class="pui-col xs-12 sm-6 md-4 lg-3" id="post-<?the_ID()?>">
            <div class="card hover-effect">
                <?php if (has_post_thumbnail()) : ?>
                    <? the_post_thumbnail(null, ['class' => 'head']); ?>
                <?php else: ?>
                    <img src="<?= get_template_directory_uri() ?>/assets/image/no-thumbnail.png" class="head">
                <?php endif; ?>
                <div class="body">
                    <a href="<? the_permalink() ?>" class="pui-link no-after"><h5><? the_title() ?></h5></a>
                    <p class="muted-txt">
                        <? the_excerpt() ?>
                    </p>
                </div>
                <div class="footer">
                    <i class="material-icons">date_range</i>
                    <span class="post-details-time"><? the_date('G:i j/n/Y') ?></span>
                    <a class="btn primary sm post-continue" href="<? the_permalink() ?>">ادامه مطلب</a>
                </div>
            </div>
        </div>
        <?php
    endwhile;
}
else {
    ?>
    <h2>نتایج جستجو برای <?= get_query_var('s') ?></h2>
    <div class="pui-notifbox red animated">
        <button class="close material-icons" data-close="notifbox">close</button>
        <div class="main-icon material-icons">error_outline</div>
<!--        <div class="title">هشدار: </div>-->
        چیزی ای پیدا نشد :(
    </div>
<?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<?get_footer()?>
