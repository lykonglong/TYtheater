<div class="col-xxl-10 col-md-9 col-sm-8">
    <div class="row five-columns row--flex">
        <?php
        $query = "SELECT * FROM movies";
        $select_all_movies = mysqli_query($connection,$query);

        while ($row=mysqli_fetch_assoc($select_all_movies)){
        $movie_id = $row['movie_id'];
        $movie_title = $row['movie_title'];
        $movie_image = $row['movie_image'];
        $movie_resolution = $row['movie_resolution'];
        ?>
        <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">
            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">
                <div class="video-preview__image">
                    <span class="lazy-bg-img" data-original="movie/cover/<?php echo $movie_image; ?>"></span>
<!--                    <img  class="lazy-bg-img" src="movie/cover/--><?php //echo $movie_image; ?><!--" >-->
                    <div class="video-preview__info">
                        <div class="video-preview__likes">88%</div>
                        <div class="video-preview__quality"><?php echo $movie_resolution; ?></div>
                    </div>
                </div>
                <h4 class="video-preview__descr"><?php echo $movie_title ?></h4>
<!--                <h5 class="video-preview__descr"><?php echo $movie_desc ?></h5>-->
            </a>

        </div>
        <?php } ?>
<!--        <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_02.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">One word frees us of all the weight and pain of life: that word is love</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_03.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Don��t let your mind kill your heart and soul</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_04.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">People rejoice at the Sun, and I��m dreaming of the Moon</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_05.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Always forgive your enemies �� nothing annoys them so much</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_06.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">He, who does not love loneliness, does not love freedom</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_07.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">A dream becomes a goal when action is taken toward its achievement</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_08.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">He, who makes a beast of himself, gets rid of the pain of being a man</h5>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_09.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Illusion is the first of all pleasures</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_10.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Those who cannot change their minds cannot change anything</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_11.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">The memory warms you up inside, but it also breaks your soul apart</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_12.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">I remember everything what I 've forgotten</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_13.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">A man is always afraid of the unknown, because what is known is less scary</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_14.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Life is a foreign language; all men mispronounce it</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_15.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Every person gives away everything to another person what he lacked himself</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_16.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">No act of kindness, no matter how small, is ever wasted</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_17.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Don��t break up with your past until you��re sure in your future</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_18.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Every time we love, every time we give, it��s Christmas</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_19.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Only my dream keeps me alive</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_20.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">The only thing in life achieved without effort is failure</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_21.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Music is the soul of language</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_22.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Fall down seven times, stand up eight</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_23.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">The best thing in our life is love</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_24.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Everyone underwent something that changed him</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_25.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Music creates the feelings which you can��t find in life</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_01.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Those who love deeply never grow old; they may die of old age, but they die young</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_02.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">While I��m breathing �� I love and believe</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_03.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">I will get everything I want</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_04.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">The best love affairs are those we never had</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_05.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">If you want to be somebody, somebody really special, be yourself!</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_06.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">We frequently die in our own dreams</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_07.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Success doesn��t come to you. You go to it</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_08.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Every solution breeds new problems</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_09.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Respect the past, create the future!</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_10.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Wisdom is knowing how little we know</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_11.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Be loyal to the one who is loyal to you</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_12.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">I am not young enough to know everything</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_13.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Being entirely honest with oneself is a good exercise</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_14.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">I��ll get everything I want</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_15.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">By doing nothing we learn to do ill</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_16.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Everything takes longer than you think</h5>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_17.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">The rose speaks of love silently, in a language known only to the heart</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_18.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Experience is simply the name we give our mistakes</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_19.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">The most dangerous demons live in our hearts</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_20.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">If I ever surrender, it��ll happen only in mercy to the winner</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_21.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Success is not in what you have, but who you are</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_22.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">It does not matter how slowly you go so long as you do not stop</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_23.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">It is useful sometimes to recall your past in order to stronger value your present</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_24.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">I remember too much, that��s why I��m damn sad sometimes</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_25.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Remember that the most dangerous prison is the one in your head</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_01.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">It��s better to have ideals and dreams than nothing</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_02.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">The flame has burnt away, the ash remained, the joy has gone, the sadness remained</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_03.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Not to know is bad, not to wish to know is worse</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_04.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">There is nothing scary in the darkness, if you encounter it face-to-face</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_05.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Our greatest glory is not in never falling, but in getting up every time we do</h5>-->
<!--            </a>-->
<!--        </div>                           <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">-->
<!--            <a href="video.html" class="video-preview video-preview--sm js-ajax-link">-->
<!--                <div class="video-preview__image">-->
<!--                    <span class="lazy-bg-img" data-original="images/photo_06.jpg"></span>-->
<!--                    <div class="video-preview__info">-->
<!--                        <div class="video-preview__duration">12:04</div>-->
<!--                        <div class="video-preview__likes">88%</div>-->
<!--                        <div class="video-preview__quality">HD</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h5 class="video-preview__descr">Fear transfers the clever into the silly, and makes the strong be the weak</h5>-->
<!--            </a>-->
<!--        </div>                           -->
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