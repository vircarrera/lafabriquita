<?php /* Template Name: Familia */ ?>
<?php get_header(); ?>

<section class="b-featured familia">
    <h1><?php single_cat_title(); ?></h1>
    <?php
        /* variables para cada imagen */
        $full = get_the_post_thumbnail_url(get_the_ID(),'full');
        $large = get_the_post_thumbnail_url(get_the_ID(),'large');/*1000*/
        $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
        $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');/*350*/
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');/*150*/
        $letteringcabecera = get_field('lettering_cabecera');  
        $letteringcabeceraurl = $letteringcabecera['url'];
        $letteringcabecerasize = 'full';
        $letteringcabecerasizes = 'large';
        $letteringcabecerathumb = $letteringcabecera['sizes'][ $letteringcabecerasize ];
        $letteringcabecerathumbs = $letteringcabecera['sizes'][ $letteringcabecerasizes ];
    ?>
    <div class="e-featured">
        <picture class="e-background">
            <source media="(min-width: 768px)" srcset="<?php echo esc_url($full); ?>">
            <img src="<?php echo esc_url($full); ?>">
        </picture>
        <?php if($letteringcabecera) : ?>
            <picture class="e-lettering">
                <source media="(min-width: 768px)" srcset="<?php echo esc_url($letteringcabecerathumb); ?>">
                <img src="<?php echo esc_url($letteringcabecerathumbs); ?>">    
            </picture>
        <?php endif; ?>
    </div>
    <div class="clip-inferior blanco familia">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>    
</section>

<section class="c-intro familia">
    <?php
    $descripcion = get_field('descripcion');
    $image = get_field('imagen');
    // Image variables.
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    // Thumbnail size attributes.
    $size = 'full';
    $sizeS = 'large';
    $thumb = $image['sizes'][ $size ];
    $thumbS = $image['sizes'][ $sizeS ];
    if($descripcion) : 
    ?>

    <p class="container w-663"><?php echo $descripcion?></p>

    <?php endif; 
    if($image) : 
    ?>

        <div class="container wood">
            <picture>
                <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumb); ?>">
                <img src="<?php echo esc_url($thumbS); ?>" alt="<?php echo esc_attr($alt); ?>" title="<?php echo esc_attr($title); ?>">                 
            </picture> 
        </div>
  
    <?php endif; ?>

</section>

<section class="c-productos familia">
    <?php 
    $intro_listado = get_field('intro_listado');
    if($intro_listado) :
    ?>
    <h2 class="h2 container w-663"> <?php echo $intro_listado ?></h2>
    <?php endif; ?>
    <div class="clip-inferior beige-franjas familia">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>    
    <div class="background">
        <div class="container w-940">

            <?php 
            $categoriadelafamilia = get_field('categoria_de_la_familia');
            if ($categoriadelafamilia) :

            $q = new WP_Query(array(
                'cat'=> $categoriadelafamilia,
                'post_type'=>'any')
            );

            while($q->have_posts()): $q->the_post();

            /* variables para cada imagen */
            $full = get_the_post_thumbnail_url(get_the_ID(),'full');
            $large = get_the_post_thumbnail_url(get_the_ID(),'large');/*1000*/
            $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
            $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');/*350*/
            $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');/*150*/

            ?>

                <div class="b-producto">
                    <picture>
                        <source media="(min-width:768px)" srcset="<?php echo esc_url($medioalto); ?>">
                        <img src="<?php echo esc_url($thumbnail); ?>">
                    </picture>
                    <div class="e-content">
                        <p class="e-pretitle">Variegato</p>
                        <h3 class="e-title"><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?>
                        
                        <a <?php $ocultar = get_field('ocultar_boton');
                            if ($ocultar) { ?>
                                style="display: none"                          
                            <?php }; ?>
                        href="<?php the_permalink(); ?>"class="cta cta-light">
                        Saber +
                        </a>
                    </div>
                </div>

            <?php
                endwhile;
                endif;  
                wp_reset_postdata();
            ?>
        </div>
    </div>
    
</section>

