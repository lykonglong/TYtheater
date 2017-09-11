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
    <h1>
        Page Categories
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#maincategory"><i style="font-size: large;" class="fa fa-plus">&nbsp;Add Category</i></button>
        <!--<small>Preview page</small>-->
        <?php
        if(isset($_POST['btninsert'])){
            $cate_name=mysqli_real_escape_string($connection,$_POST['cate_name']);


            $insert_category ="Insert into categories (cate_name) VALUES ('$cate_name') " ;
            $run_insert_category=mysqli_query($connection,$insert_category);
            if($run_insert_category){
                header('location:category.php');
            }else
            {
                echo "Inserting failed!";
            }
        }
        ?>
        <!-- Modal -->

        <div id="maincategory" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Category</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="">
                                <div class="box-body">
                                    <!-- form start -->
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="cate_name" class="col-sm-3 control-label" data-toggle="" style="font-size: 16px;">Category Name</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="cat_name" name="cate_name" placeholder="Category Name" required>
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
        <li class="active">Category</li>
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
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query="select * from categories ORDER  BY cate_id DESC";
                        $select_category=mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($select_category)){
                            $cate_id= $row['cate_id'];
                            $cate_name= $row['cate_name'];

                            ?>
                            <tr>
                                <td style="line-height: 30px;font-size:;"><?php echo $cate_id; ?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $cate_name; ?></td>

                                <td align="center" style="line-height: 30px;font-size:;" ><a href="category.php?action=edit_category&cate_id=<?php echo $cate_id; ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="category.php?delete=<?php echo $cate_id;?>" onclick="return confirm('Are your sure?')" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash-o"></i> Delete</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!--delete video from table video_post by id-->
                    <?php
                    if(isset($_GET['delete'])){
                        $this_cat_id=$_GET['delete'];
                        echo $this_cat_id;
                        $query="delete from categories where cate_id = $this_cat_id";
                        $delete_query=mysqli_query($connection,$query);
                        header("Location: category.php");
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
