<?php /* Template Name: Faq */ ?>

<?php get_header(); ?>

<section class="faq-intro clip-inferior beige-franjas"> 
    <div class="container">
        <?php 
            $args = array(
                'post_type' => 'page', 
                'p' => 23
            );
            $query0 = new WP_Query($args);
            if( $query0->have_posts() ) { while ($query0->have_posts()) { $query0->the_post(); ?>   

            <h1 class="h1"><?php the_title(); ?></h1>
        <?php }}; 
            $subtitulo = get_field('subtitulo');
        if($subtitulo){
        ?>
            <h2 class="subtitulo"> <?php echo $subtitulo ?> </h2>
            
        <?php } ?>

        <div class="e-search --faq">
            <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                <input type="text" value="" name="s" id="s" class="search__input" placeholder="Escribe tu pregunta o palabra clave">
                <input type="hidden" name="search-type" value="faq">
                <button type="submit" name="submit" value="buscar" class="search__button">
                    <i class="iconos ico-lupa"></i>
                </button>
            </form>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</section>
<section class="faq-contenido">
    <div class="wrapper">
    <?php
    $args = array( 
        'post_type' => 'faq',
        'posts_per_page' => -1,
        'order' => 'ASC'
    );

    $faq = new WP_Query( $args );
    if ($faq->have_posts()) { while ($faq->have_posts()) { $faq->the_post(); 
    ?> 

        <details class="e-faq" id="e-faq">

            <summary class="e-pregunta" id="e-pregunta">  
                <?php the_title() ?>
            </summary>
            <p class="e-respuesta dropdown-content" id="e-respuesta"> 
                <?php the_content() ?> 
            </p>
        </details>

    <?php }}; ?>
    </div>
	
</section>


<?php get_footer(); ?>