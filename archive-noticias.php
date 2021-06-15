<?php /* Template Name: noticias */ ?>

<?php get_header(); ?>

<section class="b-featured noticias">
    <?php
        $args = array(
            'post_type' => 'page',
            'p' => 87
        );
        
    $featured = new WP_Query( $args );
    if ( $featured->have_posts() ) {while ( $featured->have_posts() )
    {$featured->the_post();
            
        /* variables para cada imagen */
        $full = get_the_post_thumbnail_url(get_the_ID(),'full');
        $large = get_the_post_thumbnail_url(get_the_ID(),'large');/*1000*/
        $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
        $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');/*350*/
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');/*150*/
    ?>
    
    <picture class="imgdestacada">
        <source media="(min-width: 1200px)" srcset="<?php echo esc_url($full); ?>">
        <source media="(min-width: 900px)" srcset="<?php echo esc_url($large); ?>">
        <source media="(min-width: 450px)" srcset="<?php echo esc_url($medioalto); ?>">
        <img src="<?php echo esc_url($medium); ?>" alt="">
    </picture>

    <?php }} wp_reset_postdata(); ?>
    <!-- fin del wp-query -->

    <div class="container w-940">
        <h1 class="h1"><?php wp_title('', true, 'right') ?></h1>
    </div>

    <div class="clip-inferior beige">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

</section>

    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'   => 'noticias',
        'post_status' => 'publish',
        'paged'          => $paged
    );
    
    $noticias = new WP_Query( $args );
    if( $noticias->have_posts() ) :
    ?>            
        <section class="c-entradas">
    
            <div class="container w-1200">

                <aside class="c-aside --noticias">
                    <div class="e-search --noticias">
                        <p>¿Qué buscas?</p>
                        <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                            <input type="text" value="" name="s" id="s" class="search__input" />
                            <input type="hidden" name="search-type" value="noticias" />
                            <button type="submit" name="submit" value="buscar" class="search__button">
                                <i class="iconos ico-lupa"></i>
                            </button>
                        </form>
                    </div>
                </aside>

                <div class="b-entradas --noticias">
                    <?php
                    while( $noticias->have_posts() ) :
                        $noticias->the_post();
                        ?>

                        <?php 
                            /* variables para cada imagen */
                            $full = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                            $large = get_the_post_thumbnail_url(get_the_ID(),'large');
                            $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
                            $medium = get_the_post_thumbnail_url(get_the_ID(),'medium'); 
                            $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); 
                        ?>
                        
                        <div class="b-entrada --noticias">
                            <a class="wrapper" href="<?php the_permalink(); ?>">
                                <picture>
                                    <img src="<?php echo esc_url($medioalto); ?>" alt="">
                                    <span class="e-arrow"><i class="iconos ico-flecha"></i></span>
                                </picture>
                                <div class="e-content">
                                    <p class="e-date"><?php echo get_the_date(); ?></p>
                                    <h2 class="title"><?php the_title(); ?></h2>
                                    <p class="e-excerpt"><?php the_excerpt(); ?></p>
                                </div>
                            </a>
                        </div>

                        <?php
                    endwhile;?>
                </div>

                <?php wp_reset_postdata(); ?>

            </div>
        </section>

        <div class="paginador">
            <?php 
                // obtenemos el total de páginas
                global $wp_query;
                $total = $wp_query->max_num_pages;
                // solo seguimos con el resto si tenemos más de una página
                if ( $total > 1 )  {
                    // obtenemos la página actual
                    if ( !$current_page = get_query_var('paged') )
                        $current_page = 1;
                    // la estructura de “format” depende de si usamos enlaces permanentes "humanos"
                    $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => $format,
                        'current' => $current_page,
                        'prev_next' => True,
                        'prev_text' => __('&laquo; Anterior'),
                        'next_text' => __('Siguiente &raquo;'),
                        'total' => $total,
                        'mid_size' => 1,
                        'type' => 'list'
                    ));
                }
            ?>
        </div>
    <?php
    else :
    esc_html_e( 'No hay noticias en la taxonomía!', 'text-domain' );
    endif;
    ?>
    <?php wp_reset_postdata(); ?>

<?php get_footer(); ?>