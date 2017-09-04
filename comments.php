<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die(":|");
}
if ( post_password_required() ) { ?>
    <p class="nocomments">این مطلب با رمز عبور محافظت میشود.لطفا ابتدا رمز عبور را وارد کنید</p>
    <?php
    return;
}
?>
<?php if ( have_comments() ) : ?>
    <h2 class="h2comments">
        پاسخ ها <span class="badge"><?=ToFa(get_comment_count($post->ID)['approved'],0)?></span></h2>
    <ul class="commentlist">
        <?php wp_list_comments(''); ?>
    </ul>
<?php else : ?>
    <?php if ('open' == $post->comment_status) : ?>
    <?php else :  ?>
        <p class="nocomments">دیدگاه ها بسته شده اند.</p>
    <?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
    <div class="chip comment-send-from">
        <h2 id="commentsForm"><?php comment_form_title( 'فرستادن دیدگاه', 'فرستادن دیدگاه برای %s' ); ?></h2>
        <div class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link(); ?></small>
        </div>
        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            <p>شما باید <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">وارد شوید</a> تا بتوانید دیدگاهی ارسال کنید.</p>
        <?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <?php if ( $user_ID ) : ?>
                    <p>وارد شده با نام <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">خروج »</a></p>
                <?php else : ?>
                     <div class="pui-input">
                        <input type="text" placeholder="  نام<?php if ($req) echo "(لازم)"; ?>" required name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                        <span class="bar"></span>
                     </div>
                    <div class="pui-input">
                        <input type="email" placeholder="  ایمیل (نزد ما محفوظ است)<?php if ($req) echo "(لازم)"; ?>" required name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                        <span class="bar"></span>
                    </div>
                    <div class="pui-input">
                        <input type="url" placeholder="وبسایت (اختیاری)" required name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                        <span class="bar"></span>
                    </div>
                <?php endif; ?>
                <div class="pui-textarea">
                <textarea placeholder="دیدگاه شما" name="comment" id="comment" cols="100%" rows="10" tabindex="4" required></textarea>
                <span class="bar"></span>
                </div>
                <button class="btn secondary lg comment-send" name="submit" type="submit" id="submit" tabindex="5">فرستادن دیدگاه</button>
                    <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
        <?php endif;?>
    </div>
<?php endif;?>