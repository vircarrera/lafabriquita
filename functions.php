<?php

//MENUS
function register_my_menus() {
    register_nav_menus(
      array(
        'menutop' => __( 'Menú superior' ), 
        'menuredes' => __( 'Menú de redes' ),
        'menuredesfooter' => __( 'Menú de redes del pie' ),
        'menulegal' => __( 'Menú legal' )
      )
    );
  }
add_action( 'init', 'register_my_menus' );  

// ZONA WIDGETS PIE
if(function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'          => 'Pie',
        'id'            => 'pie',
        'before_widget' => '<div id="%1$s" class="pie__widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="pie__titulos">',
        'after_title'   => '</h3>'
    ));
}

//EXTRACTO
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// ELIPSIS
function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//IMAGEN DESTACADA
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' ); }

//NUEVO CROP
add_image_size( 'medioalto', 600, 999, false );

// //TODOS LOS VINCULOS CSS Y JS

// //
// CSS & JS Loading for Google Fonts
//
// function wpb_add_google_fonts()
// {
//     wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Dosis:wght@400;600;700&family=Raleway:wght@600;700;900&display=swap', false);
    
// }
// add_action('wp_enqueue_scripts', 'wpb_add_google_fonts');

// COSAS PARA ESTILOS
function wps_deregister_styles()
{
	wp_dequeue_style('wp-block-library');
}
add_action('wp_print_styles', 'wps_deregister_styles', 100);

function load_css_js()
{
	wp_enqueue_style('mariavirsheet', get_stylesheet_uri(), false, NULL, 'all');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/js/vendor/fancybox/fancybox.css', false, NULL, 'all');
	wp_enqueue_style('flickity', get_template_directory_uri() . '/js/vendor/flickity/flickity.css', false, NULL, 'all');
	wp_enqueue_style('aos', get_template_directory_uri() . '/js/vendor/aos/aos.css', false, NULL, 'all');
	
	wp_deregister_script('wp-embed');

	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', NULL, NULL, true);
	wp_enqueue_script('jquery');

    // wp_register_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js' , NULL, NULL, true );
    // wp_enqueue_script('recaptcha');

	// wp_register_script('aos', get_template_directory_uri() . '/js/vendor/aos/aos.js', NULL, NULL, true);
	// wp_enqueue_script('aos');

	wp_register_script('carousels', get_template_directory_uri() . '/js/carousels.js', array('jquery'), NULL, false);
	wp_enqueue_script('carousels');

	wp_register_script('flickity', get_template_directory_uri() . '/js/vendor/flickity/flickity.js', NULL, NULL, true);
	wp_enqueue_script('flickity');

	wp_register_script('flickity-lazyload', get_template_directory_uri() . '/js/vendor/flickity/bg-lazyload.js', NULL, NULL, true);
	wp_enqueue_script('flickity-lazyload');

	wp_register_script('fancybox', get_template_directory_uri() . '/js/vendor/fancybox/fancybox.js', NULL, NULL, true);
	wp_enqueue_script('fancybox');

	wp_register_script('functions', get_template_directory_uri() . '/js/functions.js', NULL, NULL, true);
	wp_enqueue_script('functions');

    wp_register_script('base', get_template_directory_uri() . '/js/base.js', NULL, NULL, true);
	wp_enqueue_script('base');

}
add_action('wp_enqueue_scripts', 'load_css_js');


// Librería Lighbox
function bps_scripts_lightbox() {
    wp_enqueue_script('lightbox-js', '//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js', array('jquery'));
    wp_enqueue_style('lightbox-css', '//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css');
    }
add_action('wp_enqueue_scripts', 'bps_scripts_lightbox');

// Comentarios
// FORMULARIO DE ACCESO A COMENTARIOS
function campos_formulario( $fields) {

    //Variables necesarias básicas como que el email es obligatorio
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	
    // campos por defecto del formulario que vamos a introducir con nuestros cambios
    $fields = array(
		
    // NOMBRE
    'author' =>
	'<input id="author" placeholder="Nombre" 
	class="nombre" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . 
	'" size="30"' . $aria_req . ' />',

    // EMAIL
    'email' =>
	'<input id="email" placeholder="Email" 
	class="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
	);
	
	return $fields;
    }
    add_filter('comment_form_default_fields', 'campos_formulario');
    
