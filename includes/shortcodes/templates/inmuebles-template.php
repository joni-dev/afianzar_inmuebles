<?php

    extract(shortcode_atts(array(
        'post_id' => '0',
    ), $atts));

    // get attibutes and set defaults
    extract(shortcode_atts(array(
        'estado' => 'No especificado',
), $atts));

    $estado_inmueble = $estado;
    $args = array(
        'post_type'=> 'inmueble',
	);

    if( $estado_inmueble != 'No especificado' )      
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'estado', // Nombre de la taxonomía.
                'field'    => 'slug',
                'terms'    => $estado_inmueble , // El slug de la categoría a filtrar
            )
            );
   


    $template_content= new WP_Query( $args );
    
    if ( $template_content->have_posts() ) :
        while ( $template_content->have_posts() ) : $template_content->the_post(); 
        $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size ='full' );
        $terms = get_the_terms( get_the_ID(), 'estado' );
        if ($terms){
            foreach ( $terms as $term ) {
                $tag = $term->name;
            }
            if ( $tag == 'Disponible'){
                $tag_class = 'disponible-inmueble';
            }
            if ( $tag == 'Reservado'){
                $tag_class = 'reservado-inmueble';
            }
            if ( $tag == 'Alerta Inmueble'){
                $tag_class = 'alerta-inmueble';
            }
        }
    else{
        $tag_class= "";
    }

?>    			        
           <div class="card-espacio">
			   <div class="card-espacio-container" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size:cover;">
                   <p class="precio">$ <?php the_field('valor_alquiler');?></p>
                    <div class="card-espacio-info">
                        <h1><a href="<?php the_permalink() ?>"> <?php the_title()?></a></h1>
                        <p class="<?php echo $tag_class?>"><?php echo $tag ?></p>
				   </div>
			   </div>            
            </div>

        <?php endwhile;
    endif;
    wp_reset_postdata();
?>