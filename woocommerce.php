<?get_header()?>

<?get_template_part("navbar")?>
    <? while ( woocommerce_content() ) : the_post(); ?>
        <?php if ( has_post_thumbnail()) :  ?>
            <div class="post-header" style="background-image: url(<?=get_the_post_thumbnail_url(get_the_ID())?>)">
        <?php else: ?>
            <div class="post-header" style="background-color: #607d8b;height: 250px">
        <?php endif; ?>
        <div class="content">
            <h1><?the_title()?></h1>
            <div class="labels">
                <label class="lbl green"><i class="material-icons">account_circle</i>نویسنده
                    <? the_author() ?></label>
                <label class="lbl blue"><i class="material-icons">access_time</i>
                    <? the_date('G:i j/n/Y') ?></label>
                <!--                        --><?//=  WPTime_get_post_time_ago() ?><!--</label>-->
            </div>
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
                        <? the_content(); ?>
                    </div>
                </div>
                <?get_template_part("left-sidebar")?>
            </div>
        </div>
    <?
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
    <? endwhile; ?>
<?get_footer()?>