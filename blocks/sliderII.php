<section class="c-home-sliderII">
    
    <!-- Este contiene la madera y el fondo crema fijo. 
    Además, tiene un contenedor y el cierre de la sección-->
    <div class="container wood">
        
        <!-- este contiene el título "te presentamos los..." y el contenedor de dispositivas -->
        <div class="container">
            <?php 
                // Field variables.
                $titulo = get_field('titulo_slider');
                $closing = get_field('closing_slider');
                $logo1 = get_field('logo_slider_1');
                $logo2 = get_field('logo_slider_2');
                $logo3 = get_field('logo_slider_3');
                $logo4 = get_field('logo_slider_4');
                $logo5 = get_field('logo_slider_5');
                $logo6 = get_field('logo_slider_6');
                $link1 = get_field('link_slider_1');
                $link2 = get_field('link_slider_2');
                $link3 = get_field('link_slider_3');
                $link4 = get_field('link_slider_4');
                $link5 = get_field('link_slider_5');
                $link6 = get_field('link_slider_6');
                $img1 = get_field('imagen_slider_1');
                $img2 = get_field('imagen_slider_2');
                $img3 = get_field('imagen_slider_3');
                $img4 = get_field('imagen_slider_4');
                $img5 = get_field('imagen_slider_5');
                $img6 = get_field('imagen_slider_6');
                $new1 = get_field('nuevo_slider_1');
                $new2 = get_field('nuevo_slider_2');
                $new3 = get_field('nuevo_slider_3');
                $new4 = get_field('nuevo_slider_4');
                $new5 = get_field('nuevo_slider_5');
                $new6 = get_field('nuevo_slider_6');
                $info1 = get_field('info_slider_1');
                $info2 = get_field('info_slider_2');
                $info3 = get_field('info_slider_3');
                $info4 = get_field('info_slider_4');
                $info5 = get_field('info_slider_5');
                $info6 = get_field('info_slider_6');
                // size attributes
                // Logo 
                $size = 'medioalto';
                $sizeS = 'medioalto';

                $log1 = $logo1['sizes'][ $size ];
                $logS1 = $logo1['sizes'][ $sizeS ];
                $log2 = $logo2['sizes'][ $size ];
                $logS2 = $logo2['sizes'][ $sizeS ];
                $log3 = $logo3['sizes'][ $size ];
                $logS3 = $logo3['sizes'][ $sizeS ];
                $log4 = $logo4['sizes'][ $size ];
                $logS4 = $logo4['sizes'][ $sizeS ];
                $log5 = $logo5['sizes'][ $size ];
                $logS5 = $logo5['sizes'][ $sizeS ];
                $log6 = $logo6['sizes'][ $size ];
                $logS6 = $logo6['sizes'][ $sizeS ];
                // Img
                $thumb1 = $img1['sizes'][ $size ];
                $thumbS1 = $img1['sizes'][ $sizeS ];
                $thumb2 = $img2['sizes'][ $size ];
                $thumbS2 = $img2['sizes'][ $sizeS ];
                $thumb3 = $img3['sizes'][ $size ];
                $thumbS3 = $img3['sizes'][ $sizeS ];
                $thumb4 = $img4['sizes'][ $size ];
                $thumbS4 = $img4['sizes'][ $sizeS ];
                $thumb5 = $img5['sizes'][ $size ];
                $thumbS5 = $img5['sizes'][ $sizeS ];
                $thumb6 = $img6['sizes'][ $size ];
                $thumbS6 = $img6['sizes'][ $sizeS ];

            if($titulo) : 
            ?>
            <h2 class="h3 big responsive"> <?php echo $titulo ?> </h2>
            <?php endif;?>

            <!-- este contiene las diapositivas y lleva el flickity -->
            <div id="homesliderii" class="contenedor-scroll">

                <?php if($link1): ?>
                    <a class="b-diapositiva" href="<?php echo esc_url($link1); ?>"> 
                        <div class="container w-940">
                            <?php if($logo1) : ?>
                                <picture class="title">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($log1); ?>">
                                    <img src="<?php echo esc_url($logS1); ?>"> 
                                    <div class="fondo"></div>                
                                </picture> 
                            <?php endif; ?>
                            
                            <?php if($info1) : ?>
                            <p class="e-description"> <?php echo $info1 ?> </p>
                            <?php endif; ?>

                            <?php if($img1) : ?>
                                <picture class="tarta">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumb1); ?>">
                                    <img src="<?php echo esc_url($thumbS1); ?>">                 
                                </picture> 
                            <?php endif; ?>

                            <div class= "new"
                                <?php 
                                    if ($new1) {
                                        echo 'style="display: flex;"';
                                    } else { 
                                        echo 'style="display: none;"';
                                    }; 
                                ?>>
                                new!
                            </div>
                        </div>
                    </a>
                <?php 
                    endif; 
                    if($link2): 
                ?>
                    <a class="b-diapositiva" href="<?php echo esc_url($link2); ?>"> 
                        <div class="container w-940">
                            <?php if($logo2) : ?>
                                <picture class="title">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($log2); ?>">
                                    <img src="<?php echo esc_url($logS2); ?>"> 
                                    <div class="fondo"></div>                    
                                </picture> 
                            <?php endif; ?>
                            
                            <?php if($info2) : ?>
                            <p class="e-description"> <?php echo $info2 ?> </p>
                            <?php endif; ?>

                            <?php if($img2) : ?>
                                <picture class="tarta">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumb2); ?>">
                                    <img src="<?php echo esc_url($thumbS2); ?>">                 
                                </picture> 
                            <?php endif; ?>

                            
                            <?php 
                                if ($new2) {
                                    echo '<div class= "new" style="display: flex;">new!</div>';
                                }; 
                            ?>
                                
                           
                        </div>
                    </a>
                <?php 
                    endif; 
                    if($link3): 
                ?>
                    <a class="b-diapositiva" href="<?php echo esc_url($link3); ?>">                         
                        <div class="container w-940">
                            <?php if($logo3) : ?>
                                <picture class="title">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($log3); ?>">
                                    <img src="<?php echo esc_url($logS3); ?>">   
                                    <div class="fondo"></div>                  
                                </picture> 
                            <?php endif; ?>
                            
                            <?php if($info3) : ?>
                            <p class="e-description"> <?php echo $info3 ?> </p>
                            <?php endif; ?>

                            <?php if($img3) : ?>
                                <picture class="tarta">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumb3); ?>">
                                    <img src="<?php echo esc_url($thumbS3); ?>">                  
                                </picture> 
                            <?php endif; ?>

                            <div class= "new"
                                <?php 
                                    if ($new3) {
                                        echo 'style="display: flex;"';
                                    } else { 
                                        echo 'style="display: none;"';
                                    }; 
                                ?>>
                                new!
                            </div>
                        </div>
                    </a>
                <?php 
                    endif; 
                    if($link4): 
                ?>
                    <a class="b-diapositiva" href="<?php echo esc_url($link4); ?>">                         
                        <div class="container w-940">
                            <?php if($logo4) : ?>
                                <picture class="title">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($log4); ?>">
                                    <img src="<?php echo esc_url($logS4); ?>">  
                                    <div class="fondo"></div>                   
                                </picture> 
                            <?php endif; ?>
                            
                            <?php if($info4) : ?>
                            <p class="e-description"> <?php echo $info4 ?> </p>
                            <?php endif; ?>

                            <?php if($img4) : ?>
                                <picture class="tarta">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumb4); ?>">
                                    <img src="<?php echo esc_url($thumbS4); ?>">                 
                                </picture> 
                            <?php endif; ?>

                            <div class= "new"
                                <?php 
                                    if ($new4) {
                                        echo 'style="display: flex;"';
                                    } else { 
                                        echo 'style="display: none;"';
                                    }; 
                                ?>>
                                new!
                            </div>
                        </div>
                    </a>
                <?php 
                    endif; 
                    if($link5): 
                ?>
                    <a class="b-diapositiva" href="<?php echo esc_url($link5); ?>">                         
                        <div class="container w-940">
                            <?php if($logo5) : ?>
                                <picture class="title">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($log5); ?>">
                                    <img src="<?php echo esc_url($logS5); ?>">  
                                    <div class="fondo"></div>                   
                                </picture> 
                            <?php endif; ?>
                            
                            <?php if($info5) : ?>
                            <p class="e-description"> <?php echo $info5 ?> </p>
                            <?php endif; ?>

                            <?php if($img5) : ?>
                                <picture class="tarta">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumb5); ?>">
                                    <img src="<?php echo esc_url($thumbS5); ?>">                 
                                </picture> 
                            <?php endif; ?>

                            <div class= "new"
                                <?php 
                                    if ($new5) {
                                        echo 'style="display: flex;"';
                                    } else { 
                                        echo 'style="display: none;"';
                                    }; 
                                ?>>
                                new!
                            </div>
                        </div>
                    </a>
                <?php 
                    endif; 
                    if($link6): 
                ?>
                    <a class="b-diapositiva" href="<?php echo esc_url($link6); ?>">                         
                        <div class="container w-940">
                            <?php if($logo6) : ?>
                                <picture class="title">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($log6); ?>">
                                    <img src="<?php echo esc_url($logS6); ?>">  
                                    <div class="fondo"></div>                   
                                </picture> 
                            <?php endif; ?>
                            
                            <?php if($info6) : ?>
                            <p class="e-description"> <?php echo $info6 ?> </p>
                            <?php endif; ?>

                            <?php if($img6) : ?>
                                <picture class="tarta">
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($thumb6); ?>">
                                    <img src="<?php echo esc_url($thumbS6); ?>">                 
                                </picture> 
                            <?php endif; ?>

                            <div class= "new"
                                <?php 
                                    if ($new6) {
                                        echo 'style="display: flex;"';
                                    } else { 
                                        echo 'style="display: none;"';
                                    }; 
                                ?>>
                                new!
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            
            </div>

        </div>

    </div>

    <?php
    if($closing) : 
    ?>
    <h2 class="h3 closing"> <?php echo $closing ?> </h2>
    <?php endif;?>
        
    
</section>