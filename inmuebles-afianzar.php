<?php
/**
 * DEFINICIÓN DEL PLUGIN
 *
 * Descripción.
 *
 * @wordpress-plugin
 * Plugin Name:       Inmuebles Afianzar	
 * Description:       Listado de inmuebles para Afianzar Garantias S.A
 * Version:           0.2
 * Author:            Aurea Agency
 * Author URI:        https://aureaagency.com.ar
 *
 * 
 */



 //Incluyo la funcionalidad para listar inmuebles
require_once __DIR__ . '/includes/shortcodes/listar-inmuebles.php' ; 


//Le digo a wordpress dónde están mis estilos css
function encolar_scripts() {
	wp_enqueue_style( 'custom-styles', plugin_dir_url( __FILE__ ). '/public/css/afianzar-inmuebles-styles.css' );
    
}
add_action( 'wp_enqueue_scripts', 'encolar_scripts' );

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'inmuebles-thumb', 100, 100 ); //300 pixels wide (and unlimited height)

}

