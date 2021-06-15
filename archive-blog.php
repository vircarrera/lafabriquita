<?php /* Template Name: blog */ ?>

<?php get_header(); ?>

<section class="b-featured blog">
    <?php
        $args = array(
            'post_type' => 'page',
            'p' => 85
        );
        
    $featured = new WP_Query( $args );
    if ( $featured->have_posts() ) {while ( $featured->have_posts() )
    {$featured->the_post();
            
        /* variables para cada imagen */
        $full = get_the_post_thumbnail_url(get_the_ID(),'full'); 
        $large = get_the_post_thumbnail_url(get_the_ID(),'large');
        $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); 
        $medium = get_the_post_thumbnail_url(get_the_ID(),'medium'); 
    ?>

    <picture class="imgdestacada">
        <source media="(min-width: 1200px)" srcset="<?php echo esc_url($full); ?>">
        <source media="(min-width: 900px)" srcset="<?php echo esc_url($large); ?>">
        <source media="(min-width: 450px)" srcset="<?php echo esc_url($medioalto); ?>">
        <img src="<?php echo esc_url($medium); ?>" alt="">
    </picture>

    <?php }} wp_reset_postdata(); ?>

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
  'post_type'   => 'blog',
  'post_status' => 'publish',
  'paged'          => $paged
 );
 
$blog = new WP_Query( $args );
if( $blog->have_posts() ) :
?>
    <section class="c-entradas">
    
        <div class="container w-1130">

            <div class="b-entradas">
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
                    <?php
                endwhile;?>

            </div>
            <aside class="c-aside --blog">
                <div class="e-search --blog">
                    <p>¿Qué buscas?</p>
                    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                        <input type="text" name="s" id="s" value="" class="search__input" />
                        <input type="hidden" name="search-type" value="blog" />
                        <button type="submit" name="submit" value="buscar" class="search__button">
                            <i class="iconos ico-lupa"></i>
                        </button>    
                    </form>
                </div>
                <div class="e-tags --blog"> 
                    <?php
                        $terms = get_terms_per_post_type( 'post_tag', array( 'post_type' => 'blog' ) );
                    
                        foreach ( $terms as $term ) {
                            echo '<a href="' .home_url(). '/tag/';
                            echo "$term->name";
                            echo '/" rel="tag">';
                            echo "#$term->name</br>";
                            echo '</a>';
                        }  
                    ?>                    
                </div>
            </aside>
        </div>
        
    </section>

    <div class="e-paginador">
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

    <?php wp_reset_postdata();
    ?>
    
<?php
else :
  esc_html_e( 'No entradas in the diving taxonomy!', 'text-domain' );
endif;
?>



<?php get_footer(); ?>