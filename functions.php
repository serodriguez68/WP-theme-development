<?php 

// Las funciones tiene name spacing para evitar conflictos
	// e.g wpt_nombre_funcion(){}
	// wpt puede ser reemplazado por lo que sea

// WP no muestra menus por default en el admin area, esto hace que aparezcan.
add_theme_support( 'menus' );
// Habilita el uso de featured images.
add_theme_support( 'post-thumbnails' );

// Modifica el comportamiento por default de la longitud del excerpt.
function wpt_excerpt_length( $length ) {
	return 16;
}
// Le dice a WP que cuando define el expertp_length, use wpt_excerpt_length al final final del proces (en la posición 999)
	// Para sobreescribir cualquier cosa que pase antes
add_filter( 'excerpt_length', 'wpt_excerpt_length', 999 );

// Le dice a WP que nuestro theme tiene áreas específicas para menú que las puede crear el usuario
function register_theme_menus() {

	// Acá se ponen todos los menus a registrar (cada entrada es un menu en un theme location). Si hubiera más de un menú, los otros se pondrían dentro del array.
		// e.g  'secondary-menu' => __( 'La locura de Menu', 'treehouse-portfolio' )
			// 'La locura de Menu' es el nombre que aparece en el Admin area para la configuración "Theme locations"
			// 'treehouse-portfolio' se conoce como text domain.  Está relacionado con un identificador único para el texto del argumento anterior
	register_nav_menus(
		array(
			'primary-menu' 	=> __( 'Primary Menu', 'treehouse-portfolio' )		)
	);

}
// Hook: ejecute registher_theme_menus cuado WP inicialica ('init')
add_action( 'init', 'register_theme_menus' );

// Código que permite crear widget areas

	// Helper funciton that help to creat a widget area (register_sidebar)
	// Este código es reutilizable y se puede hacer tweaks  para ajustar a nuestran necesidades
	// hace que aparezca la opción de widgets en el Admin area
function wpt_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="module-heading">',
		'after_title' => '</h2>'
	));

}

wpt_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
wpt_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );
// Fin código de widget areas


// Inserta los otros estilos 
	// wp_enqueue_style permite adicionar otras hojas de estilo
		// El órden de importación importa y la lógica es igual al de un sitio estático
	// argumento 1: handle name or short name
	// argumento 2: ruta hasta el archivo
		// get_template_directory_uri() devuelve la ruta desde el root hasta la carpeta de nuestro theme, esto se concatena  con la ruta done está el archivo que se está linkeando.

function wpt_theme_styles() {

	wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'foundation_css', get_template_directory_uri() . '/css/foundation.css' );
	wp_enqueue_style( 'googlefont_css', 'http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}

// Le dice a WP que cuando ejecute los scripts de enqueue, incluya wpt_theme_styles
	// wp_enqueu_scripts es un hook the WP para hacer esto.
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );

// Análogo a wpt_theme_styles
	// wp_enqueue_script: similar a wp_enqueue_style 
		// Argumento 1: handle name
		// Argumento 2: directorio
		// Argumento 3: Array of dependence (e.g foundation.js es dependiente de jquery, entonces primero carga jquery y luego foundation.js)
		// Argumento 4: Si queremos especificar una versión
		// Argumento 5: ¿Quere que éste script aparezca en el footer (true = aparece en el footer antes de que cierre el body; false = aparece en el head)

function wpt_theme_js() {

	wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.js', '', '', false );	
	wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'foundation_js'), '', true );		

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_js' );








?>