<?php /* Template Name: blog */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="b-featured entrada-cpt clip-inferior blanco">
    <?php
        /* variables para cada imagen */
        $full = get_the_post_thumbnail_url(get_the_ID(),'full');
        $large = get_the_post_thumbnail_url(get_the_ID(),'large');/*1000*/
        $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
        $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');/*350*/
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');/*150*/
        
    ?>
    <picture class="e-featured">
        <source media="(min-width:1000px)" srcset="<?php echo esc_url($full); ?>">
        <source media="(max-width:1000px)" srcset="<?php echo esc_url($large); ?>">
        <source media="(max-width:768px)" srcset="<?php echo esc_url($medioalto); ?>">
        <img src="<?php echo esc_url($medium); ?>">
    </picture>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</section>

<section class="c-content">
    <div class="container w-1200 flex">
        <section class="c-aside --izq">
            <?php the_tags("");?>
        </section>

        <section class="b-contenido container w-663">
            <h1 class="e-titulo"> <?php the_title() ?> </h1>
            <p class="e-fecha"> <?php the_date(); ?> </p>
            <?php the_content(); ?>

            <div class="e-paginador">
                <?php $next_post = get_next_post();
                if ( $next_post ) : ?>  
                <a href= "<?php echo $next_post->guid; ?>"><span class="e-arrow --atras"><i class="iconos ico-flecha"></i></span> Anterior </a>
                <?php endif;?>

                <?php $prev_post = get_previous_post();
                if ( $prev_post ) : ?>  
                <a href= "<?php echo $prev_post->guid; ?>"><span class="e-arrow"><i class="iconos ico-flecha"></i></span>  Siguiente </a>
                <?php endif;?>

            </div>
        </section>

        <section class="c-aside --dcha">
            
            <div class="container">
                <?php
                $tags = wp_get_post_tags($post->ID);
                if ($tags) {
                ?>
                    <?php   
                    $args=array(
                        'tag__in' => array($tags[0]->term_id),
                        'post__not_in' => array($post->ID),
                        'post_type' => 'blog',
                        'posts_per_page'=>3
                    );
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                        echo '<h2 class="titulo"> Noticias relacionadas </h2> <div class="border"></div>';
                            while ($my_query->have_posts()) : $my_query->the_post();
                    ?>
                    <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
                    
                    <?php
                        endwhile;
                    } else {
                    
                        $args2=array(
                            'post__not_in' => array($post->ID),
                            'post_type' => 'blog',
                            'posts_per_page'=> 3,
                            'orderby' => 'rand'
                        );
                        $my_query2 = new WP_Query($args2);
                        if( $my_query2->have_posts() ) : while ($my_query2->have_posts()) : $my_query2->the_post();
                        ?>
                            <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
                            
                            <?php
                            endwhile;
                        endif;
                    }
                    
                    wp_reset_query();
                } else {
                    
                    $args2=array(
                        'post__not_in' => array($post->ID),
                        'post_type' => 'blog',
                        'posts_per_page'=> 3,
                        'orderby' => 'rand'
                    );
                    $my_query2 = new WP_Query($args2);
                    if( $my_query2->have_posts() ) : while ($my_query2->have_posts()) : $my_query2->the_post();
                    ?>
                        <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
                        
                        <?php
                        endwhile;
                    endif;
                    wp_reset_query();
                }
                ?>

            </div>
            
        </section>
    </div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>