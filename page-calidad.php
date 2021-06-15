<?php /* Template Name: Calidad */ ?>

<?php get_header(); ?>

<?php 
    $logo = get_field('hoja_calidad');
    $subtitulo = get_field('subtitulo');
    $imagencalidaduno = get_field('imagen_calidad_1');
    $titulocalidaduno = get_field('titulo_calidad_1');
    $parrafocalidaduno = get_field('parrafo_calidad_1');
    $imagencalidaddos = get_field('imagen_calidad_2');
    $titulocalidaddos = get_field('titulo_calidad_2');
    $parrafocalidaddos = get_field('parrafo_calidad_2');
    $imagencalidadtres = get_field('imagen_calidad_3');
    $titulocalidadtres = get_field('titulo_calidad_3');
    $parrafocalidadtres = get_field('parrafo_calidad_3');
    $imagencalidadcuatro = get_field('imagen_calidad_4');
    $titulocalidadcuatro = get_field('titulo_calidad_4');
    $parrafocalidadcuatro = get_field('parrafo_calidad_4');
    $imagencalidadcinco = get_field('imagen_calidad_5');
    $titulocalidadcinco = get_field('titulo_calidad_5');
    $parrafocalidadcinco = get_field('parrafo_calidad_5');
    $imagencalidadseis = get_field('imagen_calidad_6');
    $titulocalidadseis = get_field('titulo_calidad_6');
    $parrafocalidadseis = get_field('parrafo_calidad_6');
    $imagencalidadsiete = get_field('imagen_calidad_7');
    $titulocalidadsiete = get_field('titulo_calidad_7');
    $parrafocalidadsiete = get_field('parrafo_calidad_7');
    $imagencalidadocho = get_field('imagen_calidad_8');
    $titulocalidadocho = get_field('titulo_calidad_8');
    $parrafocalidadocho = get_field('parrafo_calidad_8');
    ?>

<div class="wrapper">

    <section class="b-featured calidad clip-inferior beige">
        <?php 
            $args = array(
                'post_type' => 'page', 
                'p' => 17
            );
                
            $query0 = new WP_Query($args);
            if( $query0->have_posts() ) : while ($query0->have_posts()) : $query0->the_post();
        
            /* variables para cada imagen */
            $full = get_the_post_thumbnail_url(get_the_ID(),'full');
            $large = get_the_post_thumbnail_url(get_the_ID(),'large');/*1000*/
            $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
            $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');/*350*/
            $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');/*150*/
            
        ?>
        <picture class="e-featured">
            <source media="(min-width: 992px)" srcset="<?php echo esc_url($full); ?>">
            <img src="<?php echo esc_url($large); ?>">
        </picture>
                <?php 
            endwhile;
        endif; ?>
        <div class="b-plantas">
            <div class="e-planta --uno">
                <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/rama_cacao.svg">
            </div>
            <div class="e-planta --dos">
                <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/rama_cacao.svg">
            </div>
        </div>
        <div class="wrapper-texto">
            <div class="container">
                <?php if($logo) : ?>
                <div>
                    <img src="<?php echo $logo; ?>">
                </div>
                <?php endif; 
                    if($subtitulo) : 
                ?>
                    <h2 class="e-title-calidad"><?php echo $subtitulo; ?></h2>
                <?php endif; ?>    
                    <h1 class="e-title-calidad"><?php the_title(); ?></h1>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </section>

