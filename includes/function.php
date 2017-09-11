<?php
    function categories_C($count){
       global $connection;
       $query = "SELECT COUNT(movie_cate_id) as CatCount FROM movies WHERE movie_cate_id =$count";
       $query_count = mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($query_count)) {
            $CateCount=$row['CatCount'];
        }
        echo "$CateCount";
    }


?>