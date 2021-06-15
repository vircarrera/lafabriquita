<?php get_header(); ?>

<?php
$args = array( 
    'post_type' => 'faq',
    'posts_per_page' => -1,
    'order' => 'ASC'
);

$faq = new WP_Query( $args );
 if ($faq->have_posts()) { ?> 
     
    <h1 class="e-title-calidad faq">
        Has buscado:
        <?php
        $allsearch = new WP_Query("s=$s&showposts=-1");
        $key = wp_specialchars($s, 1);
        $count = $allsearch->post_count;
        _e('<span> ');echo $key;
        _e('.</span>');
        _e(' Hemos encontrado ');
        _e('<span> ');
        echo $count;
        _e(' FAQ relacionadas.</span>');
        wp_reset_query();
        ?>
    </h1>

    <div class="container search-faq">

    <?php while ($faq->have_posts()) : $faq->the_post(); ?>

        <div class="e-faq">
            <a class="e-pregunta" href="#">
                <?php the_title() ?>
            </a>
            <div class="e-respuesta"> 
                <?php the_content() ?> 
                <div class="wrapper">
                    <a class="cta cta-pildora cerrar">cerrar</a>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

    </div>

<?php } else { ?>

    <h1 class="h1 unfound"> Lo lamentamos, pero no hemos encontrado ningún contenido relacionado con tu búsqueda. Ponte en <a class="cta cta-link" href="https://www.lafabriquita.es/contacto/">contacto</a> con nosotros y resolveremos tus dudas. </h1>
    
<?php }; ?>