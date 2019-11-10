<?php
/**
 * verum functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package verum
 */
define('VERSION', '1.0.0');
if (!function_exists('verum_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function verum_setup()
{
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on verum, use a find and replace
         * to change 'verum' to the name of your theme in all the template files.
         */
        load_theme_textdomain('verum', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'verum'),
        ));
        register_nav_menus(array(
            'footer-menu' => esc_html__('Footer', 'verum'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('verum_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
        add_theme_support('post-formats', array('aside', 'gallery', 'audio', 'video', 'link', 'quote'));
        add_image_size('verum_poster', 750, 99999);
        add_image_size('verum_medium', 300, 130, true);
        add_image_size('verum_small_poster', 425, 425, true);
        add_image_size('verum_about_img', 260, 157, true);
    }
endif;
add_action('after_setup_theme', 'verum_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function verum_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('verum_content_width', 640);
}
add_action('after_setup_theme', 'verum_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function verum_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Blog Sidebar', 'verum'),
        'id' => 'blog-sidebar',
        'description' => esc_html__('Blog Sidebar .', 'verum'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Header Left', 'verum'),
        'id' => 'header_left',
        'description' => esc_html__('Header  Left.', 'verum'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Top', 'verum'),
        'id' => 'footer_top',
        'description' => esc_html__('Footer Top .', 'verum'),
        'before_widget' => '<section id="%1$s" class=" %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__(' Footer Left', 'verum'),
        'id' => 'footer_left',
        'description' => esc_html__('Footer Left .', 'verum'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

}
add_action('widgets_init', 'verum_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function verum_scripts()
{

    wp_enqueue_script('verum-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('verum-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    wp_enqueue_style('verum-google-fonts', '//fonts.googleapis.com/css?family=Lora:400,400i,700|Playfair+Display:700');
    wp_enqueue_style('bootstrap-css', get_theme_file_uri('assets/vendor/bootstrap/css/bootstrap.min.css'));
    wp_enqueue_style('font-awesome-css', get_theme_file_uri('assets/vendor/font-awesome/css/font-awesome.min.css'));
    wp_enqueue_style('slicknav-css', get_theme_file_uri('assets/vendor/slicknav/slicknav.css'));
    wp_enqueue_style('owl-css', get_theme_file_uri('assets/vendor/owl/assets/owl.carousel.min.css'));
    wp_enqueue_style('owl-theme-css', get_theme_file_uri('assets/vendor/owl/assets/owl.theme.default.min.css'));
    wp_enqueue_style('magnific-popup-css', get_theme_file_uri('assets/vendor/magnific-popup/magnific-popup.css'));
    wp_enqueue_style('animate-css', get_theme_file_uri('assets/vendor/magnific-popup/magnific-popup.css'));
    wp_enqueue_style('justifiedGallery-css', get_theme_file_uri('assets/vendor/justifiedGallery/css/justifiedGallery.min.css'));
    wp_enqueue_style('verum-main-css', get_theme_file_uri('assets/css/main.css'));
    // wp_enqueue_style('verum-style-css', get_stylesheet_uri());
    wp_enqueue_script('popper-js', get_theme_file_uri('assets/vendor/popper.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('bootstrap-js', get_theme_file_uri('assets/vendor/bootstrap/js/bootstrap.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('imagesloaded-js', get_theme_file_uri('assets/vendor/imagesloaded.js'), null, VERSION, true);
    wp_enqueue_script('slicknav-js', get_theme_file_uri('assets/vendor/slicknav/jquery.slicknav.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('owl-carousel-js', get_theme_file_uri('assets/vendor/owl/owl.carousel.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('owl-carousel2-js', get_theme_file_uri('assets/vendor/owl/owl.carousel2.thumbs.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('magnific-popup-js', get_theme_file_uri('assets/vendor/magnific-popup/jquery.magnific-popup.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('justifiedGallery-js', get_theme_file_uri('assets/vendor/justifiedGallery/js/jquery.justifiedGallery.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('verum-main-js', get_theme_file_uri('assets/js/scripts.js'), array('jquery'), time(), true);
    $template_directory = get_template_directory_uri();
    wp_localize_script('verum-main-js', 'verum', array('template_path' => $template_directory));

}
add_action('wp_enqueue_scripts', 'verum_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/customizer/class-kirki-installer-section.php';
require get_template_directory() . '/customizer/main-config.php';
require get_template_directory() . '/customizer/banner-config.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}
function blog_sidber_check()
{
    if (is_active_sidebar('blog-sidebar')) {
        echo "col-lg-9 col-md-8 ";
    } else {
        echo "col-lg-12 col-md-12";
    }
}

function verum_piklist_part_process($part)
{
    global $post;
    if ($post && 'post' == $post->post_type && 'gallery.php' == $part['part']) {
        if (!in_array(get_post_format(), array('gallery'))) {
            return false;
        }
    }
    if ($post && 'post' == $post->post_type && 'audio-video.php' == $part['part']) {
        if (!in_array(get_post_format(), array('audio', 'video'))) {
            return false;
        }
    }
    return $part;
}
add_filter('piklist_part_process', 'verum_piklist_part_process');
add_filter('wp_calculate_image_srcset', '__return_false');

function verum_remove_thumnail_dimensions($html)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

add_filter('post_thumbnail_html', 'verum_remove_thumnail_dimensions');
function verum_comment_form_fields($fields)
{

    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'verum_comment_form_fields');
function varum_categories_list_fix($output)
{
    $output = str_replace("(", "", $output);
    $output = str_replace(")", "", $output);

    return $output;

}

add_filter('wp_list_categories', 'varum_categories_list_fix');
function verum_post_img_fixed()
{
    global $wp_query;
    $verum_current_post = $wp_query->current_post + 1;
    if ($verum_current_post % 5 == 1) {
        return "verum_poster";
    } else {
        return "verum_small_poster";
    }

}
function verum_highlight_results($text)
{
    if (is_search()) {
        $sr = get_query_var('s');
        $keys = explode(" ", $sr);
        $text = preg_replace('/(' . implode('|', $keys) . ')/iu', '<strong class="search-excerpt">' . $sr . '</strong>', $text);
    }
    return $text;
}
add_filter('the_excerpt', 'verum_highlight_results');
add_filter('the_title', 'verum_highlight_results');
