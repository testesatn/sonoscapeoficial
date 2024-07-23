<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
//require_once get_template_directory() . '/core/classes/class-shortcodes-menu.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
// require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';
// require_once get_template_directory() . '/core/classes/class-post-status.php';
//require_once get_template_directory() . '/core/classes/class-term-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since 2.2.0
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
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
		 * Enable support for custom logo.
		 *
		 *  @since Odin 2.2.10
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since 2.2.0
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since 2.2.0
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since 2.2.0
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );
	wp_enqueue_style( 'info', $template_url . '/assets/css/server.css', array(), null, 'all' );


	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Html5Shiv
	wp_enqueue_script( 'html5shiv', $template_url . '/assets/js/html5.js' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// General scripts.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		// Bootstrap.
		wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

		// FitVids.
		wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

		// Main jQuery.
		wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );
	} else {
		// Grunt main file with Bootstrap, FitVids and others libs.
		wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );
	}

	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Query WooCommerce activation
 *
 * @since  2.2.6
 *
 * @return boolean
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	add_theme_support( 'woocommerce' );
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
}


function show_site_name_shortcode() {
    return get_bloginfo('name');
}
add_shortcode('site-name', 'show_site_name_shortcode');


// Função para registrar a taxonomia "marca"
function registrar_taxonomia_marca() {
    $labels = array(
        'name' => 'Marcas',
        'singular_name' => 'Marca',
        'menu_name' => 'Marcas',
        'all_items' => 'Todas as Marcas',
        'edit_item' => 'Editar Marca',
        'view_item' => 'Ver Marca',
        'update_item' => 'Atualizar Marca',
        'add_new_item' => 'Adicionar Nova Marca',
        'new_item_name' => 'Nome da Nova Marca',
        'search_items' => 'Pesquisar Marcas',
        'popular_items' => 'Marcas Populares',
        'add_or_remove_items' => 'Adicionar ou Remover Marcas',
        'choose_from_most_used' => 'Escolher entre as Marcas mais Usadas',
        'not_found' => 'Nenhuma marca encontrada',
    );

    $args = array(
		'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true, // Mostrar coluna de administração
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );

    register_taxonomy('marca', 'post', $args);
}
add_action('init', 'registrar_taxonomia_marca');



function registrar_taxonomia_tipo() {
    $labels = array(
        'name' => 'Tipos',
        'singular_name' => 'Tipo',
        'menu_name' => 'Tipos',
        'all_items' => 'Todas as Tipos',
        'edit_item' => 'Editar Tipo',
        'view_item' => 'Ver Tipo',
        'update_item' => 'Atualizar Tipo',
        'add_new_item' => 'Adicionar Nova Tipo',
        'new_item_name' => 'Nome da Nova Tipo',
        'search_items' => 'Pesquisar Tipos',
        'popular_items' => 'Tipos Populares',
        'add_or_remove_items' => 'Adicionar ou Remover Tipos',
        'choose_from_most_used' => 'Escolher entre as Tipos mais Usadas',
        'not_found' => 'Nenhuma Tipo encontrada',
    );

    $args = array(
		'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true, // Mostrar coluna de administração
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );

    register_taxonomy('tipo', 'post', $args);
}
add_action('init', 'registrar_taxonomia_tipo');


/*
function auto_categorizar_fontes_existing_posts() {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    );
    
    $posts = get_posts($args);
    
    foreach ($posts as $post) {
        $post_id = $post->ID;
        $titulo = $post->post_title;
    
        $termos = array(
			"X150",
			"P300",
			"CV70",
			"X300",
			"REDWOOD",
			"JUNIPER",
			"SEQUOIA 512",    
			"S3000",
			"S2000",
			"SC2000",    
			"S1000", 
			"X600",    
			"NX2",    
			"P500",
			"G50",    
			"G40",    
			"G60S",
			"G20",   
			"ANTARES",    
			"PRIMA",    
			"ALEGRA",
			"ADARA",    
			"SIENNA",
        );
    
        $termos_encontrados = array();
    
        foreach ($termos as $termo) {
            if (stripos($titulo, $termo) !== false) {
                $termos_encontrados[] = $termo;
            }
        }
    
        if (!empty($termos_encontrados)) {
            wp_set_post_terms($post_id, $termos_encontrados, 'marca', true);
        }
    }
}
add_action('init', 'auto_categorizar_fontes_existing_posts'); 
*/





function adicionar_imagem_sitemaps($images, $post_id) {
    // Obter os termos da taxonomia "tipo"
    $terms_tipo = get_the_terms($post_id, 'tipo');

    // Obter os termos da taxonomia "marca"
    $terms_marca = get_the_terms($post_id, 'marca');

    // Inicializar a variável de URL da imagem
    $image_url = '';

    // Verificar se há termos de taxonomia
    if ($terms_tipo && !is_wp_error($terms_tipo) && $terms_marca && !is_wp_error($terms_marca)) {
        // Obter o slug do tipo do post atual
        $tipo_slug = sanitize_title_with_dashes($terms_tipo[0]->name);

        // Obter o slug da marca do post atual
        $marca_slug = sanitize_title_with_dashes($terms_marca[0]->name);

        $imageName = strtoupper($tipo_slug . '-' . $marca_slug);
        $imagePath = get_template_directory() . '/assets/images/prod/' . $imageName . '.jpg';

        if (file_exists($imagePath)) {
            $imageURL = get_template_directory_uri() . '/assets/images/prod/' . $imageName . '.jpg';
            
            // Defina os detalhes da imagem para retornar
            $image_details = array(
                'src' => $imageURL,
                'alt' => get_the_title($post_id), // Atributo "alt" da imagem
            );

            // Adicione os detalhes da imagem ao array de imagens
            $images[] = $image_details;
        }
    }

    return $images;
}
add_filter('wpseo_sitemap_urlimages', 'adicionar_imagem_sitemaps', 10, 2);










