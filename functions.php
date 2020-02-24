<?php

/**
 * Ericson Scorsim Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Ericson_Scorsim
 * @since 1.0.0
 */


/*Child Theme Styles*/


function my_theme_enqueue_styles()
{

    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('bootstrapcss', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/fonts/fontawesome-free/css/all.css');
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

/* Remove inline styles*/
add_action('wp_enqueue_scripts', function () {
    $styles = wp_styles();
    $styles->add_data('twentytwenty-style', 'after', array());
}, 20);

//Scripts
function ericson_scorsim_scripts()
{
    //wp_enqueue_script('jquery',  get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', array(), '1.0.0', true);
    wp_enqueue_script('smooth-scrollbar',  get_stylesheet_directory_uri() . '/assets/js/smooth-scrollbar/smooth-scrollbar.js', array(), '1.0.0', true);
    wp_enqueue_script('jquery-scroll',  get_stylesheet_directory_uri() . '/assets/js/jquery.scrollintoview.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script('bootstrap',  get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script('ajax',  get_stylesheet_directory_uri() . '/assets/js/ajax.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script('mailchimp',  '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js', array( 'jquery' ), '1.0', true);
    wp_enqueue_script('main',  get_stylesheet_directory_uri() . '/main.js', array(), '1.0.0', true);

    
    wp_localize_script('ajax', 'ajaxSetting', array('ajaxurl' => admin_url('/admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'ericson_scorsim_scripts');

// DIY Popular Posts @ https://digwp.com/2016/03/diy-popular-posts/

// Conta os acessos dos posts e coloca o valor numa metakey popular_posts
function shapeSpace_popular_posts($post_id)
{
    $count_key = 'popular_posts';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

// Identifica o id do post e passa para a funçao que conta os posts
function shapeSpace_track_posts($post_id)
{
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    shapeSpace_popular_posts($post_id);
}

//Coloca no header o contador
add_action('wp_head', 'shapeSpace_track_posts');


// Coloca widget no rodapé

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentytwenty_sidebar_registration_child_theme()
{

    // Arguments used in all register_sidebar() calls.
    $shared_args = array(
        'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
        'after_title'   => '</h2>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget'  => '</div></div>',
    );

    // Footer #1.
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __('Rodapé - 3', 'twentytwenty'),
                'id'          => 'sidebar-home',
                'description' => __('Widgets que vão aparecer na Home.', 'twentytwenty'),
            )
        )
    );
}

add_action('widgets_init', 'twentytwenty_sidebar_registration_child_theme');

// Include SVG mime_type
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//Customized Sections at Customization

function mytheme_customize_register($wp_customize)
{

    // Mailchimp

    $wp_customize->add_section('mailchimp_section', array(
        'title'      => __('Mailchimp', 'twentytwenty'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('mailchimp_user', array(
        'type'           => 'theme_mod',
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'mailchimp_user',
            array(
                'label'      => __('Mailchimp - User ID', 'twentytwenty'),
                'section'    => 'mailchimp_section',
                'settings'   => 'mailchimp_user',
                'priority'   => 1
            )
        )
    );

    $wp_customize->add_setting('mailchimp_audience', array(
        'type'           => 'theme_mod',
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'mailchimp_audience',
            array(
                'label'      => __('Mailchimp - Audience ID', 'twentytwenty'),
                'section'    => 'mailchimp_section',
                'settings'   => 'mailchimp_audience',
                'priority'   => 1
            )
        )
    );

    // Contact Section

    $wp_customize->add_section('contact_section', array(
        'title'      => __('Contato', 'twentytwenty'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('cidade_pais', array());
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'cidade_pais_customize',
            array(
                'label'      => __('Cidade e País', 'twentytwenty'),
                'section'    => 'contact_section',
                'settings'   => 'cidade_pais',
                'priority'   => 1
            )
        )
    );


    $wp_customize->add_setting('endereco', array());
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'endereco_customize',
            array(
                'label'      => __('Endereço', 'twentytwenty'),
                'section'    => 'contact_section',
                'settings'   => 'endereco',
                'priority'   => 1
            )
        )
    );

    $wp_customize->add_setting('fone', array());
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'fone_customize',
            array(
                'label'      => __('Fone', 'twentytwenty'),
                'section'    => 'contact_section',
                'settings'   => 'fone',
                'priority'   => 1
            )
        )
    );
    $wp_customize->add_setting('email', array());
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'email_customize',
            array(
                'label'      => __('E-mail', 'twentytwenty'),
                'section'    => 'contact_section',
                'settings'   => 'email',
                'priority'   => 1
            )
        )
    );
    // Social Section
    $wp_customize->add_section('social_section', array(
        'title'      => __('Social', 'twentytwenty'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('social_1-link', array());
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'social_1-link_customize',
            array(
                'label'      => __('LinkedIn - Link', 'twentytwenty'),
                'section'    => 'social_section',
                'settings'   => 'social_1-link',
                'priority'   => 1
            )
        )
    );


    $wp_customize->add_setting('social_2-link', array());
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'social_2-link_customize',
            array(
                'label'      => __('Academia - Link', 'twentytwenty'),
                'section'    => 'social_section',
                'settings'   => 'social_2-link',
                'priority'   => 1
            )
        )
    );
    // Home
    $wp_customize->add_section('home_section', array(
        'title'      => __('Home', 'twentytwenty'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('perfil_image', array());
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'perfil_image_customize',
            array(
                'label'      => __('Perfil - Imagem', 'twentytwenty'),
                'section'    => 'home_section',
                'settings'   => 'perfil_image',
                'mime_type' => 'image',
                'priority'   => 1
            )
        )
    );
}
add_action('customize_register', 'mytheme_customize_register');

/*Admin bar*/

show_admin_bar(false);

// /*Show featured image in the administrative panel*/

// add_image_size('crunchify-admin-post-featured-image', 120, 120, false);

// /* Add the posts and pages columns filter. They can both use the same function.*/
// add_filter('manage_posts_columns', 'crunchify_add_post_admin_thumbnail_column', 2);
// add_filter('manage_pages_columns', 'crunchify_add_post_admin_thumbnail_column', 2);

// /* Add the column */
// function crunchify_add_post_admin_thumbnail_column($crunchify_columns)
// {
//     $crunchify_columns['crunchify_thumb'] = __('Featured Image');
//     return $crunchify_columns;
// }

// // Let's manage Post and Page Admin Panel Columns
// add_action('manage_posts_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);
// add_action('manage_pages_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);

// // Here we are grabbing featured-thumbnail size post thumbnail and displaying it
// function crunchify_show_post_thumbnail_column($crunchify_columns, $crunchify_id)
// {
//     switch ($crunchify_columns) {
//         case 'crunchify_thumb':
//             if (function_exists('the_post_thumbnail'))
//                 echo the_post_thumbnail('crunchify-admin-post-featured-image');
//             else
//                 echo 'hmm... your theme doesn\'t support featured image...';
//             break;
//     }
// }

/* Adds the favicon code snippet from RealFaviconGenerator */
add_action('wp_head', 'add_favicon');
    function add_favicon(){
    ?>
        <meta name="msapplication-confg" content="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/browserconfg.xml" />
        <link rel="manifest" href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/manifest.json">
        <link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/favicon.ico">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="48x48" href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/favicon-48x48.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/favicon-32x32.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/apple-touch-icon-180x180.png">      
    <?php
    };

/*Administrative Panel CSS*/

function admin_css()
{
    echo '
  <style>
 
  .editor-post-featured-image img, 
  .attachment-crunchify-admin-post-featured-image {
    object-fit: cover;
    width: 5em !important;
    height: 9em !important;
    margin: 0 auto;
}
  </style>';
}

add_action('admin_head', 'admin_css');


add_action( 'wp_ajax_ajax_filter', 'my_ajax_filter' );
add_action( 'wp_ajax_nopriv_ajax_filter', 'my_ajax_filter' );

function my_ajax_filter() {
   // Query Arguments

   $category = $_POST['category'];

   $args = array(
    'category_name' => $category,
    'posts_per_page'   => -1
);

// The Query
$ajaxposts = new WP_Query( $args );

$response = '';

// The Query
if ( $ajaxposts->have_posts() ) {
    while ( $ajaxposts->have_posts() ) {
        $ajaxposts->the_post();
        $response .= get_template_part('/template-parts/post-box');
    }
} else {
    $response .= _e('Tente pesquisar novamente procurando por outra palavra-chave ou navegue entre as categorias', 'ericsonscorsim');
}

echo $response;

exit; // leave ajax call
    die();
}

add_action( 'wp_ajax_ajax_search', 'my_ajax_search' );
add_action( 'wp_ajax_nopriv_ajax_search', 'my_ajax_search' );

function my_ajax_search() {
    // Query Arguments
 
    $search = $_POST['search'];
 
    $args = array(
     's' => $search,
     'post_type' => 'post',
     'posts_per_page'   => -1,
 );
 
 // The Query
 $ajaxposts = new WP_Query( $args );
 
 $response = '';
 
 // The Query
 if ( $ajaxposts->have_posts() ) {
     while ( $ajaxposts->have_posts() ) {
         $ajaxposts->the_post();
         $response .= get_template_part('/template-parts/post-box');
     }
 } else {
     $response .= 'Tente pesquisar novamente procurando por outra palavra-chave ou navegue entre as categorias';
 }
 
 echo $response;
 
 exit; // leave ajax call
     die();
 }

 /*Mime Type incluiding webp*/
 add_filter('upload_mimes', 'add_custom_mime_types');

function add_custom_mime_types($mimes) {
    return array_merge($mimes, array (
        'webp' => 'image/webp'
    ));
}

//Lazy Blocks

if ( function_exists( 'lazyblocks' ) ) :

    lazyblocks()->add_template( array(
        'id' => 1835,
        'title' => 'Páginas',
        'data' => array(
            'post_type' => 'page',
            'post_label' => 'Páginas',
            'template_lock' => '',
            'blocks' => array(
                array(
                    'name' => 'block-lab/accordion',
                ),
            ),
        ),
    ) );
    
endif;

//define( 'WP_DEBUG', true );