<div class="background">
        <section class="c-intro">
            <div class="b-plantas out">
                <div class="e-planta --tres">
                    <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/rama_cacao.svg">
                </div>
                <div class="e-planta --cuatro">
                    <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/rama_cacao.svg">
                </div>
            </div>

            <div class="container w-940">
                <?php the_content(); ?>
                <?php $intro = get_field('intro_calidad'); if($intro) : ?>
                    <p class="e-intro"><?php echo $intro; ?></p>
                <?php endif; ?> 
            </div>

            <div class="clip-inferior beige-franjas calidad">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
        </section>

        <section class="c-calidad">

            <div class="container w-1200">
                <?php 
                    if($imagencalidaduno) : 
                ?>
                <div class="b-calidad --uno">
                    <figure>
                        <img src="<?php echo $imagencalidaduno; ?>">
                    </figure>
                    <?php if($titulocalidaduno) : ?><h3 class="h3 big"><?php echo $titulocalidaduno; ?></h3><?php endif; ?>
                    <?php if($parrafocalidaduno) : ?><p><?php echo $parrafocalidaduno; ?></p><?php endif; ?>
                </div>
                <?php 
                    endif;
                    if($imagencalidaddos) : 
                ?>
                <div class="b-calidad --dos">
                    <figure>
                        <img src="<?php echo $imagencalidaddos; ?>">
                    </figure>
                    <?php if($titulocalidaddos) : ?><h3 class="h3 big"><?php echo $titulocalidaddos; ?></h3><?php endif; ?>
                    <?php if($parrafocalidaddos) : ?><p><?php echo $parrafocalidaddos; ?></p><?php endif; ?>
                </div>
                <?php 
                    endif;
                    if($imagencalidadtres) : 
                ?>
                <div class="b-calidad --tres">
                    <figure>
                        <img src="<?php echo $imagencalidadtres; ?>">
                    </figure>
                    <?php if($titulocalidadtres) : ?><h3 class="h3 big"><?php echo $titulocalidadtres; ?></h3><?php endif; ?>
                    <?php if($parrafocalidadtres) : ?><p><?php echo $parrafocalidadtres; ?></p><?php endif; ?>
                </div>
                <?php 
                    endif;
                    if($imagencalidadcuatro) : 
                ?>
                <div class="b-calidad --cuatro">
                    <figure>
                        <img src="<?php echo $imagencalidadcuatro; ?>">
                    </figure>
                    <?php if($titulocalidadcuatro) : ?><h3 class="h3 big"><?php echo $titulocalidadcuatro; ?></h3><?php endif; ?>
                    <?php if($parrafocalidadcuatro) : ?><p><?php echo $parrafocalidadcuatro; ?></p><?php endif; ?>
                </div>
                <?php 
                    endif;
                    if($imagencalidadcinco) : 
                ?>
                <div class="b-calidad --cinco">
                    <figure>
                        <img src="<?php echo $imagencalidadcinco; ?>">
                    </figure>
                    <?php if($titulocalidadcinco) : ?><h3 class="h3 big"><?php echo $titulocalidadcinco; ?></h3><?php endif; ?>
                    <?php if($parrafocalidadcinco) : ?><p><?php echo $parrafocalidadcinco; ?></p><?php endif; ?>
                </div>
                <?php 
                    endif;
                    if($imagencalidadseis) : 
                ?>
                <div class="b-calidad --seis">
                    <figure>
                        <img src="<?php echo $imagencalidadseis; ?>">
                    </figure>
                    <?php if($titulocalidadseis) : ?><h3 class="h3 big"><?php echo $titulocalidadseis; ?></h3><?php endif; ?>
                    <?php if($parrafocalidadseis) : ?><p><?php echo $parrafocalidadseis; ?></p><?php endif; ?>
                </div>
                <?php 
                    endif;
                    if($imagencalidadsiete) : 
                ?>
                <div class="b-calidad --siete">
                    <figure>
                        <img src="<?php echo $imagencalidadsiete; ?>">
                    </figure>
                    <?php if($titulocalidadsiete) : ?><h3 class="h3 big"><?php echo $titulocalidadsiete; ?></h3><?php endif; ?>
                    <?php if($parrafocalidadsiete) : ?><p><?php echo $parrafocalidadsiete; ?></p><?php endif; ?>
                </div>
                <?php 
                    endif;
                    if($imagencalidadocho) : 
                ?>
                <div class="b-calidad --ocho">
                    <figure>
                        <img src="<?php echo $imagencalidadocho; ?>">
                    </figure>
                    <?php if($titulocalidadocho) : ?><h3 class="h3 big"><?php echo $titulocalidadocho; ?></h3><?php endif; ?>
                    <?php if($parrafocalidadocho) : ?><p><?php echo $parrafocalidadocho; ?></p><?php endif; ?>
                </div>
                <?php 
                    endif;
                ?>
            </div>
        </section>
</div>
</div>
<?php get_footer(); ?>