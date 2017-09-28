<!--INDEX 5 COL & LEFT SIDEBAR-->
<div class="inner">
    <div class="section section--last scrollreveal scrollAnimateFade">
        <div class="container">

            <div class="section__inner">

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

                                    <a href="category.php?category=<?php echo $cate_id; ?>" class="is-active">
                                        <span><?php echo $cate_name; ?></span>
                                        <span class="categories-menu__badge"><?php categories_C($cate_id);  ?></span>
                                    </a>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>

                </div>