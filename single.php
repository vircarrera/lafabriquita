<?php get_header(); ?>
<!-- empieza el LOOP -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php /* variables para cada imagen */
    $full = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    $large = get_the_post_thumbnail_url(get_the_ID(),'large');
    $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); 
    $medium = get_the_post_thumbnail_url(get_the_ID(),'medium'); 
    $medioalto = get_the_post_thumbnail_url(get_the_ID(),'medioalto');/*600*/
    //imagen
    $imagenproducto = get_field('imagen_del_producto');
    $url = $imagenproducto['url'];
    $title = $imagenproducto['title'];
    $alt = $imagenproducto['alt'];
    // Thumbnail size attributes.
    $sizeL = 'large';
    $thumbL = $imagenproducto['sizes'][ $sizeL ];
    $sizeM = 'medioalto';
    $thumbM = $imagenproducto['sizes'][ $sizeM ];
    $sizeS = 'medium';
    $thumbS = $imagenproducto['sizes'][ $sizeS ];
?>

<section class="b-featured clip-inferior beige">
    <h1 class="e-title-producto"><?php the_title();?></h1>
    <picture>
        <source media="(min-width: 1200px)" srcset="<?php echo esc_url($thumbL); ?>">
        <source media="(min-width: 576px)" srcset="<?php echo esc_url($thumbM); ?>">
        <img src="<?php echo esc_url($thumbS); ?>" alt="<?php echo esc_attr($alt); ?>" title="<?php echo esc_attr($titlenoticia);?>">
    </picture>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>

</section>
<section class="c-content">  
    <div class="container w-940">
        <div class="texto"><?php the_content();?></div>
        <div class="wrapper">
            <button class="cta cta-pildora" onclick="goBack()">volver</button>
            <script>
                function goBack() {
                window.history.back();
                }
            </script> 
        </div>
    </div>
</section> 

<?php endwhile; endif; ?>
<!-- termina el LOOP -->
<?php get_footer(); ?>