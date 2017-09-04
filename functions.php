<?php
//*************************************//
#Main Functions
//*************************************//

function eget_option($req) {
    echo get_option($req);
}

function ToFa($number , $type ) {
    if ($type == 0) {
        return str_replace(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0), array('۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰'), $number);
    } else if ($type == 1) {
        return str_replace(array('one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'zero'), array('یک', 'دو', 'سه', 'چهار', 'پنج', 'شش', 'هفت', 'هشت', 'ته', 'ده', 'صفر'), $number);
    } else if ($type == 2) {
        return str_replace(array('واحد', 'اثنان', 'ثلاثة', 'أربعة', 'خمسة', 'ستّة', 'سبعة', 'ثمانیة', 'تسعة', 'عشرة', 'صفر'), array('یک', 'دو', 'سه', 'چهار', 'پنج', 'شش', 'هفت', 'هشت', 'نه', 'ده', 'صفر'), $number);
    } else if ($type == 3) {
        return str_replace(array('١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩', '٠'), array('۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰'), $number);
    }
}

function break_text($text){
    $length = 300;
    if(strlen($text)<$length+10) return $text;//don't cut if too short
    $break_pos = strpos($text, ' ', $length);//find next space after desired length
    $visible = substr($text, 0, $break_pos);
    return balanceTags($visible) . "…";
}


//*************************************//
#ohter
//*************************************//


//Cut excerpt text
add_filter("the_excerpt", "break_text");


//Activate the Link Manager built in to the WordPress admin
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

//*************************************//
#Supports
//*************************************//

//Woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//Thumbnail
add_theme_support('post-thumbnails');
// Set post image size
add_image_size('thumb-size', 150, 150);

//*************************************//
#Time ago Functions
//*************************************//

function WPTime_get_post_time_ago(){
    global $post;
    return human_time_diff( get_post_time('U', false, $post->ID), current_time('timestamp') )." قبل";
}


//*************************************//
#Navigation bar
//*************************************//

register_nav_menu( 'primary', 'منوی اصلی' );

//*************************************//
#Template Settings
//*************************************//

function add_theme_menu_item() {
    add_menu_page("تنظیمات قالب پیورا", "تنظیمات قالب پیورا", "manage_options", "theme-panel", "theme_settings_page", null, 60);
}

add_action("admin_menu", "add_theme_menu_item");

function theme_settings_page() {
    ?>
    <div class="wrap">
        <h1>تنظیمات</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
function display_telegram_element () {
    ?>
<input placeholder="تلگرام" name="telegram_url" value="<?= get_option('telegram_url'); ?>">
<?
}
function display_about_element () {
    ?>
    <input placeholder="لینک درباره ما" name="about-us_url" type="url" value="<?php echo get_option('about-us_url'); ?>">
    <?
}
function display_call_element () {
    ?>
    <input placeholder="لینک تماس با ما" name="call-us_url" type="url" value="<?php echo get_option('call-us_url'); ?>">
    <?
}
function display_max_post_index () {
    ?>
    <input placeholder="حداکثر پست ها در صفحه اصلی" name="max_post_index" type="number" value="<?php echo get_option('max_post_index'); ?>">
    <?
}
function display_password_protect_excerpt_text () {
    ?>
    <input placeholder="متن خلاصه مطلب رمز دار" name="password_protect_excerpt_text" type="text" value="<?php echo get_option('password_protect_excerpt_text'); ?>">
    <?
}
function display_show_pp () {
    ?>
    <input id="display_show_pp" placeholder="نمایش مطالب رمز دار در سایت" name="show_pp" type="checkbox">
    <?
    if (get_option('show_pp')) { ?>
        <script>
            document.getElementById("display_show_pp").click();
        </script>
        <?php
    }
}
function display_about_text_element () {
    ?>
    <textarea name="about-us_text" rows="8" cols="30" placeholder="متن درباره ما">
        <?= get_option('about-us_text'); ?>
    </textarea>
    <?
}
function display_footer_text() {
    ?>
    <input placeholder="متن فوتر پیشخوان وردپرس" name="footer_text" type="text" value="<?php echo get_option('footer_text'); ?>">
    <?
}
function display_site_logo() {
    ?>
    <input placeholder="آدرس لوگو سایت" name="site_logo" type="url" value="<?php echo get_option('site_logo'); ?>">
    <?
}
function display_theme_panel_fields() {
    add_settings_section("section", null, null, "theme-options");
    add_settings_field("telegram_url", "لینک تلگرام", "display_telegram_element", "theme-options", "section");
    add_settings_field("about-us_url", "لینک درباره ما", "display_about_element", "theme-options", "section");
    add_settings_field("call-us_text", "لینک تماس با ما", "display_call_element", "theme-options", "section");
    add_settings_field("about-us_text", "متن درباره ما", "display_about_text_element", "theme-options", "section");
    add_settings_field("password_protect_excerpt_text", "متن خلاصه مطلب رمز دار", "display_password_protect_excerpt_text", "theme-options", "section");
    add_settings_field("show_pp", "نمایش مطالب رمز دار در سایت", "display_show_pp", "theme-options", "section");
    add_settings_field("max_post_index", "حداکثر پست ها در صفحه اصلی", "display_max_post_index", "theme-options", "section");
    add_settings_field("footer_text", "متن فوتر پیشخوان وردپرس", "display_footer_text", "theme-options", "section");
    add_settings_field("site_logo", "لوگو سایت", "display_site_logo", "theme-options", "section");
    register_setting("section", "telegram_url");
    register_setting("section", "about-us_url");
    register_setting("section", "call-us_url");
    register_setting("section", "about-us_text");
    register_setting("section", "password_protect_excerpt_text");
    register_setting("section", "show_pp");
    register_setting("section", "max_post_index");
    register_setting("section", "footer_text");
    register_setting("section", "site_logo");
}
add_action("admin_init", "display_theme_panel_fields");

//*************************************//
#Template Setting Default
//*************************************//

//add_action( 'after_setup_theme', 'default_setting' );
function default_setting() {
    register_setting("section","about-us_text",array("default"=>"یک وبسایت دیگر با استفاده از قالب پیورا"));
    register_setting("section","password_protect_excerpt_text" ,array("default"=>"این مطلب با رمز عبور محافظت شده است"));
    register_setting("section", "max_post_index",array("default"=>8));
    register_setting("section", "footer_text",array("default"=>"ممنونیم که از قالب پیورا استفاده کردید :)"));
}

//*************************************//
#Wocommere Styles
//*************************************//

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}
// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//*************************************//
#Posts Password
//*************************************//

function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "برای مشاهده رمز عبور مطلب را وارد کنید" ) . ' <div class="pui-input">
    <input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20"><span class="bar" />
    </div>
    <button type="submit" name="Submit" class="btn primary" >مشاهده</button>
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );
if (!get_option('show_pp')) {
//Filter to hide protected posts
function exclude_protected($where) {
    global $wpdb;
    return $where .= " AND {$wpdb->posts}.post_password = '' ";
}
// Decide where to display them
function exclude_protected_action($query) {
    if( !is_single() && !is_page() && !is_admin() ) {
        add_filter( 'posts_where', 'exclude_protected' );
    }
}
// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');
}
function my_excerpt_protected( $excerpt ) {
    if ( post_password_required() ) $excerpt = '<em>'.eget_option('password_protect_excerpt_text').'</em>';
    return $excerpt;
}
add_filter( 'the_excerpt', 'my_excerpt_protected' );

