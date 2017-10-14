<?php
    function categories_C($count){
       global $connection;
       $query = "SELECT COUNT(movie_cate_id) as CatCount FROM movies WHERE status=1 AND movie_cate_id =$count";
       $query_count = mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($query_count)) {
            $CateCount=$row['CatCount'];
        }
        echo "$CateCount";
    }

    function getSlideActive(){
        global $connection;
        $select_slide="SELECT * FROM slider ORDER BY slider_id DESC limit 1";
        $run_select_slide = mysqli_query($connection,$select_slide);
        while ($row_slide = mysqli_fetch_assoc($run_select_slide)){
            ?>
            <div class="item active">
                <img src="<?php echo BASE_URL; ?>/images/slider/<?php echo $row_slide['slider_image'];?>" alt="<?php echo $row_slide['slider_title'];?>" style="height:460px;width:100%;">
                <div class="carousel-caption">
                    <h1 class="stroke_text"><?php echo $row_slide['slider_title'];?></h1>
                    <a class="btn btn-danger" href="<?php echo $row_slide['slider_link'];?>">Watch Now</a>
                </div>
            </div>
            <?php
        }
    }
function getSlide(){
    global $connection;
    $select_slide="SELECT * FROM slider ORDER BY slider_id DESC limit 1,5";
    $run_select_slide = mysqli_query($connection,$select_slide);
    while ($row_slide = mysqli_fetch_assoc($run_select_slide)){
        ?>
        <div class="item">
            <img src="<?php echo BASE_URL; ?>/images/slider/<?php echo $row_slide['slider_image'];?>" alt="<?php echo $row_slide['slider_title'];?>" style="height:460px;width:100%;">
            <div class="carousel-caption">
                <h1 class="stroke_text"><?php echo $row_slide['slider_title'];?></h1>
                <a class="btn btn-danger" href="<?php echo $row_slide['slider_link'];?>">Watch Now</a>
            </div>
        </div>
        <?php
    }
}
?>