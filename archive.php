<?get_header()?>

<?get_template_part("navbar")?>

<?php if ( have_posts() ) : ?>

    <div class="post-header" style="background-color: #607d8b;height: 250px">
        <div class="content">
            <h1>
            <?php
            if ( is_day() ) :
                printf( __( 'بایگانی روزانه %s', 'PUI-WP' ), get_the_date() );
            elseif ( is_month() ) :
                printf( __( 'بایگانی ماهانه %s', 'PUI-WP' ), get_the_date( _x( 'F Y', 'فرمت بایگانی ماهانه', 'PUI-WP' ) ) );
            elseif ( is_year() ) :
                printf( __( 'بایگانی سالانه %s', 'PUI-WP' ), get_the_date( _x( 'Y', 'فرمت بایگانی سالانه', 'PUI-WP' ) ) );
            else :
                _e( 'بایگانی', 'PUI-WP' );
            endif;
            ?>
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="pui-col xs-8">
                <div class="chip">
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
            // Previous/next page navigation.
        else :
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
        endif;
        ?>
</div>
    </div>
<?get_template_part("left-sidebar")?>
        </div>
            </div>
<?php
get_footer();
