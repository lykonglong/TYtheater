
<body class="page">
<div class="page__layout">

    <div class="overlay"></div>
    <!--HEADER-->
    <header class="page__header header">
        <div class="container">
            <div class="header__left">

                <a href="<?php echo BASE_URL;?>/" class="logo js-ajax-link">
                    <img src="images/logo1.svg" alt="" width="95px" height="70px">
                </a>
                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-item header__nav-item--dropdown">
                            <a href="<?php echo BASE_URL;?>/" class="header__nav-link js-ajax-link mobile-ajax-off">
                                Home
                            </a>

                        </li>
                        <li class="header__nav-item header__nav-item--dropdown">
                            <a href="#" class="header__nav-link js-ajax-link mobile-ajax-off">
                                Categories
                            </a>
                            <div class="header__nav-dropdown header__nav-dropdown--categories">
                                <ul>

                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $select_all_category_query = mysqli_query($connection,$query);
                                    $nrow=0;
                                    $num_row = mysqli_num_rows($select_all_category_query);
                                    while ($row=mysqli_fetch_assoc($select_all_category_query)){
                                    $cate_id = $row['cate_id'];
                                    $cate_name = $row['cate_name'];
                                    ?>

                                    <li>
                                        <a href="category.php?category=<?php echo $cate_id;?>" class="js-ajax-link">
                                            <?php echo $cate_name; ?>
                                        </a>
                                    </li>
                                    <?php

                                        if ($nrow ==4 or $nrow==9 or $nrow==14 or $nrow==19 or $nrow==24){
                                           echo" </ul>";
                                            echo" <ul>";


                                    } $nrow++;
                                    } ?>

                                </ul>
                            </div>
                        </li>
                        <!--<li class="header__nav-item header__nav-item--dropdown">
                            <a href="categories.html" class="header__nav-link js-ajax-link mobile-ajax-off">
                                About Us
                            </a>

                        </li>
                        <li class="header__nav-item header__nav-item--dropdown">
                            <a href="categories.html" class="header__nav-link js-ajax-link mobile-ajax-off">
                                Contact Us
                            </a>

                        </li>-->

                    </ul>
                </nav>
            </div>
            <div class="header__right">

                <a href="#" class="search-open"></a>
                <a href="#" class="search-close"></a>
            </div>
            <!-- search form -->

            <form action="search.php" method="get" class="search">
                <input type="text" name="search" class="search__field" placeholder="Search ....." autocomplete="off">
                <button class="search__button" name="search" type="submit"></button>
                <div class="search__enter">
                    Enter
                </div>
<!--                <div class="search__quick-links">-->
<!--                    <h6>Quick Links</h6>-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="#">Unlocking The Bible Codes</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">Mel Gibson movies</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">The Emerald Buddha</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">A Brief History Of Creation</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
            </form>
            <!-- /search form -->
            <a href="#" class="menu-open">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <a href="#" class="menu-close">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
        <div class="mobile-menu">
            <div class="mobile-menu__scroll-content">

            </div>
        </div>
    </header>
    <!--/HEADER-->
    <div id="content-ajax">
        <!--MAIN-->
        <main class="page__main main">