//COPYRIGHT
function display_copyright( $iYear = null, $szSeparator = " - ", $szTail = '. Todos los derechos reservados.' )
{echo '<div class="copyright">' . display_years( $iYear, $szSeparator, false ) . ' &copy; ' . get_bloginfo('name') . $szTail . '</div>';}
function display_years( $iYear = null, $szSeparator = " - ", $bPrint = true )
{
$iCurrentYear = ( date( "Y" ) );
if ( is_int( $iYear ) )
{$iYear = ( $iCurrentYear > $iYear ) ? $iYear = $iYear . $szSeparator . $iCurrentYear : $iYear;
} else {
$iYear = $iCurrentYear;}
if ( $bPrint == true ) echo $iYear; else return $iYear;
}
/*function add_google_analytics() {
    echo '<script src="https://www.google-analytics.com/ga.js" type="text/javascript"></script>';
    echo '<script type="text/javascript">';
    echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
    echo 'pageTracker._trackPageview();';
    echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');*/

function bps_cookie_script () {
?>

<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
window.cookieconsent_options = {"message":"Típico aviso de cookies. Si sigues navegando significa que aceptas su uso.","dismiss":"¡Genial!","learnMore":"Más info","link":"https://www.terapiascontextuales.com/cookies/","theme":"dark-bottom"};
</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->

<?php
}
add_action('wp_head', 'bps_cookie_script');
  
/* ACF Configuration */

if (function_exists('acf_add_options_page')) {
    $option_page = acf_add_options_page(array(
        'page_title' 	=> 'Opciones',
        'menu_title' 	=> 'Opciones',
    ));
}

// añadir ACF a menú item
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
        $imagendemuestras = get_field('imagen_de_muestras', $item);
        $linkalapagina = get_field('link_a_la_pagina', $item);
		
        
		// append icon
        	
		if( $imagendemuestras ) {
			$item->title .= ' <a href="'.$linkalapagina['url']. '"><img src="' .$imagendemuestras['url']. '"></a> <a class="cta cta-granate" href="' .$linkalapagina['url']. '">' .$linkalapagina['title']. '</a>';
        }
		
	}
	
	// return
	return $items;
	
}

// obtener lista de etiquetas de custom post type
function get_terms_per_post_type( $taxonomies, $args=array() ) {
    //Parse $args in case its a query string.
    $args = wp_parse_args($args);

    if( !empty( $args['post_type'] ) ){

        $args['post_type'] = (array)$args['post_type'];

        add_filter( 'terms_clauses', function ( $pieces, $tax, $args){
            global $wpdb;

            //Don't use db count
            $pieces['fields'] .= ", COUNT(*) AS count_type" ;

            //Join extra tables to restrict by post type.
            $pieces['join'] .= " INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id 
                                 INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id ";

            //Restrict by post type and Group by term_id for COUNTing.
            $post_type = implode( ',', $args['post_type'] );
            $pieces['where'] .= $wpdb->prepare( " AND p.post_type IN(%s) GROUP BY t.term_id", $post_type );

            remove_filter( current_filter(), __FUNCTION__ );

            return $pieces;

        }, 10, 3 );

    }

    return get_terms($taxonomies, $args);           
}

