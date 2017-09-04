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
      <div class="labels">
        <label class="lbl green"><i class="material-icons">account_circle</i>نویسنده
          <? the_author() ?></label>
        <label class="lbl blue"><i class="material-icons">access_time</i>
          <? the_date('G:i j/n/Y') ?></label>
<!--          --><?//=  WPTime_get_post_time_ago() ?><!--</label>-->
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
          <? the_content();  if (has_tag()) :?>
          <div class="left-align">
            <label class="lbl primary" id="tags"><? the_tags('برچسب ها : # ', ' ، # ', '');?></label>
          </div>
            <?php
//for use in the loop, list 5 post titles related to first tag on current post
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
              $first_tag = $tags[0]->term_id;
              $args=array(
                  'tag__in' => array($first_tag),
                  'post__not_in' => array($post->ID),
                  'showposts'=>5,
                  'caller_get_posts'=>1
              );
              $my_query = new WP_Query($args);
              if( $my_query->have_posts() ) :
                ?>
                  <br>
                  <h3>مطالب مرتبط</h3>
                  <?
                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                  <div class="card hover-effect pui-col md-3">
                    <div class="body">
                      <a href="<?the_permalink()?>" class="pui-link no-after"><h5><?the_title()?></h5></a>
                      <p class="muted-txt">
                        <?the_excerpt()?>
                      </p>
                    </div>
                    <div class="footer">
                      <a class="btn secondary sm post-continue" rel="bookmark" title="<? the_title_attribute(); ?>" href="<?the_permalink()?>">خواندن مطلب</a>
                    </div>
                  </div>
                  <?php
                endwhile;
                endif;
            }
            ?>
          <? endif; ?>
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
  <? endif; ?>
  <?get_footer()?>