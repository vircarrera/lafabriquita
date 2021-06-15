<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$s=get_search_query();
$args = array( 
    'post_type'              => 'blog',
    'paged'                 => $paged,
    'posts_per_page'         => 6,
    's' =>$s
);
// $args = array_merge( $args, $wp_query->query );
$blog = new WP_Query( $args );
 if ($blog->have_posts()) {  ; ?>
     
    <h1 class="e-title-calidad container w-1200">
        Has buscado: 
        <?php
        $argsdos = array(
            'post_type'              => 'blog',
            'posts_per_page'         => -1,
            's' =>$s
        );
        $allsearch = new WP_Query($argsdos);
        $key = wp_specialchars($s, 1);
        $count = $allsearch->post_count;
        _e('<span> ');echo $key;
        _e('.</span>');
        _e(' Hemos encontrado ');
        _e('<span> ');
        echo $count;
        _e(' entradas de blog relacionadas.</span>');
        wp_reset_query();
        ?>
    </h1>

    <div class="container flex w-1200">
     
<?php while ($blog->have_posts()) : $blog->the_post(); ?>

    <?php 
        /* variables para cada imagen */
        $full = get_the_post_thumbnail_url(get_the_ID(),'full'); 
        $large = get_the_post_thumbnail_url(get_the_ID(),'large');
        $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
        $medium = get_the_post_thumbnail_url(get_the_ID(),'medium'); 
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); 
    ?>
        <div class="b-entrada">
            <a class="wrapper" href="<?php the_permalink(); ?>">
                <h3 class="title"><?php the_title(); ?></h3>
                <picture class="entradas__imagen">
                    <img src="<?php echo esc_url($medioalto); ?>" alt="">
                    <span class="e-arrow"><i class="iconos ico-flecha"></i></span>
                </picture>
                <p><?php the_excerpt(); ?></p>
            </a>
        </div>


<?php endwhile; ?>
    </div>

    <div class="e-paginador container w-1200">
        <?php previous_posts_link('<span class="e-arrow --atras"><i class="iconos ico-flecha"></i></span>Anteriores', $blog->max_num_pages); ?>
        <?php next_posts_link('<span class="e-arrow"><i class="iconos ico-flecha"></i></span>Siguientes', $blog->max_num_pages); ?>
    </div>

<?php } else { ?>
    <h1 class="h1"> Lo lamentamos, pero no hemos encontrado ninguna entrada de blog relacionada con tu búsqueda. Te recomendamos que utilices el buscador situado en la cabecera.</h1>

<?php }; ?>

<?php get_footer(); ?>