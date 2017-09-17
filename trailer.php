<?php include  "includes/function.php" ?>
<?php  include "includes/header.php"; ?>
<?php  include "includes/nav.php"; ?>
<?php

    if(isset($_GET['movie'])){
        $movie_id=$_GET['movie'];
        $pre_st=$connection->prepare("select * from movies where movie_id=?");
        $pre_st->bind_param("s",$movie_id);
        $pre_st->execute();
        $select_movie=$pre_st->get_result();
        //$row=$select_video->num_rows;
        while($row= $select_movie->fetch_assoc()){
            $movie_id=$row['movie_id'];
            $user_id=$row['user_id'];
            $movie_cate_id=$row['movie_cate_id'];
            $movie_title=$row['movie_title'];
            $movie_description = $row['movie_description'];
            $movie_trailer=$row['movie_trailer'];
            $movie_full=$row['movie_full'];
            $date_added=$row['date_added'];
            $movie_tags=$row['movie_tags'];
            $movie_date=$row['movie_date'];
            $movie_resolution=$row['movie_resolution'];
            $movie_image=$row['movie_image'];

            $select_user ="SELECT * FROM users WHERE user_id = $user_id";
            $run_select_user =mysqli_query($connection,$select_user);
            while($row_user=mysqli_fetch_assoc($run_select_user))
            {
                $username=$row_user['username'];
                $fullname=$row_user['fullname'];
            }

            $select_cate ="SELECT * FROM categories WHERE cate_id = $movie_cate_id";
            $run_select_cate =mysqli_query($connection,$select_cate);
            while($row_cate=mysqli_fetch_assoc($run_select_cate))
            {
                $cate_name=$row_cate['cate_name'];
            }
        }

    }
?>
    <main class="page__main main">
        <!--VIDEO-->
        <div class="inner">
                <div class="container">
                    <div class="info__inner">
<!--                        <div class="info__content">-->
                                <video src="movie/trailer/<?php echo $movie_trailer; ?>" controls autoplay preload="auto"  width="100%" height="100%" controlsList="nodownload" id="myVideoFile"></video>
                            <div class="bnr-container bnr-container--lg">
                                <a href="full.php?movie=<?php echo $movie_id; ?>" target="_blank">
                                    <span class="banner-image lazy-bg-img" data-original="images/watch.png"></span>
                                </a>
                            </div>
                            <div class="video-info">
                                <div class="video-info__left">
                                    <div class="video-preview__image" style="padding-bottom: 234px;">
                                        <span class="lazy-bg-img" data-original="movie/cover/<?php echo $movie_image; ?>"></span>
                                    </div>
                                </div>
                                <div class="video-info__right">
                                    <div class="video-specs">
                                        <div class="video-specs__left">
                                            <p class="video-spec">
                                                <span>Title:</span>
                                                <?php echo $movie_title;?>
                                            </p>
                                            <p class="video-spec">
                                                <span>Date Release: </span>
                                                <?php echo $movie_date; ?>
                                            </p>
                                            <p class="video-spec">
                                                <span>Added:</span>
                                                <?php echo $date_added;?>
                                            </p>
                                        </div>
                                        <div class="video-specs__right">
                                            <p class="video-spec">
                                                <span>Resolution: </span>
                                                <a href="actor-profile.html" class="js-ajax-link"><?php echo $movie_resolution; ?></a href="actor-profile.html">
                                            </p>
                                            <p class="video-spec video-spec--category">
                                                <span>Category:</span>
                                                <a href="#" class="video-specs__category"><?php echo $cate_name; ?></a>
                                            </p>
                                            <p class="video-spec video-spec--tags">
                                                <span>Tags:</span>
                                                    <?php
                                                    $tag_explode = explode(",",$movie_tags);
                                                     foreach ($tag_explode as $item) {
                                                         echo "<a href=\"#\" class=\"video-specs__tag\">$item</a>";
                                                     }
                                                    ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="video-info__descr">
                                    <h3>Moive desciption</h3>
                                    <p>
                                        <?php echo $movie_description; ?>
                                    </p>
                                </div>

                            </div>

                    </div>
                </div>
        </div>
        <!--/VIDEO-->

    </main>

<?php  include "includes/footer.php"; ?>