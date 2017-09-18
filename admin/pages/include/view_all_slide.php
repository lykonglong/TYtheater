<style>
    th{
        text-align: center;

    }
    td,th{
        max-width: 130px;
        overflow:hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

</style>
<?php
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$user_role = $_SESSION['user_role'];
if($user_id)
{

?>

<section class="content-header">
    <h1>
        Page Slider
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal"><i style="font-size: large;" class="fa fa-plus">&nbsp;New Slider</i></button>
        <!--<small>Preview page</small>-->
        <?php
        if(isset($_POST['btninsert'])){
            $slider_title=mysqli_real_escape_string($connection,$_POST['slider_title']);
            $slider_link =mysqli_real_escape_string($connection,$_POST['slider_link']);
            $slider_image=$_FILES['slider_image']['name'];
            $slider_image_temp=$_FILES['slider_image']['tmp_name'];


            $insert_slider ="INSERT INTO slider (slider_title, slider_image, slider_link)  VALUE ('$slider_title','$slider_image','$slider_link')";
            $create_slider=mysqli_query($connection,$insert_slider);
            if( $create_slider){
                move_uploaded_file($slider_image_temp,"../dist/img/slider/".$slider_image);
                echo "<script language=\"javascript\">window.location.href = \"slide.php\"</script>";
            }else
            {
                echo "Inserting failed!";
            }
        }
        ?>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Add New Slider</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="">
                                <div class="box-body">
                                    <!-- form start -->
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="slider_title" class="col-sm-3 control-label" style="font-size: 16px;">Slide Title</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-sliders"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="slider_title" name="slider_title" placeholder="Slide Title" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="slider_link" class="col-sm-3 control-label" style="font-size: 16px;">Link</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-link"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="slider_link" name="slider_link" placeholder="Link" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="slider_image" class="col-sm-3 control-label" style="font-size: 16px;">Slide Image</label>
                                                <div class="col-sm-9">
                                                    <input type="file" id="slider_image" name="slider_image" onchange="document.getElementById('s_image').src = window.URL.createObjectURL(this.files[0]);" required>
                                                    <p class="help-block col-sm-offset-2"> <span style="color: red;font-size: 14px;" ></span></p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <img id="s_image" alt="Preview" width="530" height="200"/>
                                                </div>
                                            </div>


                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer" style="text-align: center;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">&nbsp;</i>Cancel</button>
                            <button type="submit" name="btninsert" class="btn btn-success"><i class="fa fa-check-circle">&nbsp;</i>Insert</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /End of Modal -->

    </h1>
    <ol class="breadcrumb">
        <li><a href="../dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Customer</li>
    </ol>
</section>

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
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>No</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $query="select * from slider";
                        $select_slider=mysqli_query($connection,$query);
                        $n = mysqli_num_rows($select_slider);
                        while($row = mysqli_fetch_assoc($select_slider)){
                            $slider_id = $row['slider_id'];
                            $slider_title = $row['slider_title'];
                            $slider_link = $row['slider_link'];
                            $slider_image= $row['slider_image'];
                            ?>
                            <tr>
                                <td hidden style="line-height: 30px;font-size:;"><?php echo $slider_id ;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $n ;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $slider_title;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $slider_link;?></td>

                                <td align="center" style=""><img src="../dist/img/slider/<?php echo $slider_image;?>" class="img-responsive" alt="<?php echo $slider_image;?>" style="height: 30px;"></td>
                                <td align="center" style="line-height: 30px;font-size:;" >
                                    <a href="slide.php?action=edit_slide&slide_id=<?php echo $slider_id; ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="slide.php?delete=<?php echo $slider_id;?>&image=<?php echo $slider_image;?>" onclick="return confirm('Are your sure?')" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash-o"></i> Delete</a></td>
                            </tr>
                            <?php
                            $n--;
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th hidden>ID</th>
                            <th>No</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!--delete video from table video_post by id-->
                    <?php
                    if(isset($_GET['delete'])){
                        $this_slide_id=$_GET['delete'];
                        $image=$_GET['image'];
                        $query="delete from slider where slider_id = $this_slide_id";
                        $delete_query=mysqli_query($connection,$query);
                        if($delete_query)
                        {
                            unlink( '../dist/img/slider/'.$image);
                            echo "<script language=\"javascript\">window.location.href = \"slide.php\"</script>";
                        }

                    }
                    ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
    <?php
}
else
{
    header('location:../index.php');
}
?>