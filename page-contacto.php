<?php /* Template Name: Contacto */ ?>

<?php get_header(); ?>


<section class="b-featured contacto">
    
    <?php
        /* variables para cada imagen */
        $full = get_the_post_thumbnail_url(get_the_ID(),'full');
        $large = get_the_post_thumbnail_url(get_the_ID(),'large');/*1000*/
        $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
        $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');/*350*/
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');/*150*/
        
    ?>
    <picture class="e-featured">
        <source media="(min-width: 768px)" srcset="<?php echo esc_url($full); ?>">
        <source media="(min-width: 322px)" srcset="<?php echo esc_url($full); ?>">
        <img src="<?php echo esc_url($medioalto); ?>">
    </picture>

    <div class="container w-663">
        <h1 class="h1"><?php wp_title('', true, 'right') ?></h1>
        <div class="e-separador"></div>
        <p><?php the_content(); ?></p>
    </div>

    <div class="clip-inferior beige">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>    
</section>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php 
    $titulodatoscontacto = get_field('titulo_datos_contacto');
    $contenidodatoscontacto = get_field('contenido_datos_contacto');
    $imagenwhatsapp = get_field('imagen_whatsapp');
    $contenidodatoswhatsapp = get_field('contenido_datos_whatsapp');
    $form = get_field('shortcode_formulario');
    if($form) :
    ?>
        <div class="c-formulario"> 
            <div class="container w-663">   
                <?php echo $form ?>
            </div>
        </div>
    <?php endif; ?>
    
    
    <div class="b-contacto datos">
        <div class="clip-inferior beige-franjas2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="container w-663">
            <div class="flex">
                <?php if ($titulodatoscontacto) : ?>
                    <h2 class="e-title"><?php echo $titulodatoscontacto; ?></h2>
                <?php endif; if ($contenidodatoscontacto) : ?>
                    <p class="e-description"><?php echo $contenidodatoscontacto; ?></p>
                <?php endif; ?>
            </div>
            <div class="e-separador"></div>
            <div class="flex whatsapp">
                <?php if ($imagenwhatsapp) : ?>
                    <div class="e-figure"><?php echo $imagenwhatsapp; ?></div>
                <?php endif; if ($contenidodatoswhatsapp) : ?>
                    <p><?php echo $contenidodatoswhatsapp; ?></p>
                <?php endif; ?>   
            </div>
        </div>
    </div>

<?php endwhile; endif;?>

<?php get_footer(); ?>