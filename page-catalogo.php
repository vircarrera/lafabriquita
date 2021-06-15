<?php /* Template Name: Catálogo */ ?>

<?php get_header(); ?>

<section class="b-catalogo">
    <input type="checkbox" id="checkcardcatalogo1" class="e-inputcardcatalogo">
    <input type="checkbox" id="checkcardcatalogo2" class="e-inputcardcatalogo">
    <div class="container flex w-1920">
        <?php 
            $shortcodecatalogo1 = get_field('shortcode_catalogo_1');
            $imagenportadacatalogo1 = get_field('imagen_portada_catalogo_1');
            $titulocatalogo1 = get_field('titulo_catalogo_1');
            if ($shortcodecatalogo1) {
        ?>
            <div class="card --catalogo uno">
                <label for="checkcardcatalogo1" class="e-checkcardcatalogo"></label>
                <figure>
                    <img src="<?php echo $imagenportadacatalogo1; ?>">
                </figure>
                <div>
                    <h3 class="title"><?php echo $titulocatalogo1; ?></h3>
                </div>
            </div>
        <?php 
            }; 
            $shortcodecatalogo2 = get_field('shortcode_catalogo_2');
            $imagenportadacatalogo2 = get_field('imagen_portada_catalogo_2');
            $titulocatalogo2 = get_field('titulo_catalogo_2');
            if ($shortcodecatalogo2) { 
        ?>
            <div class="card --catalogo dos">
                <label for="checkcardcatalogo2" class="e-checkcardcatalogo"></label>
                <figure>
                    <img src="<?php echo $imagenportadacatalogo2; ?>">
                </figure>
                <div>
                    <h3 class="title"><?php echo $titulocatalogo2; ?></h3>
                </div>
            </div>
        <?php }; ?>
    </div>
    <div class="container relative w-1920">
        <?php 
            $shortcodecatalogo1 = get_field('shortcode_catalogo_1');
            if ($shortcodecatalogo1) {
        ?>
            <div class="e-catalogo uno">
                <?php echo $shortcodecatalogo1; ?>
            </div>
        <?php 
            }; 
            $shortcodecatalogo2 = get_field('shortcode_catalogo_2');
            if ($shortcodecatalogo2) { 
        ?>
            <div class="e-catalogo dos">
                <?php echo $shortcodecatalogo2; ?>
            </div>
        <?php }; ?>
    </div>
</section>
<?php get_footer(); ?>