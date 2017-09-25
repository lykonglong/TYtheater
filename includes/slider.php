
    <div class="tp-banner-container clearfix">
        <div class="slider">
            <div class="tp-banner-container clearfix">
                <div class="tp-banner" >
                    <ul>
                        <?php
                        $query = "SELECT * FROM slider";
                        $select_all_slider_query = mysqli_query($connection,$query);
                        //$num_row = mysqli_num_rows($select_all_slider_query);
                        while ($row=mysqli_fetch_assoc($select_all_slider_query)){
                        $slider_id = $row['slider_id'];
                        $slider_title = $row['slider_title'];
                        $slider_image = $row['slider_image'];
                        $slider_link = $row['slider_link'];
                        ?>

                        <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700" >
                            <!-- MAIN IMAGE -->
                            <img src="admin/dist/img/slider/<?php echo $slider_image ?>" alt="slidebg3" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                            <!-- LAYERS -->
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption white_heavy_60 customin ltl tp-resizeme"
                                 data-x="310"
                                 data-y="140"
                                 data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1200"
                                 data-start="700"
                                 data-easing="Power4.easeOut"
                                 data-splitin="chars"
                                 data-splitout="none"
                                 data-elementdelay="0.1"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn"
                                 style=" font-size:70px; font-weight:800; color: ;"><?php echo $slider_title ?> </div>

                            <!-- LAYER NR. 2 -->


                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption lfb ltb start tp-resizeme"
                                 data-x="310"
                                 data-y="270"
                                 data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1500"
                                 data-start="1600"
                                 data-easing="Power3.easeInOut"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-linktoslide="next"
                                 style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='largebtn solid'><?php echo $slider_link ?></a> </div>
                        </li>
                        <?php } ?>


                    </ul>
                </div>
            </div>
        </div>
    </div>

