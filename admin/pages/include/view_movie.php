<?php

if(isset($_GET['view'])){
    $movie_view_id=$_GET['view'];
    $query="select * from movies WHERE movie_id = $movie_view_id";
    $select_movie=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_movie)) {
        $movie_id = $row['movie_id'];
        $user_id_db = $row['user_id'];
        $movie_cate_id = $row['movie_cate_id'];
        $movie_title = $row['movie_title'];
        $movie_image = $row['movie_image'];
        $movie_description = $row['movie_description'];
        $movie_date_db = $row['movie_date'];
        $movie_date = date("d-m-Y", strtotime($movie_date_db));

        $movie_tags = $row['movie_tags'];
        $movie_trailer = $row['movie_trailer'];
        $movie_full = $row['movie_full'];
        $movie_resolution = $row['movie_resolution'];
        $status = $row['status'];
        $date_added = $row['date_added'];

        $cate_query = "select * from categories where cate_id=$movie_cate_id";
        $select_category = mysqli_query($connection, $cate_query);
        while ($row = mysqli_fetch_assoc($select_category)) {
            $cate_name = $row['cate_name'];
        }
    }
}

?>
<!-- Main content -->
<section class="content">
    <p style="text-align: center;font-size: 36px;">Form detail of movie​</p>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <!--<div class="box-header">
                  <h3 class="box-title">Hover Data Table</h3>
                </div>-->
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="addMovieForm">
                        <div class="box-body">
                            <!-- form start -->
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="movie_title" class="col-sm-3 control-label" style="font-size: 16px;">Movie Title</label>

                                    <div class="col-sm-9">

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file-video-o"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $movie_title ;?>" id="movie_title" name="movie_title" placeholder="Movie Title" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="movie_cate_id" class="col-sm-3 control-label" style="font-size: 16px;">Category</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $cate_name ;?>" id="movie_title" name="movie_title" placeholder="Movie Title" readonly>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="movie_date" class="col-sm-3 control-label" style="font-size: 16px;">Release Date</label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $movie_date;?>" id="datemask" name="movie_date" placeholder="Release Date" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="movie_tags" class="col-sm-3 control-label" style="font-size: 16px;">Movie Tags</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-tags"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $movie_tags;?>" id="movie_tags" name="movie_tags" placeholder="Movie Tags" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="movie_resolution" class="col-sm-3 control-label" style="font-size: 16px;">Resolution</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-magic"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $movie_resolution ;?>" id="movie_title" name="movie_title" placeholder="Movie Title" readonly>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dsc" class="col-sm-3 control-label" style="font-size: 16px;">Description</label>

                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="4" id="dsc" name="dsc" placeholder="Description" readonly><?php echo $movie_description; ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <img width=300 src="<?php echo BASE_URL; ?>/movie/cover/<?php echo $movie_image; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h2 align="center">Watch Trailer of <?php echo $movie_title; ?> below</h2>
                                    <video width="100%" height="600" controls>
                                        <source src="<?php echo BASE_URL; ?>/movie/trailer/<?php echo $movie_trailer; ?>" type="video/mp4"  >
                                    </video>
                                </div>
                                <div class="form-group">
                                    <h2 align="center">Watch Full of <?php echo $movie_title; ?> below</h2>
                                    <video width="100%" height="600" controls>
                                        <source src="<?php echo BASE_URL; ?>/movie/full/<?php echo $movie_full; ?>" type="video/mp4"  >
                                    </video>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" style="text-align: center;">
                            <a href="movie.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Back</button></a>
                            <a href="movie.php?action=edit_movie&edit=<?php echo $movie_id; ?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit">&nbsp;</i>Edit</button></a>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
