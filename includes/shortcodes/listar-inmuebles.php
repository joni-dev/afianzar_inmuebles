<?php 

 function listar_inmuebles ($atts) {
     
    ob_start();
    include __DIR__.'/templates/inmuebles-template.php';
    return  ob_get_clean();
 }
 add_shortcode('archive_inmuebles', 'listar_inmuebles'); 
