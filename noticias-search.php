<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$s=get_search_query();
$args = array( 
    'post_type' => 'noticias',
    'paged'                 => $paged,
    'posts_per_page'         => 6,
    's' =>$s
);

$noticias = new WP_Query( $args );
 if ($noticias->have_posts()) { ?> 
    
    <h1 class="e-title-calidad container w-1200">
        Has buscado:
        <?php
        $argstres = array(
            'post_type'              => 'noticias',
            'posts_per_page'         => -1,
            's' =>$s
        );
        $allsearch = new WP_Query($argstres);
        $key = wp_specialchars($s, 1);
        $count = $allsearch->post_count;
        _e('<span> ');echo $key;
        _e('.</span>');
        _e(' Hemos encontrado ');
        _e('<span> ');
        echo $count;
        _e(' noticias relacionadas.</span>');
        wp_reset_query();
        ?>
    </h1>

    <div class="container flex w-1200">

    <?php while ($noticias->have_posts()) : $noticias->the_post(); ?>

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


<?php endwhile; ?>
    </div>
    <div class="e-paginador container w-1200">
        <?php previous_posts_link('<span class="e-arrow --atras"><i class="iconos ico-flecha"></i></span>Anteriores', $noticias->max_num_pages); ?>
        <?php next_posts_link('<span class="e-arrow"><i class="iconos ico-flecha"></i></span>Siguientes', $noticias->max_num_pages); ?>
    </div>

<?php } else { ?>
    <h1 class="h1"> Lo lamentamos, pero no hemos encontrado ninguna noticia relacionada con tu búsqueda. Te recomendamos que utilices el buscador situado en la cabecera.</h1>

<?php }; ?>

<?php get_footer(); ?>