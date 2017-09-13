<?get_header()?>
<?get_template_part("landing-header")?>
<div class="container main-text">
    <div class="row">
        <?php
        if (!empty(get_option('about-us_url')) OR !empty(get_option('call-us_url'))) :
        ?>
          <div class="pui-col xs-12 md-8 md-offset-2">
          <ul class="index_links">
              <?php if (!empty(get_option('about-us_url'))) : ?>
            <li><a href="<?= get_option('about-us_url'); ?>" class="index_links_li_a"><i class="material-icons">info_outline</i> درباره ما</a></li>
                <?php endif;
            if (!empty(get_option('call-us_url'))) : ?>
            <li><a href="<?= get_option('call-us_url'); ?>" class="index_links_li_a"><i class="material-icons">call</i> تماس با ما</a></li>
            <?php endif; ?>
          </ul>
        </div>
        <?php endif; if (!empty(get_option('about-us_text'))) : ?>
        <div class="pui-col xs-12">
          <div class="pui-col xs-12 md-12">
              <h3>ما که هستیم؟</h3>
            <div class="chip">
              <p class="muted-txt">
                  <?= get_option('about-us_text'); ?>
              </p>
            </div>
          </div>
        </div>
    <?php endif;?>
        <div class="pui-col xs-12 md-12">
            <!--            <div class="chip">-->
            <?
            $the_query = new WP_Query( 'post_type=portfolio&posts_per_page=4' );
if ( $the_query->have_posts() ) :
    ?>
    <h3>آخرین نمونه کار ها</h3>
    <?
            while ($the_query -> have_posts()) : $the_query -> the_post();
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
                        <a class="btn primary" href="<?=get_post_meta( get_the_ID(), 'projLink', true )?>">مشاهده</a>
                        <a class="btn secondary" href="<?the_permalink()?>">توضیحات بیشتر</a>
                    </div>
                </div>
            <? endwhile;?>
    <? endif;?>
            <!--            </div>-->
        </div>
    </div>
</div>
<?php if ( have_posts() ) : ?>
    <div class="container main-text">
    <div class="row">
    <div class="pui-col xs-12">
        <h3>آخرین مطالب</h3>
        <?
        $max_post = get_option('max_post_index');
        $args = "posts_per_page=$max_post";
        $the_query = new WP_Query( $args );
        while ($the_query -> have_posts()) : $the_query -> the_post();
            ?>
        <div class="pui-col xs-12 sm-6 md-4 lg-3" id="post-<?the_ID()?>">
            <div class="card hover-effect">
                <?php if ( has_post_thumbnail()) :  ?>
                    <? the_post_thumbnail(null, ['class' => 'head']);?>
                <?php else: ?>
                    <img src="<?=get_template_directory_uri()?>/assets/image/no-thumbnail.png" class="head">
                <?php endif; ?>
                <div class="body">
                    <a href="<?the_permalink()?>" class="pui-link no-after"><h5><?the_title()?></h5></a>
                    <p class="muted-txt">
                        <?the_excerpt()?>
                    </p>
                </div>
                <div class="footer">
                    <i class="material-icons">date_range</i>
                    <span class="post-details-time"><?the_date('G:i j/n/Y')?></span>
<!--                    <span class="post-details-time">--><?//= WPTime_get_post_time_ago();?><!--</span>-->
                    <a class="btn primary sm post-continue simple" href="<?the_permalink()?>">ادامه مطلب</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
    </div>
    </div>
<?php endif; ?>
<?php
$params = array('posts_per_page' => 4, 'post_type' => 'product');
$the_query = new WP_Query($params);
if ($the_query->have_posts()) : ?>
    <div class="container main-text">
        <div class="row">
            <div class="pui-col xs-12 md-12">
    <h3>آخرین محصولات فروشگاه</h3>
    <?php
    while ($the_query -> have_posts()) : $the_query -> the_post();
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
                    <i class="material-icons">credit_card</i>
                        <?= ToFa($product->get_price(),0) . ' ' . get_woocommerce_currency_symbol(); ?>
                </p>
            </div>
            <div class="footer" style="text-align: center">
                <form class="cart" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->id); ?>">
                    <button class="btn primary" type="submit"><?php echo $product->single_add_to_cart_text(); ?></button>
                </form>
                <a class="btn secondary" href="<?the_permalink()?>">توضیحات بیشتر</a>
            </div>
        </div>
    <? endwhile;?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?get_footer()?>