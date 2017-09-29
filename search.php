<?php include  "includes/function.php" ?>
<?php  include "includes/header.php"; ?>
<?php  include "includes/nav.php"; ?>
<?php  include "includes/categories.php";
?>


<div class="col-xxl-10 col-md-9 col-sm-8">
    <div class="row five-columns row--flex">
        <?php

            if (isset($_GET ['search'])){
             $search = $_GET ['search'];
                $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 20; //movies per page
                $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
                $query = "SELECT * FROM movies WHERE movie_tags LIKE '%$search%' ORDER BY movie_id DESC";
            //DO NOT limit this query with LIMIT keyword, or...things will break!


            //these variables are passed via URL

            $links = 5;

                    $search_query = mysqli_query($connection, $query);

                    if (!$search_query){
                        die ("Query Failed". mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);
                    if($count==0){
                        echo "<h1>No Result</h1>";
                    }else {

            //$query = "SELECT * FROM movies ORDER BY movie_id DESC ";

            //$select_all_movies = mysqli_query($connection,$query);

    //        while ($row=mysqli_fetch_assoc($select_all_movies)){
    //        $movie_id = $row['movie_id'];
    //        $movie_title = $row['movie_title'];
    //        $movie_image = $row['movie_image'];
    //        $movie_resolution = $row['movie_resolution'];
            $paginator = new Paginator( $connection, $query );
            $results = $paginator->getData( $limit, $page );
            for ($p = 0; $p < count($results->data); $p++):
            $movie = $results->data[$p];
        ?>
        <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">

            <a href="trailer.php?movie=<?php echo $movie['movie_id']; ?>" class="video-preview video-preview--sm js-ajax-link">
                <div class="video-preview__image">
                    <span class="lazy-bg-img" data-original="movie/cover/<?php echo $movie['movie_image']; ?>"></span>
                    <div class="video-preview__info">
                        <div class="video-preview__quality"><?php echo $movie['movie_resolution']; ?></div>
                    </div>
                </div>
                <h4 class="video-preview__descr"><?php echo $movie['movie_title'] ?></h4>
            </a>
        </div>

        <?php  endfor; ?>

    </div>

    </div>
    </div>

</div>
<!--pagination-->
<?php
$links = 10;

echo $paginator->searchLinks($links,$search);
?>

                    <?php } } ?>
</div>
</div>
</div>
</main>
<!--/MAIN-->
<?php  include "includes/footer.php"; ?>