// tener en cuenta los custom post types en el buscador
function wpse28145_add_custom_types( $query ) {
    if( is_tag() && $query->is_main_query() ) {

        // this gets all post types:
        $post_types = get_post_types();

        // alternately, you can add just specific post types using this line instead of the above:
        // $post_types = array( 'post', 'your_custom_type' );

        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'wpse28145_add_custom_types' );

/* Custom post types */

if ( ! function_exists('cpt_blog') ) {

    // Register Custom Post Type
    function cpt_blog() {
    
        $labels = array(
            'name'                  => _x( 'Blog', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Entrada del blog', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Entradas del blog', 'text_domain' ),
            'name_admin_bar'        => __( 'Entrada del blog', 'text_domain' ),
            'archives'              => __( 'Archivo de entradas del blog', 'text_domain' ),
            'attributes'            => __( 'Atributos de entrada del blog', 'text_domain' ),
            'parent_item_colon'     => __( 'Entrada del blog padre', 'text_domain' ),
            'all_items'             => __( 'Todas las entradas del blog', 'text_domain' ),
            'add_new_item'          => __( 'Añadir nueva entrada del blog', 'text_domain' ),
            'add_new'               => __( 'Añadir nueva', 'text_domain' ),
            'new_item'              => __( 'Nueva entrada del blog', 'text_domain' ),
            'edit_item'             => __( 'Editar entrada del blog', 'text_domain' ),
            'update_item'           => __( 'Actualizar entrada del blog', 'text_domain' ),
            'view_item'             => __( 'Ver entrada del blog', 'text_domain' ),
            'view_items'            => __( 'Ver entradas del blog', 'text_domain' ),
            'search_items'          => __( 'Buscar entradas del blog', 'text_domain' ),
            'not_found'             => __( 'No encontrada', 'text_domain' ),
            'not_found_in_trash'    => __( 'No encontrada en la papelera', 'text_domain' ),
            'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
            'set_featured_image'    => __( 'Configurar imagen destacada', 'text_domain' ),
            'remove_featured_image' => __( 'Borrar imagen destacada', 'text_domain' ),
            'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
            'insert_into_item'      => __( 'Insertar en la entrada del blog', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Actualizar en esta entrada del blog', 'text_domain' ),
            'items_list'            => __( 'Listado de entradas del blog', 'text_domain' ),
            'items_list_navigation' => __( 'Lista navegable de entradas del blog', 'text_domain' ),
            'filter_items_list'     => __( 'Filtro de entradas del blog', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'Entrada del blog', 'text_domain' ),
            'description'           => __( 'Entradas del blog', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'post-formats' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-align-left',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'blog', $args );
    
    }
    add_action( 'init', 'cpt_blog', 0 );
    
}

if ( ! function_exists('cpt_noticias') ) {

    // Register Custom Post Type
    function cpt_noticias() {
    
        $labels = array(
            'name'                  => _x( 'Noticias', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Entrada de noticias', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Entradas de noticias', 'text_domain' ),
            'name_admin_bar'        => __( 'Entradas de noticias', 'text_domain' ),
            'archives'              => __( 'Archivo de entradas de noticias', 'text_domain' ),
            'attributes'            => __( 'Atributos de entrada de noticias', 'text_domain' ),
            'parent_item_colon'     => __( 'Entrada de noticias padre', 'text_domain' ),
            'all_items'             => __( 'Todas las entradas de noticias', 'text_domain' ),
            'add_new_item'          => __( 'Añadir nueva entrada de noticias', 'text_domain' ),
            'add_new'               => __( 'Añadir nueva', 'text_domain' ),
            'new_item'              => __( 'Nueva entrada de noticias', 'text_domain' ),
            'edit_item'             => __( 'Editar entrada de noticias', 'text_domain' ),
            'update_item'           => __( 'Actualizar entrada de noticias', 'text_domain' ),
            'view_item'             => __( 'Ver entrada de noticias', 'text_domain' ),
            'view_items'            => __( 'Ver entradas de noticias', 'text_domain' ),
            'search_items'          => __( 'Buscar entrada de noticias', 'text_domain' ),
            'not_found'             => __( 'No encontrada', 'text_domain' ),
            'not_found_in_trash'    => __( 'No encontrada en la papelera', 'text_domain' ),
            'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
            'set_featured_image'    => __( 'Configurar imagen destacada', 'text_domain' ),
            'remove_featured_image' => __( 'Borrar imagen destacada', 'text_domain' ),
            'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
            'insert_into_item'      => __( 'Insertar en la entrada de noticias', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Actualizar en esta entrada de noticias', 'text_domain' ),
            'items_list'            => __( 'Listado de entradas de noticias', 'text_domain' ),
            'items_list_navigation' => __( 'Lista navegable de entradas de noticias', 'text_domain' ),
            'filter_items_list'     => __( 'Filtro de entradas de noticias', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'Entrada de noticias', 'text_domain' ),
            'description'           => __( 'Entradas de noticias', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'post-formats' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-cover-image',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'noticias', $args );
    
    }
    add_action( 'init', 'cpt_noticias', 0 );
    
}

if ( ! function_exists('cpt_slider') ) {

    // Register Custom Post Type
    function cpt_slider() {
    
        $labels = array(
            'name'                  => _x( 'Diapositivas del slider', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Diapositiva del slider', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Diapositivas del slider', 'text_domain' ),
            'name_admin_bar'        => __( 'Diapositiva del slider', 'text_domain' ),
            'archives'              => __( 'Archivo de diapositivas del slider', 'text_domain' ),
            'attributes'            => __( 'Atributos de diapositivas del slider', 'text_domain' ),
            'parent_item_colon'     => __( 'Diapositiva del slider padre', 'text_domain' ),
            'all_items'             => __( 'Todas las diapositivas del slider', 'text_domain' ),
            'add_new_item'          => __( 'Añadir nueva diapositiva del slider', 'text_domain' ),
            'add_new'               => __( 'Añadir nueva', 'text_domain' ),
            'new_item'              => __( 'Nueva diapositiva del slider', 'text_domain' ),
            'edit_item'             => __( 'Editar diapositiva del slider', 'text_domain' ),
            'update_item'           => __( 'Actualizar diapositiva del slider', 'text_domain' ),
            'view_item'             => __( 'Ver diapositiva del slider', 'text_domain' ),
            'view_items'            => __( 'Ver diapositivas del slider', 'text_domain' ),
            'search_items'          => __( 'Buscar diapositivas del slider', 'text_domain' ),
            'not_found'             => __( 'No encontrada', 'text_domain' ),
            'not_found_in_trash'    => __( 'No encontrada en la papelera', 'text_domain' ),
            'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
            'set_featured_image'    => __( 'Configurar imagen destacada', 'text_domain' ),
            'remove_featured_image' => __( 'Borrar imagen destacada', 'text_domain' ),
            'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
            'insert_into_item'      => __( 'Insertar en la diapositiva del slider', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Actualizar en esta diapositiva del slider', 'text_domain' ),
            'items_list'            => __( 'Listado de diapositivas del slider', 'text_domain' ),
            'items_list_navigation' => __( 'Lista navegable de diapositivas del slider', 'text_domain' ),
            'filter_items_list'     => __( 'Filtro de diapositivas del slider', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'Diapositiva del slider', 'text_domain' ),
            'description'           => __( 'Diapositivas del slider', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-images-alt2',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'slider', $args );
    
    }
    add_action( 'init', 'cpt_slider', 0 );
    
}


if ( ! function_exists('faq') ) {

    // Register Custom Post Type
    function faq() {
    
        $labels = array(
            'name'                  => _x( 'Preguntas', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Pregunta', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'FAQ', 'text_domain' ),
            'name_admin_bar'        => __( 'Pregunta', 'text_domain' ),
            'archives'              => __( 'Archivo de preguntas', 'text_domain' ),
            'attributes'            => __( 'Atributos de pregunta', 'text_domain' ),
            'parent_item_colon'     => __( 'Entrada de preguntas padre', 'text_domain' ),
            'all_items'             => __( 'Todas las preguntas', 'text_domain' ),
            'add_new_item'          => __( 'Añadir nueva pregunta', 'text_domain' ),
            'add_new'               => __( 'Añadir nueva', 'text_domain' ),
            'new_item'              => __( 'Nueva entrada pregunta', 'text_domain' ),
            'edit_item'             => __( 'Editar pregunta', 'text_domain' ),
            'update_item'           => __( 'Actualizar pregunta', 'text_domain' ),
            'view_item'             => __( 'Ver pregunta', 'text_domain' ),
            'view_items'            => __( 'Ver preguntas', 'text_domain' ),
            'search_items'          => __( 'Buscar preguntas', 'text_domain' ),
            'not_found'             => __( 'No encontrada', 'text_domain' ),
            'not_found_in_trash'    => __( 'No encontrada en la papelera', 'text_domain' ),
            'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
            'set_featured_image'    => __( 'Configurar imagen destacada', 'text_domain' ),
            'remove_featured_image' => __( 'Borrar imagen destacada', 'text_domain' ),
            'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
            'insert_into_item'      => __( 'Insertar en la pregunta', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Actualizar en esta pregunta', 'text_domain' ),
            'items_list'            => __( 'Listado de preguntas', 'text_domain' ),
            'items_list_navigation' => __( 'Lista navegable de preguntas', 'text_domain' ),
            'filter_items_list'     => __( 'Filtro de preguntas', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'Preguntas', 'text_domain' ),
            'description'           => __( 'FAQ', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'post-formats' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-format-status',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'faq', $args );
    
    }
    add_action( 'init', 'faq', 0 );
    
}


?>

