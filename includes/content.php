
<div class="col-xxl-10 col-md-9 col-sm-8">
    <div class="row five-columns row--flex">
	 <?php
        $query = "SELECT * FROM movies";
        $select_all_movies = mysqli_query($connection,$query);

        while ($row=mysqli_fetch_assoc($select_all_movies)){
        $movie_id = $row['movie_id'];
        $movie_title = $row['movie_title'];
        $movie_image = $row['movie_image'];
        $movie_desc = $row['movie_description'];
        $movie_date = $row['date_added'];
        $movie_resolution = $row['movie_resolution'];
        ?>
        <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">
			<a href="video.html" class="video-preview video-preview--sm js-ajax-link">
					<div class="video-preview__image" >
						<span class="lazy-bg-img" data-original="movie/cover/<?php echo $movie_image; ?>" ></span>
	
						<div class="video-preview__info">							
							<div class="video-preview__quality"><?php echo $movie_resolution; ?></div>
						</div>
					</div>
					<h4 class="video-preview__descr"><?php echo $movie_title ?></h4>
			</a>
        </div>  
		<?php } ?>		
		
        </div>                        
		</div>
</div>
</div>
<!--pagination-->
<div class="page-controls">
    <a href="#" class="show-more">Show more</a>
    <div class="pagination">
        <ul class="pagination__pages">
            <li>
                <button class="pagination__prev" disabled="disabled"></button>
            </li>
            <li class="is-active"><a href="#">1</a>
            </li>
            <li><a href="#">2</a>
            </li>
            <li><a href="#">3</a>
            </li>
            <li><a href="#">4</a>
            </li>
            <li><a href="#">5</a>
            </li>
            <li><a href="#">6</a>
            </li>
            <li><a href="#">7</a>
            </li>
            <li><a href="#">8</a>
            </li>
            <li><a href="#">9</a>
            </li>
            <li><span>...</span>
            </li>
            <li><a href="#">336</a>
            </li>
            <li>
                <button class="pagination__next"></button>
            </li>
        </ul>
    </div>
</div>               </div>
</div>
</div>


</main>
<!--/MAIN-->