//*************************************//
#Author Related Posts
//*************************************//

function author_related_posts() {
    global $authordata, $post;
    $authors_posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 5 ) );
    $output = '<ul>';
    foreach ( $authors_posts as $authors_post ) {
        $output .= '<li><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></li>';
    }
    $output .= '</ul>';
    return $output;
}

//*************************************//
#Sidebar
//*************************************//

if(function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'ستون سمت چپ',
        'description' => __( 'ستون سمت جپ'),
        'before_widget' => '<div class="block">',
        'before_title' => '<h4 class="block-title">',
        'after_title' => '</h4> <div>',
        'after_widget' => '</div></div>'
    ));

}

//*************************************//
#Footer Text
//*************************************//

function remove_footer_admin () {
    echo get_option('footer_text');
}
add_filter('admin_footer_text', 'remove_footer_admin');

//*************************************//
#Login Custom Logo
//*************************************//

function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_option('site_logo').') !important; }
    </style>';
}

//*************************************//
#Admin Custom Logo
//*************************************//

add_action('login_head', 'custom_login_logo');

function custom_admin_logo() {
    echo '<style type="text/css">
          .ab-icon { background-image:url('.get_option('site_logo').') !important;}
        </style>';
}
add_action('admin_head', 'custom_admin_logo');

//*************************************//
#Editor Buttons
//*************************************//

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {
    $style_formats = array(
        array(
            'title' => 'دکمه اصلی',
            'block' => 'a',
            'classes' => 'btn primary',
            'wrapper' => true,

        ),
        array(
            'title' => 'دکمه مکمل',
            'block' => 'a',
            'classes' => 'btn secondary',
            'wrapper' => true,
        ),
        array(
            'title' => 'دکمه زرد',
            'block' => 'a',
            'classes' => 'btn yellow',
            'wrapper' => true,
        ),
        array(
            'title' => 'دکمه آبی',
            'block' => 'a',
            'classes' => 'btn blue',
            'wrapper' => true,
        ),
        array(
            'title' => 'دکمه سبز',
            'block' => 'a',
            'classes' => 'btn green',
            'wrapper' => true,
        ),
        array(
            'title' => 'دکمه طوسی',
            'block' => 'a',
            'classes' => 'btn gray',
            'wrapper' => true,
        ),
        array(
            'title' => 'دکمه سفید',
            'block' => 'a',
            'classes' => 'btn white',
            'wrapper' => true,
        ),
    );
    $init_array['style_formats'] = json_encode( $style_formats );
    return $init_array;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

add_editor_style('assets/css/dashboard-style.css');

add_action( 'wp_enqueue_scripts', 'register_piorra_styles' );

function register_piorra_styles() {
    wp_register_style( 'piorra-dashboard',  TEMPLATPATH . 'assets/css/dashboard-style.css' );
    wp_enqueue_style( 'piorra-dashboard' );
}
//*************************************//
#Portfolio
//*************************************//

add_action('init', 'portfolio_register');

function portfolio_register() {
    $args = array(
        'label' => __('نمونه کارها'),
        'singular_name' => __('Project'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type( 'portfolio' , $args );

    register_taxonomy("project-type", array("portfolio"), array("hierarchical" => true, "label" => "دسته بندی نمونه کارها", "singular_label" => "دسته بندی نمونه کارها", "rewrite" => true));
}

add_action("admin_init", "portfolio_meta_box");

function portfolio_meta_box(){
    add_meta_box("projInfo-meta", "لینک نمونه کار", "portfolio_meta_options", "portfolio", "side", "low");
}
function portfolio_meta_options(){
    global $post;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
    $custom = get_post_custom($post->ID);
    $link = $custom["projLink"][0];
?>
    <label>لینک:</label><input placeholder="لینک پروژه" name="projLink" value="<?php echo $link; ?>" />
    <?php
    }

add_action('save_post', 'save_project_link');

function save_project_link(){
    global $post;

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return $post_id;
    }else{
        update_post_meta($post->ID, "projLink", $_POST["projLink"]);
    }
}

?>