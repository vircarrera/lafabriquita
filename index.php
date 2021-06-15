<?php get_header(); ?>

<?php   
    $args = array(
        'post_type' => 'page', 
        'p' => 6
    );
        
    $query0 = new WP_Query($args);
    if( $query0->have_posts() ) : while ($query0->have_posts()) : $query0->the_post();
    ?>

<div class="container b-featured productos clip-inferior beige">
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
        <img src="<?php echo esc_url($large); ?>">
    </picture>

    <div class="container">
        <h1 class="e-title h1"><?php wp_title('', true, 'right') ?></h1>
        <figure class="e-granja">
            <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/Granja.svg" alt="">
        </figure>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</div>

<?php 
    endwhile;
endif; ?>

<div class="background">
    <div class="container familias w-1316">

        <?php   
            $args = array(
                'post_type' => 'page', 
                'post_parent' => 6
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
</div>

<?php get_footer(); ?>