<?php get_header(); ?>


<!-- termina el LOOP -->

<!-- <?php //if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="caca">

        <h2><?php //the_title(); ?></h2>

        <?php //$full = get_the_post_thumbnail_url(get_the_ID(),'full');  ?>

        <img class="d-block w-100" src="<?php //echo esc_url($full); ?>" alt="<?php //the_title(); ?>">

        <p><?php //the_excerpt(); ?></p>

        <?php// $ocultarboton = get_field('ocultar_boton'); ?>
        <a <?php// if ($ocultarboton) : echo 'style="display: none;"'; endif; ?> href="<?php //the_permalink(); ?>">Saber +</a>
        
    </div>	  -->

<?php //endwhile; endif; ?>

<?php get_footer(); ?>