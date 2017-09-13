<?get_header()?>

<?get_template_part("navbar")?>
    <div class="post-header" style="background-color: #607d8b;height: 250px">
        <div class="content">
            <h1> مطالب برچسب <?=single_tag_title( '', false )?></h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="pui-col xs-8">
                <div class="chip">
<?php if ( have_posts() ) : ?>
        <?php if ( tag_description() ) : ?>
            <?php echo tag_description(); ?>
        <?php endif; ?>
    <?php
    while ( have_posts() ) : the_post();
        ?>
        <div class="chip pui-col md-3">
                    <?php if ( has_post_thumbnail()) :  ?>
            <? the_post_thumbnail(null, ['class' => 'head']);?>
        <?php else: ?>
            <img src="<?=get_template_directory_uri()?>/assets/image/no-thumbnail.png" class="head">
        <?php endif; ?>
        <div class="body">
            <h5><?the_title()?></h5>
            <p class="muted-txt">
                <?the_excerpt()?>
            </p>
        </div>
        <div class="footer" style="text-align: center">
            <a class="btn secondary simple" href="<?the_permalink()?>">مشاهده مطلب</a>
        </div>
        </div>
        <?php
    endwhile;
    ?>
<?php else : ?>
    مطلبی برای این برچسب پیدا نشد :(
<?php endif; ?>
                    </div>
                </div>
            <?get_template_part("left-sidebar")?>
            </div>
        </div>
<?get_footer()?>