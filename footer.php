</div><!-- .container -->

<footer class="c-footer">
    <div class="e-curva">
    </div>
    <div class="b-footer container w-1920">
        <div class="cosa">
            <a class="e-logo" href="<?php echo home_url(); ?>">
                <img src="<?php bloginfo( 'template_url' ); ?>/img/content/LOGO.svg">
            </a>
            <?php 
                wp_nav_menu( array( 
                    'theme_location' => 'menuredesfooter', 
                    'container' => 'false', 
                    'menu_class'=>'e-menu --redes --footer') 
                ); 
            ?>
        </div>
        <?php 
            wp_nav_menu( array( 
                'theme_location' => 'menutop', 
                'container' => 'false', 
                'menu_class'=>'e-menu --top') 
            );
        ?>
        
        <?php
            $args = array(
                'post_type' => 'page',
                'p' => 10
            );

            $the_query10 = new WP_Query( $args );
            // El loop
            if ( $the_query10->have_posts() ) {while ( $the_query10->have_posts() )
            {$the_query10->the_post();?>
            <!-- aquí estructuramos HTML y llamadas como siempre -->

                <?php if ($contenidodatoscontacto) : ?>
                    <p class="contenidocontacto"><?php echo $contenidodatoscontacto; ?></p>
                <?php endif;?>
                
        <?php }} wp_reset_postdata(); ?>
        <!-- fin del wp-query -->
        
    </div>

    <div class="b-legal">
        <div class="container w-1316">
            <?php 
                wp_nav_menu( array( 
                    'theme_location' => 'menulegal', 
                    'container' => 'false', 
                    'menu_class'=>'e-menu --legal') 
                ); 
            ?>
        </div>
    </div>
    
    <?php if ( function_exists( 'display_copyright' ) ) display_copyright(); ?>

</footer>

<?php wp_footer(); ?>
</body>
</html>
