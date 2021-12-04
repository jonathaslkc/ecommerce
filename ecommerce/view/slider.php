<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    
                    <ol class="carousel-indicators">
                        <?php
                            foreach($slider->findAll() as $key => $slider1):
                                
                                if ($key == 0):
                                    echo '<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>';
                                else:
                                    echo '<li data-target="#slider-carousel" data-slide-to="'.$key.'" id="'.$slider1->titulo.'"></li>';
                                endif;
                            endforeach;
                        ?>
                    </ol>

                    <div class="carousel-inner">
                        <?php
                            foreach($slider->findAll() as $key2 => $slider2):
                                
                                if ($key2 == 0):
                                    echo '
                                        <div class="item active" style="height:300px;">
                                            <div class="col-sm-6">
                                                <h1><span>E</span>-commerce</h1>
                                                <h2>'.$slider2->titulo.'</h2>
                                                <p>'.$slider2->descricao.'</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <img src="'.$slider2->caminho_img.'" style="max-height:300px; height:auto;" class="girl img-responsive" alt="" />
                                            </div>
                                        </div>';
                                else:
                                    echo '
                                        <div class="item" style="height:300px;">
                                            <div class="col-sm-6">
                                                <h1><span>E</span>-commerce</h1>
                                                <h2>'.$slider2->titulo.'</h2>
                                                <p>'.$slider2->descricao.'</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <img src="'.$slider2->caminho_img.'" style="max-height:300px; height:auto;" class="girl img-responsive" alt="" />
                                            </div>
                                        </div>';
                                endif;
                            endforeach;
                        ?>                        

                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->