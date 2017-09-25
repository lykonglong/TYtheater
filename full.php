<?php include  "includes/function.php" ?>
<?php  include "includes/header.php"; ?>
<?php /* include "includes/nav.php"; */?>

<?php

if(isset($_GET['movie'])){
    $movie_id=$_GET['movie'];
    $pre_st=$connection->prepare("select * from movies where movie_id=?");
    $pre_st->bind_param("s",$movie_id);
    $pre_st->execute();
    $select_movie=$pre_st->get_result();
    //$row=$select_video->num_rows;
    while($row= $select_movie->fetch_assoc()){
        $movie_full=$row['movie_full'];
    }

}
?>

    <main class="page__main main" style="padding-top:50px;">
        <!--VIDEO-->
        <div class="inner">
            <div class="container">
                <div class="info__inner">
<!--                <div class="info__content">-->
                        <video src="movie/full/<?php echo $movie_full; ?>" controls autoplay preload="auto"  width="100%" height="100%" controlsList="nodownload" id="myVideoFile"></video>
<!--                </div>-->
                </div>
            </div>
        </div>
        <!--/VIDEO-->
    </main>
<?php  include "includes/footer.php"; ?>