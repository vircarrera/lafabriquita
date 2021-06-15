<?php get_header(); ?>

<section class="c-home-slider" id="sliderprincipal">
    <?php
    $args = array(
    'post_type'   => 'slider',
    'post_status' => 'publish',
    );
    
    $blog = new WP_Query( $args );
    if( $blog->have_posts() ) :
    ?>
        <?php
        while( $blog->have_posts() ) :
            $blog->the_post();
            ?>

            <?php 
                /* variables para cada imagen */
                $full = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                $large = get_the_post_thumbnail_url(get_the_ID(),'large');
                $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); 
                $medium = get_the_post_thumbnail_url(get_the_ID(),'medium'); 
            ?>

            <div class="b-featured">
                <picture>
                    <source media="(min-width: 960px)" srcset="<?php echo esc_url($full); ?>">
                    <img src="<?php echo esc_url($large); ?>" alt="">
                </picture>
                <div class="container">
                    <h3 class="featured-title"><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
            </div>

            <?php
        endwhile;
        wp_reset_postdata();
        ?>
        
    <?php endif; ?>
</section>
<section class="separador clip-inferior beige-franjas">
        <div class="container">
            <figure class="e-granja">
                <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/Granja.svg" alt="">
            </figure>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
</section>    

<section class="c-home-productos clip-inferior beige">        
    <?php
        $the_query0 = new WP_Query( array(
            'post_type' => 'page',
            'p' => 6
        ));
        // El loop
        if ( $the_query0->have_posts() ) {while ( $the_query0->have_posts() )
        {$the_query0->the_post();?>


        <h1 class="h2"><?php the_title() ?></h1>

        <?php 
            $contenidobajoeltitulo = get_field('contenido_bajo_el_titulo'); 
            if ($contenidobajoeltitulo) :
        ?>
            <p><?php echo $contenidobajoeltitulo; ?></p>
        <?php endif; ?>
    
    <?php }} wp_reset_postdata(); ?>


    <?php   
        $args = array(
            'post_type' => 'page', 
            'post_parent' => 6
        );
            
        $query = new WP_Query($args);
        if( $query->have_posts() ) : 
        ?>
    <div class="container slider-relacionados" id="sliderrelacionados">
        <?php
            while ($query->have_posts()) : $query->the_post();
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
        ?>
    </div>
    <?php
        endif;
        wp_reset_postdata();
    ?>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>

</section>

<?php get_template_part( 'blocks/sliderII' ); ?>

<section class="c-home-calidad">
    
    <?php
    $the_query1 = new WP_Query( array(
        'post_type' => 'page',
        'p' => 17
    ));

    if ( $the_query1->have_posts() ) {while ( $the_query1->have_posts() )
    {$the_query1->the_post();?>
    <div class="b-home-calidad --intro clip-inferior beige">
        <div class="container">
            <?php 
                $logo = get_field('hoja_calidad');
                $subtitulo = get_field('subtitulo');
                if($logo) : 
            ?>
                <img src="<?php echo $logo; ?>">
            <?php 
                endif; 
                if($subtitulo) : 
            ?>
                <h2 class="e-title-calidad"><?php echo $subtitulo ?></h2>
            <?php 
                endif; 
            ?> 
            <div>
                <?php the_content(); ?>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

    <div class="b-plantas">
        <div class="e-planta --uno">
            <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/rama_cacao.svg">
        </div>
        <div class="e-planta --dos">
            <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/rama_cacao.svg">
        </div>
        <div class="e-planta --tres">
            <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/rama_cacao.svg">
        </div>
        <div class="e-planta --cuatro">
            <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/rama_cacao.svg">
        </div>
    </div>

    <div class="b-home-calidad --enlace clip-inferior beige-franjas2">
        <h2 class="e-title-calidad"><?php the_title(); ?></h2>

        <a class="cta cta-golden" href="<?php the_permalink(); ?>">Saber más</a>    

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

    <?php }} wp_reset_postdata(); ?>


</section>

<section class="c-home-accesos-directos">

    <div class="container w-1084">

        <div class="b-home-blog">
            <?php
                $args = array(
                    'post_type' => 'blog',
                    'posts_per_page' => 1
                );
                
                $the_query4 = new WP_Query( $args );
                if ( $the_query4->have_posts() ) {while ( $the_query4->have_posts() )
                {$the_query4->the_post();
                        
                    /* variables para cada imagen */
                    $full = get_the_post_thumbnail_url(get_the_ID(),'full');
                    $large = get_the_post_thumbnail_url(get_the_ID(),'large');/*1000*/
                    $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
                    $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');/*350*/
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');/*150*/
                ?>
                
                <h4 class="h4"><?php the_title(); ?></h4>
                <picture class="imgdestacada">
                    <source media="(min-width: 576px)" srcset="<?php echo esc_url($medioalto); ?>">
                    <img src="<?php echo esc_url($medium); ?>">
                    <a href="<?php the_permalink(); ?>">                    
                        <span class="e-arrow"><i class="iconos ico-flecha"></i></span>
                    </a>
                </picture>
                <div class="texto"><?php the_excerpt(); ?></div>
                
            <?php }} wp_reset_postdata(); ?>
            
            <?php
                $args = array(
                    'post_type' => 'page',
                    'p' => '85',
                    'posts_per_page' => 1
                );
                
                $the_query5 = new WP_Query( $args );
                if ( $the_query5->have_posts() ) {while ( $the_query5->have_posts() )
                {$the_query5->the_post(); ?>

                <div class="wrapper">
                    <a class="cta cta-golden" href="<?php the_permalink(); ?>">Ir a blog</a>
                </div>

            <?php }} wp_reset_postdata(); ?>
        </div>

        <div class="b-home-noticias">
            <?php
                $args = array(
                    'post_type' => 'noticias',
                    'posts_per_page' => 1
                );
                
                $the_query2 = new WP_Query( $args );
                if ( $the_query2->have_posts() ) {while ( $the_query2->have_posts() )
                {$the_query2->the_post();
                        
                    /* variables para cada imagen */
                    $full = get_the_post_thumbnail_url(get_the_ID(),'full');
                    $large = get_the_post_thumbnail_url(get_the_ID(),'large');/*1000*/
                    $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
                    $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');/*350*/
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');/*150*/
                ?>
                
                <h4 class="h4"><?php the_title(); ?></h4>
                <picture class="imgdestacada">
                    <source media="(min-width: 576px)" srcset="<?php echo esc_url($medioalto); ?>">
                    <img src="<?php echo esc_url($medium); ?>">
                    <a href="<?php the_permalink(); ?>">                    
                        <span class="e-arrow"><i class="iconos ico-flecha"></i></span>
                    </a>
                </picture>
                <div class="texto"><?php the_excerpt(); ?></div>
            <?php }} wp_reset_postdata(); ?>

            <?php
                $args = array(
                    'post_type' => 'page',
                    'p' => '87',
                    'posts_per_page' => 1
                );
                
                $the_query3 = new WP_Query( $args );
                if ( $the_query3->have_posts() ) {while ( $the_query3->have_posts() )
                {$the_query3->the_post(); ?>

                <div class="wrapper">
                    <a class="cta cta-golden" href="<?php the_permalink(); ?>">Ir a noticias</a>
                </div>

            <?php }} wp_reset_postdata(); ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>