<section class="c-aplicaciones familia">

    <div class="clip-inferior granate">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

    <div class="b-aplicaciones intro container w-663">

        <div class="e-imagen">
            <img class="img" src="<?php bloginfo('template_url'); ?>/img/content/APLICACION_cuchara.svg">
        </div>            

        <?php 
            $titulo = get_field('titulo_slider');
            $descripcion = get_field('descripcion_slider');
            if($titulo) : 
        ?>
            <h2 class="h2"><?php echo $titulo ?></h2>
        <?php   
            endif; 
            if($descripcion) : 
        ?>
            <p><?php echo $descripcion ?></p>
        <?php endif; ?>
    </div>

    <div class="b-aplicaciones slider" id="slideraplicaciones">

        <?php 
            $img1 = get_field('slider_1');
            $img2 = get_field('slider_2');
            $img3 = get_field('slider_3');
            $img4 = get_field('slider_4');
            $img5 = get_field('slider_5');

            $full = get_the_post_thumbnail_url(get_the_ID(),'full');
            $large = get_the_post_thumbnail_url(get_the_ID(),'large');/*1000*/
            $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
            $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');/*350*/
            $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');/*150*/

            //$sizefull = '2048x2048';
            $size = 'full';
            $sizeM = 'large';
            $sizeS = 'medioalto';

            $thumb1 = $img1['sizes'][ $size ];
            $thumbM1 = $img1['sizes'][ $sizeM ];
            $thumbS1 = $img1['sizes'][ $sizeS ];
            //$thumbfull1 = $img1['sizes'][ $sizefull ];

            $thumb2 = $img2['sizes'][ $size ];
            $thumbM2 = $img2['sizes'][ $sizeM ];
            $thumbS2 = $img2['sizes'][ $sizeS ];
            //$thumbfull2 = $img1['sizes'][ $sizefull ];

            $thumb3 = $img3['sizes'][ $size ];
            $thumbM3 = $img3['sizes'][ $sizeM ];
            $thumbS3 = $img3['sizes'][ $sizeS ];
            //$thumbfull3 = $img1['sizes'][ $sizefull ];

            $thumb4 = $img4['sizes'][ $size ];
            $thumbM4 = $img4['sizes'][ $sizeM ];
            $thumbS4 = $img4['sizes'][ $sizeS ];
            //$thumbfull4 = $img1['sizes'][ $sizefull ];

            $thumb5 = $img5['sizes'][ $size ];
            $thumbM5 = $img5['sizes'][ $sizeM ];
            $thumbS5 = $img5['sizes'][ $sizeS ];

            $thumb6 = $img6['sizes'][ $size ];
            $thumbM6 = $img6['sizes'][ $sizeM ];
            $thumbS6 = $img6['sizes'][ $sizeS ];
            //$thumbfull5 = $img1['sizes'][ $sizefull ];
        ?>

        <?php if($img1) : ?>
            <picture class="b-slide">
                <source media="(min-width: 1025px)" srcset="<?php echo esc_url($thumb1); ?>">
                <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumbM1); ?>">
                <img src="<?php echo esc_url($thumbS1); ?>">                 
            </picture> 
        <?php endif; if($img2) : ?>
            <picture class="b-slide">
                <source media="(min-width: 1025px)" srcset="<?php echo esc_url($thumb2); ?>">
                <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumbM2); ?>">
                <img src="<?php echo esc_url($thumbS2); ?>">                 
            </picture> 
        <?php endif; if($img3) : ?>
            <picture class="b-slide">
                <source media="(min-width: 1025px)" srcset="<?php echo esc_url($thumb3); ?>">
                <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumbM3); ?>">
                <img src="<?php echo esc_url($thumbS3); ?>">                 
            </picture> 
        <?php endif; if($img4) : ?>
            <picture class="b-slide">
                <source media="(min-width: 1025px)" srcset="<?php echo esc_url($thumb4); ?>">
                <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumbM4); ?>">
                <img src="<?php echo esc_url($thumbS4); ?>">                 
            </picture> 
        <?php endif; if($img5) : ?>
            <picture class="b-slide">
                <source media="(min-width: 1025px)" srcset="<?php echo esc_url($thumb5); ?>">
                <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumbM5); ?>">
                <img src="<?php echo esc_url($thumbS5); ?>">                 
            </picture> 
        <?php endif; if($img6) : ?>
            <picture class="b-slide">
                <source media="(min-width: 1025px)" srcset="<?php echo esc_url($thumb6); ?>">
                <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumbM6); ?>">
                <img src="<?php echo esc_url($thumbS6); ?>">                 
            </picture> 
        <?php endif; ?>
    </div>

    <div class="clip-inferior beige familia">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

</section>

<section class="c-productos-relacionados familia">

    <?php
    $titulo = get_field('titulo_relacionados');
    if($titulo) :
    ?>
    <h2 class="h2"> <?php echo $titulo ?> </h2>
    <?php endif; ?>
    
    <div class="container slider-relacionados">
        
        <?php   
            $args = array(
                'post_type' => 'page', 
                'post_parent' => 6,
                'post__not_in' => array($post->ID)
            );
                
            $query = new WP_Query($args);
            if( $query->have_posts() ) : while ($query->have_posts()) : $query->the_post();
            ?>
            <div class="b-card --familia">
                <a href="<?php the_permalink() ?>">
                    <div class="e-featured">
                    
                        <?php 
                            /* variables para cada imagen */
                            $full = get_the_post_thumbnail_url(get_the_ID(),'full');
                            $large = get_the_post_thumbnail_url(get_the_ID(),'large');/*1000*/
                            $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
                            $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');/*350*/
                            $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');/*150*/
                            $letteringcabecera = get_field('lettering_cabecera');  
                            $letteringcabeceraurl = $letteringcabecera['url'];
                            $letteringcabecerasize = 'full';
                            $letteringcabecerasizes = 'large';
                            $letteringcabecerathumb = $letteringcabecera['sizes'][ $letteringcabecerasize ];
                            $letteringcabecerathumbs = $letteringcabecera['sizes'][ $letteringcabecerasizes ];
                        ?>

                        <picture class="e-background">
                            <source media="(min-width: 768px)" srcset="<?php echo esc_url($full); ?>">
                            <img src="<?php echo esc_url($medioalto); ?>">
                        </picture>

                        <?php if($letteringcabecera) : ?>
                            <picture class="e-lettering">
                                <source media="(min-width: 768px)" srcset="<?php echo esc_url($letteringcabecerathumb); ?>">
                                <img src="<?php echo esc_url($letteringcabecerathumbs); ?>">    
                            </picture>
                        <?php endif; ?>

                    </div>
                    <h3 class="h3" ><?php the_title(); ?></h3>
                </a>
            </div>
            
        <?php
                endwhile;
            endif;
        ?>
    </div>

</section>

<section class="c-formulario familia">
    <div class="container w-663">
        <?php
        $titulo = get_field('titulo_formulario');
        if($titulo) : 
        ?>
        <h2 class="h2"> <?php echo $titulo ?> </h2>
        <?php endif; ?>
        <?php echo do_shortcode('[contact-form-7 id="710" title="Formulario de familia"]'); ?>
    </div>

</section>


<?php get_footer(); ?>