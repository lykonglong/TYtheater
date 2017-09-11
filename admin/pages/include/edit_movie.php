<?php

if(isset($_GET['edit'])){
    $movie_edit_id=$_GET['edit'];
    $query="select * from movies WHERE movie_id = $movie_edit_id";
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

if(isset($_POST['btnupdate'])){
    $new_movie_cate_id=mysqli_real_escape_string($connection,$_POST['movie_cate_id']);
    $new_movie_title=mysqli_real_escape_string($connection,$_POST['movie_title']);

    $new_movie_image=$_FILES['movie_image']['name'];
    $new_movie_image_temp=$_FILES['movie_image']['tmp_name'];
    move_uploaded_file($new_movie_image_temp,"../../movie/cover/".$new_movie_image);
    if($new_movie_image==""){
        $new_movie_image = $movie_image;
    }

    $new_movie_description=mysqli_real_escape_string($connection,mb_convert_encoding($_POST['dsc'],"UTF-8","auto") );

    $new_movie_date=mysqli_real_escape_string($connection,$_POST['movie_date']);
    $datesort= str_replace('/', '-', "$new_movie_date");
    $new_movie_date_insert= date('Y-m-d',strtotime($datesort));

    $new_movie_tags=mysqli_real_escape_string($connection,$_POST['movie_tags']);
    $new_movie_trailer=mysqli_real_escape_string($connection,$_POST['movie_trailer']);
    $new_movie_full=mysqli_real_escape_string($connection,$_POST['movie_full']);
    $new_movie_resolution=mysqli_real_escape_string($connection,$_POST['movie_resolution']);

    $update_query="UPDATE movies SET movie_cate_id=$new_movie_cate_id, movie_title='$new_movie_title',movie_image='$new_movie_image',movie_description='$new_movie_description',movie_date='$new_movie_date_insert',movie_tags='$new_movie_tags',movie_trailer='$new_movie_trailer',movie_full='$new_movie_full',movie_resolution='$new_movie_resolution' WHERE movie_id=$movie_edit_id";
    $update_movie=mysqli_query($connection,$update_query);
    if($update_movie){
        echo "<script language=\"javascript\">window.location.href = \"movie.php\"</script>";
    }else{
        echo "failed";
    }
}
?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            <div class="box-body">
                                <!-- form start -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="movie_title" class="col-sm-3 control-label" style="font-size: 16px;">Movie Title</label>

                                        <div class="col-sm-9">

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $movie_title ;?>" id="movie_title" name="movie_title" placeholder="Movie Title" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="movie_cate_id" class="col-sm-3 control-label" style="font-size: 16px;">Category</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <select class="form-control" id="movie_cate_id" name="movie_cate_id" style="width: 100%;" required>
                                                    <option selected="selected" value="<?php echo $movie_cate_id;?>"><?php echo $cate_name;?></option>
                                                    <?php
                                                    getCategory();
                                                    ?>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="movie_date" class="col-sm-3 control-label" style="font-size: 16px;">Release Date</label>

                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $movie_date;?>" id="datemask" name="movie_date" placeholder="Release Date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="movie_tags" class="col-sm-3 control-label" style="font-size: 16px;">Movie Tags</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $movie_tags;?>" id="movie_tags" name="movie_tags" placeholder="Movie Tags" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="movie_resolution" class="col-sm-3 control-label" style="font-size: 16px;">Resolution</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <select class="form-control" id="movie_resolution" name="movie_resolution" style="width: 100%;" required>
                                                    <option selected="selected" value="<?php echo $movie_resolution; ?>"><?php echo $movie_resolution; ?></option>
                                                    <?php
                                                        if($movie_resolution=="HD 1080p"){
                                                            echo "<option value=\"HD 720p\">HD 720p</option>";
                                                        }else
                                                        {
                                                            echo "<option selected=\"selected\" value=\"HD 1080p\">HD 1080p</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dsc" class="col-sm-3 control-label" style="font-size: 16px;">Description</label>

                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="4" id="dsc" name="dsc" placeholder="Description"><?php echo $movie_description; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="movie_trailer" class="col-sm-3 control-label" style="font-size: 16px;">Movie Trailer</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $movie_trailer; ?>" id="movie_trailer" name="movie_trailer" placeholder="Movie Trailer">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="movie_full" class="col-sm-3 control-label" style="font-size: 16px;">Movie Full</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $movie_full; ?>" id="movie_full" name="movie_full" placeholder="Movie Full">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="old_cover" class="col-sm-3 control-label" style="font-size: 16px;">Old Cover</label>
                                        <div class="col-sm-4 ">
                                            <img width=150 src="<?php echo BASE_URL; ?>/movie/cover/<?php echo $movie_image; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="movie_image" class="col-sm-3 control-label" style="font-size: 16px;">New Movie Cover</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="movie_image" name="movie_image" onchange="document.getElementById('cover').src = window.URL.createObjectURL(this.files[0]),ValidateInputImage(this);">

                                        </div>
                                        <div class="col-sm-5">
                                            <p class="help-block col-sm-offset-2" align="right"> <span style="color: red;font-size: 16px;" >Cover</span></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <img id="cover" alt="Preview" width="150" height="200" align="center" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" style="text-align: center;">
                                <a href="movie.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
                                <button type="submit" name="btnupdate" class="btn btn-success"><i class="fa fa-check-circle">&nbsp;</i>Save</button>
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
