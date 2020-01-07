<?php

// Child Theme Styles
function my_theme_enqueue_styles()
{

    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

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
function twentytwenty_sidebar_registration_child_theme() {

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
				'name'        => __( 'Rodapé - 3', 'twentytwentychild' ),
				'id'          => 'sidebar-home',
				'description' => __( 'Widgets que vão aparecer na Home.', 'twentytwentychild' ),
			)
		)
	);
}

add_action( 'widgets_init', 'twentytwenty_sidebar_registration_child_theme' );

// Include SVG mime_type
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

//Customized Sections at Customization

function mytheme_customize_register( $wp_customize ) {

    // Contact Section

    $wp_customize->add_section( 'contact_section' , array(
        'title'      => __( 'Contato', 'twentytwentychild' ),
        'priority'   => 30,
    ));

        $wp_customize->add_setting( 'cidade_pais', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'cidade_pais_customize',
                array(
                    'label'      => __( 'Cidade e País', 'twentytwentychild' ),
                    'section'    => 'contact_section',
                    'settings'   => 'cidade_pais',
                    'priority'   => 1
                )
            )
        );

        
        $wp_customize->add_setting( 'endereco', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'endereco_customize',
                array(
                    'label'      => __( 'Endereço', 'twentytwentychild' ),
                    'section'    => 'contact_section',
                    'settings'   => 'endereco',
                    'priority'   => 1
                )
            )
        );

        $wp_customize->add_setting( 'fone', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'fone_customize',
                array(
                    'label'      => __( 'Fone', 'twentytwentychild' ),
                    'section'    => 'contact_section',
                    'settings'   => 'fone',
                    'priority'   => 1
                )
            )
        );
        $wp_customize->add_setting( 'email', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'email_customize',
                array(
                    'label'      => __( 'E-mail', 'twentytwentychild' ),
                    'section'    => 'contact_section',
                    'settings'   => 'email',
                    'priority'   => 1
                )
            )
        );
        // Social Section
        $wp_customize->add_section( 'social_section' , array(
            'title'      => __( 'Social', 'twentytwentychild' ),
            'priority'   => 30,
        ));
    
        $wp_customize->add_setting( 'social_1-logo', array());
        $wp_customize->add_control( new WP_Customize_Media_Control(
            $wp_customize,
            'social_1-logo_customize',
                array(
                    'label'      => __( 'Rede Social 1 - Logo', 'twentytwentychild' ),
                    'section'    => 'social_section',
                    'settings'   => 'social_1-logo',
                    'mime_type' => 'image/svg+xml',
                    'priority'   => 1
                )
            )
        );
        $wp_customize->add_setting( 'social_1-link', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'social_1-link_customize',
                array(
                    'label'      => __( 'Rede Social 1 - Link', 'twentytwentychild' ),
                    'section'    => 'social_section',
                    'settings'   => 'social_1-link',
                    'priority'   => 1
                )
            )
        );
        $wp_customize->add_setting( 'social_2-logo', array());
        $wp_customize->add_control( new WP_Customize_Media_Control(
            $wp_customize,
            'social_2-logo_customize',
                array(
                    'label'      => __( 'Rede Social 2 - Logo', 'twentytwentychild' ),
                    'section'    => 'social_section',
                    'settings'   => 'social_2-logo',
                    'mime_type' => 'image/svg+xml',
                    'priority'   => 1
                )
            )
        );
        $wp_customize->add_setting( 'social_2-link', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'social_2-link_customize',
                array(
                    'label'      => __( 'Rede Social 2 - Link', 'twentytwentychild' ),
                    'section'    => 'social_section',
                    'settings'   => 'social_2-link',
                    'priority'   => 1
                )
            )
        );
          // Home
          $wp_customize->add_section( 'home_section' , array(
            'title'      => __( 'Home', 'twentytwentychild' ),
            'priority'   => 30,
        ));
    
        $wp_customize->add_setting( 'perfil_image', array());
        $wp_customize->add_control( new WP_Customize_Media_Control(
            $wp_customize,
            'perfil_image_customize',
                array(
                    'label'      => __( 'Perfil - Imagem', 'twentytwentychild' ),
                    'section'    => 'home_section',
                    'settings'   => 'perfil_image',
                    'mime_type' => 'image',
                    'priority'   => 1
                )
            )
        );
}
add_action( 'customize_register', 'mytheme_customize_register' );