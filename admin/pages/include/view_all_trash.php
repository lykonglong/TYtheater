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
    .no-break-out {
        overflow:hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>
<section class="content-header">
    <h1>All trash movies</h1>
    <ol class="breadcrumb">
        <li><a href="../dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Movie</li>
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
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Resolution</th>
                            <th>Poster</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query="select * from movies WHERE status=0";
                        $select_movie=mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($select_movie)){
                            $movie_id= $row['movie_id'];
                            $user_id_db=$row['user_id'];
                            $movie_cate_id= $row['movie_cate_id'];
                            $movie_title= $row['movie_title'];
                            $movie_image= $row['movie_image'];
                            $movie_description= $row['movie_description'];
                            $movie_date= $row['movie_date'];
                            $movie_tags= $row['movie_tags'];
                            $movie_trailer= $row['movie_trailer'];
                            $movie_full= $row['movie_full'];
                            $movie_resolution= $row['movie_resolution'];
                            $status= $row['status'];
                            $date_added= $row['date_added'];


                            $cate_query="select * from categories where cate_id=$movie_cate_id";
                            $select_category=mysqli_query($connection,$cate_query);
                            while($row=mysqli_fetch_assoc($select_category)){
                                $cate_name=$row['cate_name'];
                            }
                            ?>
                            <tr>
                                <td style="line-height: 30px;font-size:;"><?php echo $movie_id;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $movie_title;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $cate_name;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $movie_resolution;?></td>
                                <!--<td style="line-height: 30px;font-size:;text-align: center;">
                                    <?php
/*                                    if($post_status=='Draft')
                                    {
                                        echo "<a href=\"posts.php?publish_id=$post_id \" onclick=\"return confirm('Do you want to publish this post?')\" class=\"btn btn-success btn-flat btn-sm\"><i class=\"fa fa-eye\"></i> Publish</a>";
                                    }
                                    elseif($post_status=='Publish')
                                    {
                                        echo "<a href=\"posts.php?draft_id=$post_id \" onclick=\"return confirm('Do you want to set this post to draft?')\" class=\"btn btn-danger btn-flat btn-sm\"><i class=\"fa fa-eye-slash\"></i> Draft</a>";
                                    }
                                    */?>

                                </td>-->
                                <td align="center"><img src="<?php echo BASE_URL; ?>/movie/cover/<?php echo $movie_image;?>" class="img-responsive" alt="<?php echo $movie_image;?>" style="height: 40px;"></td>
                                <td align="center" style="line-height: 30px;font-size:;" >
                                    <a href="trash.php?action=view_movie&view=<?php echo $movie_id; ?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-eye"></i> View</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="trash.php?restore=<?php echo $movie_id; ?>" onclick="return confirm('Are your sure?')" class="btn btn-success btn-flat btn-sm"><i class="fa fa-edit"></i> Restore</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="trash.php?delete=<?php echo $movie_id;?>" onclick="return confirm('Are your sure?')" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash-o"></i> Delete</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Resolution</th>
                            <th>Poster</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!--delete video from table video_post by id-->
                    <?php
                    if(isset($_GET['restore'])) {
                        $restore_id=$_GET['restore'];
                        $restore ="UPDATE movies SET status=1 WHERE movie_id=$restore_id";
                        $run_restore=mysqli_query($connection,$restore);
                        if($run_restore){
                            echo "<script language=\"javascript\">window.location.href = \"trash.php\"</script>";
                        }
                    }
                    elseif(isset($_GET['delete'])) {
                        $delete_id=$_GET['delete'];
                        $delete ="DELETE FROM movies WHERE movie_id=$delete_id";
                        $run_delete=mysqli_query($connection,$delete);
                        if($run_delete){
                            echo "<script language=\"javascript\">window.location.href = \"trash.php\"</script>";
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
