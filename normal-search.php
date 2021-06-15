<?php get_header(); ?>

<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$s=get_search_query();
$argstodo = array( 
    'post_type'              => array('blog','post','noticias'),
    'paged'                 => $paged,
    'posts_per_page'         => 8,
    's' =>$s
);
// $args = array_merge( $args, $wp_query->query );
$todo = new WP_Query( $argstodo );
if ($todo->have_posts()) { ?>
    <h1 class="e-title-calidad container w-1200">
        Has buscado:
        <?php
        $argscinco = array(
            'post_type'              => array('blog','post','noticias'),
            'posts_per_page'         => -1,
            'post_status' => 'publish',
            's' =>$s
        );
        $allsearch = new WP_Query($argscinco);
        $key = wp_specialchars($s, 1);
        $count = $allsearch->post_count;
        _e('<span> ');echo $key;
        _e('.</span>');
        _e(' Hemos encontrado ');
        _e('<span> ');
        echo $count;
        _e('resultados.</span>');
        wp_reset_query();
        ?>
    </h1>

    <div class="container flex w-1200"> 

    <?php 
    while ($todo->have_posts()) : $todo->the_post(); ?>
                
        <?php if( get_post_type() == 'blog' ) { ?>
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
        <?php } ?>

        <?php if( get_post_type() == 'noticias' ) { ?>
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


        <?php } ?>

        <?php if( get_post_type() == 'post' ) { ?>
            <?php
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
        <?php } ?>

    <?php endwhile; 
    ?>

    </div>

    <div class="e-paginador container w-1200">
        <?php previous_posts_link('<span class="e-arrow --atras"><i class="iconos ico-flecha"></i></span>Anteriores', $noticias->max_num_pages); ?>
        <?php next_posts_link('<span class="e-arrow"><i class="iconos ico-flecha"></i></span>Siguientes', $noticias->max_num_pages); ?>
    </div>

<?php } else { ?>
    
    <h1 class="h1 unfound"> Lo lamentamos, pero no hemos encontrado ningún contenido relacionado con tu búsqueda. Ponte en <a class="cta cta-link" href="https://www.lafabriquita.es/contacto/">contacto</a> con nosotros y resolveremos tus dudas. </h1>

<?php }; ?>

<?php get_footer(); ?>