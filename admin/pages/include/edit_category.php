<?php
    if(isset($_GET['cate_id'])){
        $the_cate_id=$_GET['cate_id'];
        $query="select * from categories where cate_id=$the_cate_id";
        $select_category=mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_category)){
            
            $cate_id= $row['cate_id'];
            $cate_name= $row['cate_name'];
            
        }
    }

    if(isset($_POST['btnupdate'])){
        $new_cate_name=mysqli_real_escape_string($connection,$_POST['cate_name']);
        $update_query="UPDATE categories SET cate_name='$new_cate_name' WHERE cate_id=$the_cate_id ";
        $update_category=mysqli_query($connection,$update_query);
        if($update_category){
            header('location:category.php');
        }else{
            echo "failed";
        }
    }
    ?>

    <!-- Main content -->
    <section class="content">
        <p style="text-align: center;font-size: 36px;">Edit category form​</p>
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3" style="text-align: center;">
                <div class="box">

                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            <div class="box-body">
                                <!-- form start -->
                                
                                    <div class="form-group">
                                        <label for="cate_name" class="col-sm-4 control-label" style="font-size: 16px;">Category Name</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $cate_name ; ?>" id="cate_name" name="cate_name" placeholder="Category Name" required>
                                        </div>
                                    </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="category.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
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
    
