
<style>
    .stroke_text {
        color: yellow;
        text-shadow:
                -2px -2px 0 #000,
                2px -2px 0 #000,
                -2px 2px 0 #000,
                2px 2px 0 #000;
    }
</style>

    <div class="tp-banner-container clearfix">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                    echo getSlideActive();
                    echo getSlide();
                ?>
                <!--<div class="item active">
                    <img src="images/slider/kong-skull-island.jpg" alt="Los Angeles" style="width:100%;">
                    <div class="carousel-caption">
                        <h1 class="stroke_text">The movie title here</h1>
                        <a class="btn btn-danger" href="#">Watch Now</a>
                    </div>
                </div>

                <div class="item">
                    <img src="images/slider/movieall.jpg" alt="Chicago" style="width:100%;">
                    <div class="carousel-caption">
                        <h1 class="stroke_text">The movie title here</h1>
                        <a class="label btn-danger" href="#">Watch Now</a>
                    </div>
                </div>

                <div class="item">
                    <img src="images/slider/The-Great-Gatsby.jpg" alt="New york" style="width:100%;">
                    <div class="carousel-caption">
                        <h1 class="stroke_text">The movie title here</h1>
                        <a class="btn btn-danger" href="#">Watch Now</a>
                    </div>
                </div>-->

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

