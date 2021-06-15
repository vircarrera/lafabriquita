<?php /* Template Name: Universo */ ?>

<?php get_header(); ?>

<?php 
    $iconouniversoescritorio = get_field('icono_universo_escritorio');
    $iconouniversomovil = get_field('icono_universo_movil');
    $titulouniverso = get_field('titulo_universo');
    $parrafobanneruno = get_field('parrafo_banner_1');
    $parrafobannerdos = get_field('parrafo_banner_2');
    $imagencierre = get_field('imagen_cierre');
    $parrafocierre = get_field('parrafo_cierre');
    
    //imagen
    $imagenbanneruno = get_field('imagen_banner_1');
    $imagenbannerdos = get_field('imagen_banner_2');
    $urlbanneruno = $imagenbanneruno['url'];
    $urlbannerdos = $imagenbannerdos['url'];
    $titlebanneruno = $imagenbanneruno['title'];
    $titlebannerdos = $imagenbannerdos['title'];
    $altbanneruno = $imagenbanneruno['alt'];
    $altbannerdos = $imagenbannerdos['alt'];

    // Thumbnail size attributes.
    $size = 'medioalto';
    $thumbbanneruno = $imagenbanneruno['sizes'][ $size ];
    $thumbbannerdos = $imagenbannerdos['sizes'][ $size ];

?>
<section class="container b-featured universo clip-inferior beige">
        <?php 
            $args = array(
                'post_type' => 'page', 
                'p' => 14
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
            <source media="(min-width: 768px)" srcset="<?php echo esc_url($full); ?>">
            <img src="<?php echo esc_url($full); ?>">
        </picture>
                <?php 
            endwhile;
        endif; ?>
        <div class="wrapper">
            <h1 class="e-title h1"><?php the_title() ?></h1>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
</section>

<div class="background">
    <section class="c-intro">
        <div class="container w-940">
            <?php if($iconouniversoescritorio) : ?>
                <figure class="full">
                    <img src="<?php echo $iconouniversoescritorio; ?>">
                </figure>
            <?php endif; ?>
            <?php if($iconouniversomovil) : ?>
                <figure class="movil">
                    <img src="<?php echo $iconouniversomovil; ?>">
                </figure>
            <?php endif; ?>

            <?php if($titulouniverso) : ?><h2 class="h2"><?php echo $titulouniverso; ?></h2><?php endif; ?>
            <?php the_content(); ?>
        </div>
    </section>

    <section class="c-artesanal clip-inferior granate">
        <div class="b-artesanal --uno">
            <div class="container w-1200">
                <?php if($parrafobanneruno) : ?>
                <div class="texto">
                    <?php echo $parrafobanneruno; ?>
                </div>
                <?php endif; ?>
                <?php if($imagenbanneruno) : ?>
                <div class="img">
                    <figure>
                        <img src="<?php echo esc_url($thumbbanneruno); ?>" alt="<?php echo esc_attr($altbanneruno); ?>" alt="<?php echo esc_attr($altbanneruno);?>">
                    </figure>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="b-artesanal --dos">
            <div class="container w-1200">
                <?php if($imagenbannerdos) : ?>
                <div class="img">
                    <figure>
                        <img src="<?php echo esc_url($thumbbannerdos); ?>" alt="<?php echo esc_attr($altbannerdos); ?>" alt="<?php echo esc_attr($altbannerdos);?>">
                    </figure>
                </div>
                <?php if($parrafobannerdos) : ?>
                <div class="texto">
                    <?php echo $parrafobannerdos; ?>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>  
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </section>

    <section class="c-conclusion">

        <div class="container">
            <?php if($imagencierre) : ?>
                <figure>
                    <img src="<?php echo $imagencierre; ?>">
                </figure>
            <?php endif; ?>
            <?php if($parrafocierre) : ?><p><?php echo $parrafocierre; ?></p><?php endif; ?>
        </div>
    </section>
</div>
<?php get_footer(); ?>