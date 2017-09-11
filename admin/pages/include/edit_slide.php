<?php

    if(isset($_GET['slide_id'])){
        $the_slide_id=$_GET['slide_id'];
        $query="select * from slider where slider_id=$the_slide_id";
        $select_slider=mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_slider)){
            $slider_id = $row['slider_id'];
            $slider_title = $row['slider_title'];
            $slider_link = $row['slider_link'];
            $slider_image= $row['slider_image'];
        }
    }

    if(isset($_POST['btnupdate'])){
        $new_slider_title=mysqli_real_escape_string($connection,$_POST['slider_title']);

        $new_slider_image=$_FILES['slider_image']['name'];
        $new_slider_image_temp=$_FILES['slider_image']['tmp_name'];


        if($new_slider_image==""){
            $new_slider_image = $slider_image;
        }else{
            unlink( '../dist/img/slider/'.$slider_image);
        }
        $new_slider_link=mysqli_real_escape_string($connection,$_POST['slider_link']);

        $update_query="UPDATE slider set slider_title='$new_slider_title',slider_image='$new_slider_image',slider_link='$new_slider_link' WHERE slider_id=$the_slide_id";
        $update_slider=mysqli_query($connection,$update_query);
        if($update_slider){
            //header('location:movie.php');
            move_uploaded_file($new_slider_image_temp,"../dist/img/slider/".$new_slider_image);
            echo "<script language=\"javascript\">window.location.href = \"slide.php\"</script>";
        }else{
            echo "failed";
        }
    }
    ?>

    <!-- Main content -->
    <section class="content">
        <p style="text-align: center;font-size: 36px;">Edit slider form​</p>
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3" style="text-align: center;">
                <div class="box">
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            <div class="box-body">
                                <!-- form start -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="slider_title" class="col-sm-3 control-label" style="font-size: 16px;">Slide Title</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $slider_title;?>" id="slider_title" name="slider_title" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="slider_link" class="col-sm-3 control-label" style="font-size: 16px;">Link</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $slider_link ;?>" id="slider_link" name="slider_link" placeholder="Full name" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="slider_old_image" class="col-sm-3 control-label" style="font-size: 16px;">Old Image</label>
                                        <div class="col-sm-8">
                                            <img width=150 src="../dist/img/slider/<?php echo $slider_image; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="slider_image" class="col-sm-3 control-label" style="font-size: 16px;">User Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" id="slider_image" name="slider_image" onchange="document.getElementById('s_image').src = window.URL.createObjectURL(this.files[0]);">
                                            <p class="help-block col-sm-offset-2"> <span style="color: red;font-size: 14px;" ></span></p>
                                        </div>
                                        <label for="" class="col-sm-3 control-label" style="font-size: 16px;"></label>
                                        <div class="col-sm-8">
                                            <img id="s_image" alt="Preview" width="150" height="200"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="slide.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
                                <button type="submit" name="btnupdate" class="btn btn-success"><i class="fa fa-check-circle">&nbsp;</i>Update</button>
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
