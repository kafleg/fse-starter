<?php
/**
* FSE Starter functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package WordPress
*
*/

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 */
function fse_starter_theme_support() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Custom background color.
    add_theme_support(
        'custom-background',
        array(
            'default-color' => 'f5efe0',
        )
    );

    // Set content-width.
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 580;
    }

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // Set post thumbnail size.
    set_post_thumbnail_size( 1200, 9999 );

    // Add custom image size used in Cover Template.
    add_image_size( 'fse-starter-fullscreen', 1980, 9999 );

    // Custom logo.
    $logo_width  = 120;
    $logo_height = 90;

    // If the retina setting is active, double the recommended width and height.
    if ( get_theme_mod( 'retina_logo', false ) ) {
        $logo_width  = floor( $logo_width * 2 );
        $logo_height = floor( $logo_height * 2 );
    }

    add_theme_support(
        'custom-logo',
        array(
            'height'      => $logo_height,
            'width'       => $logo_width,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
            'navigation-widgets',
        )
    );

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on FSE Starter, use a find and replace
     * to change 'fse-starter' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'fse-starter' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'fse_starter_theme_support' );