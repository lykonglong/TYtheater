<?php
if(isset($_GET['user_id'])){
    $the_user_id=$_GET['user_id'];
    $query="select * from users where user_id=$the_user_id";
    $select_user=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_user)){
        $user_id= $row['user_id'];
        $username= $row['username'];
        $fullname= $row['fullname'];
        $password= $row['password'];
        $user_role_db= $row['user_role'];
        $user_image= $row['user_image'];
    }
}

if(isset($_POST['btnupdate'])){
    $new_username=mysqli_real_escape_string($connection,$_POST['username']);
    $new_fullname=mysqli_real_escape_string($connection,$_POST['fullname']);
    $new_user_role=mysqli_real_escape_string($connection,$_POST['user_role']);

    $new_user_image=$_FILES['user_image']['name'];
    $new_user_image_temp=$_FILES['user_image']['tmp_name'];


    if($new_user_image==""){
        $new_user_image = $user_image;
    }else{
        unlink( '../dist/img/users/'.$user_image);
    }

    $update_query="UPDATE users SET username='$new_username',fullname='$new_fullname',user_image='$new_user_image',user_role='$new_user_role' WHERE user_id=$the_user_id";
    $update_user=mysqli_query($connection,$update_query);
    if($update_user){
//        header('location:users.php');
        move_uploaded_file($new_user_image_temp,"../dist/img/users/".$new_user_image);
        echo "<script language=\"javascript\">window.location.href = \"users.php\"</script>";
    }else{
        echo "failed";
    }
}
?>

<!-- Main content -->
<section class="content">
    <p style="text-align: center;font-size: 36px;">Edit user form​</p>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3" style="text-align: center;">
             <div class="box">
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="box-body">
                            <!-- form start -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label" style="font-size: 16px;">Username</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $username;?>" id="username" name="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fullname" class="col-sm-3 control-label" style="font-size: 16px;">Full Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $fullname ;?>" id="fullname" name="fullname" placeholder="Full name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_role" class="col-sm-3 control-label" style="font-size: 16px;">User Role</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="user_role" name="user_role" style="width: 100%;" required>
                                            <option selected="selected" value="<?php echo $user_role_db;?>"><?php echo $user_role_db;?></option>
                                            <?php
                                            if ($user_role_db == 'Subscriber'){
                                                echo "<option value='Admin'>Admin</option>";
                                            }else{
                                                echo "<option value='Subscriber'>Subscriber</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_old_image" class="col-sm-3 control-label" style="font-size: 16px;">Old Image</label>
                                    <div class="col-sm-9">
                                        <img width=150 src="../dist/img/users/<?php echo $user_image; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_image" class="col-sm-3 control-label" style="font-size: 16px;">User Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" id="user_image" name="user_image" onchange="document.getElementById('s_image').src = window.URL.createObjectURL(this.files[0]);">
                                        <p class="help-block col-sm-offset-2"> <span style="color: red;font-size: 14px;" >Please upload the square photo</span></p>
                                    </div>
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <img id="s_image" alt="Preview" width="250" height="250"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="users.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
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
