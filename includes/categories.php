<!--INDEX 5 COL & LEFT SIDEBAR-->
<div class="inner">
    <div class="section section--last scrollreveal scrollAnimateFade">
        <div class="container">

            <div class="section__inner">


            </div>
            <div class="row">

                <div class="col-xxl-2 col-md-3 col-sm-4">
                    <div class="aside_categories-list">
                        <a href="#" class="aside_categories-list__toggle btn">
                            Show categories
                        </a>
                        <div class="aside_categories-list__collapse">
                            <div class="aside_categories-list__heading">
                                Category name
                            </div>
                            <ul class="categories-menu">

                                <?php
                                $query = "SELECT * FROM categories";
                                $select_all_category_query = mysqli_query($connection,$query);


                                while ($row=mysqli_fetch_assoc($select_all_category_query)){
                                $cate_id = $row['cate_id'];
                                $cate_name = $row['cate_name'];

                                ?>


                                <li>
                                    <?php
//                                    function categories_C($count){
//                                        global $connection;
//                                        $query = "SELECT FROM movies WHERE movie_cate_id =$count";
//                                        $query_count = mysqli_query($connection,$query);
//                                        $nn=mysqli_num_rows($query_count);
//
//
//                                        return $nn;
                                    //}

                                    ?>
                                    <a href="categories.html" class="is-active">
                                        <span><?php echo $cate_name; ?></span>
                                        <span class="categories-menu__badge"></span>
                                    </a>
                                </li>
                                <?php } ?>
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Action-->
<!--                                        <span class="categories-menu__badge">326</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Adventure-->
<!--                                        <span class="categories-menu__badge">828</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li class="js-ajax-link">-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Animation-->
<!--                                        <span class="categories-menu__badge">858</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Biography-->
<!--                                        <span class="categories-menu__badge">518</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Comedy-->
<!--                                        <span class="categories-menu__badge">963</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Crime-->
<!--                                        <span class="categories-menu__badge">613</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Documentary-->
<!--                                        <span class="categories-menu__badge">384</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Drama-->
<!--                                        <span class="categories-menu__badge">186</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Family-->
<!--                                        <span class="categories-menu__badge">329</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Fantasy-->
<!--                                        <span class="categories-menu__badge">704</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Game-Show-->
<!--                                        <span class="categories-menu__badge">143</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        History-->
<!--                                        <span class="categories-menu__badge">785</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Horror-->
<!--                                        <span class="categories-menu__badge">835</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Music-->
<!--                                        <span class="categories-menu__badge">602</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Musician-->
<!--                                        <span class="categories-menu__badge">375</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Mystery-->
<!--                                        <span class="categories-menu__badge">709</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        News-->
<!--                                        <span class="categories-menu__badge">540</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Reality-TV-->
<!--                                        <span class="categories-menu__badge">885</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Romance-->
<!--                                        <span class="categories-menu__badge">976</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Sci-Fi-->
<!--                                        <span class="categories-menu__badge">980</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Sitcom-->
<!--                                        <span class="categories-menu__badge">760</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Sport-->
<!--                                        <span class="categories-menu__badge">929</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Talk-Show-->
<!--                                        <span class="categories-menu__badge">555</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Thriller-->
<!--                                        <span class="categories-menu__badge">792</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        War-->
<!--                                        <span class="categories-menu__badge">502</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="categories.html" class="js-ajax-link">-->
<!--                                        Western-->
<!--                                        <span class="categories-menu__badge">460</span>-->
<!--                                    </a>-->
<!--                                </li>-->
                            </ul>
                        </div>
                    </div>

                </div>