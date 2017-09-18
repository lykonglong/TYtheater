<!DOCTYPE html>
<html>
<title>Profile Management</title>
<?php
session_start();
require_once "../../includes/db.php";
include_once "include/function.php";


if($_SESSION['user_id'])
{
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $user_role = $_SESSION['user_role'];

    $s_user = "SELECT * FROM users WHERE user_id=$user_id";
    $run_s_user = mysqli_query($connection,$s_user);
    while($row = mysqli_fetch_assoc($run_s_user)) {
        $username=$row['username'];
        $fullname = $row['fullname'];
        $password = $row['password'];
        $decrypted= decryptIt($password);

        $date_added = $row['date_added'];
        $user_image = $row['user_image'];
    }
    ?>

    <!--This is header include-->
    <?php include "include/header.php"; ?>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!--This is header include-->
        <?php include "include/navigation.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <p style="text-align: center;font-size: 36px;">Edit profile form</p>
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3" style="text-align: center;">
                        <div class="box">
                            <div class="box-body">

                                <?php
                                if(isset($_POST['btnupdate'])){
                                    $new_username=mysqli_real_escape_string($connection,$_POST['new_username']);
                                    $old_password=mysqli_real_escape_string($connection,$_POST['old_password']);
                                    $new_password=mysqli_real_escape_string($connection,$_POST['new_password']);
                                    $cnew_password=mysqli_real_escape_string($connection,$_POST['cnew_password']);


                                    $encrypted = encryptIt( $new_password );

                                    if($decrypted == $old_password){
                                        if($new_password == $cnew_password){
                                            $update_query="UPDATE users SET username='$new_username', password='$encrypted' WHERE user_id=$user_id";
                                            $update_user=mysqli_query($connection,$update_query);
                                            if($update_user){
                                                echo "<script language=\"javascript\">window.location.href = \"../logout.php\"</script>";
                                            }else{
                                                echo "<div class=\"alert alert-danger\" role=\"alert\"><span style=''>Updating failed</span></div>";
                                            }
                                        }else{
                                            echo "<div class=\"alert alert-danger\" role=\"alert\"><span style=\"font-size: 20px;font-family: 'Times New Roman';\">Confirm password not match.</span></div>";
                                        }
                                    }else{
                                        echo "<div class=\"alert alert-danger\" role=\"alert\"><span style=\"font-size: 20px;font-family: 'Times New Roman';\">Password not match.</span></div>";
                                    }
                                }
                                ?>
                                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <!-- form start -->
                                        <div class="col-sm-12 ">
                                            <div class="form-group">
                                                <label for="fullname" class="col-sm-4 control-label" style="font-size: 16px;">Full name</label>

                                                <div class="col-sm-8" style="font-size: 16px;">
                                                    <input type="text" class="form-control" value="<?php echo $fullname;?>" id="fullname" name="fullname" placeholder="" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="new_username" class="col-sm-4 control-label" style="font-size: 16px;font-family: 'Times New Roman';">Username</label>

                                                <div class="col-sm-8" style="font-size: 16px;font-family: 'Times New Roman';">
                                                    <input type="text" class="form-control" value="<?php echo $username;?>" id="new_username" name="new_username" placeholder="Username" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="old_password" class="col-sm-4 control-label" style="font-size: 16px;font-family: 'Times New Roman';">Old Password</label>

                                                <div class="col-sm-8" style="font-size: 16px;font-family: 'Times New Roman';">
                                                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password" class="col-sm-4 control-label" style="font-size: 16px;font-family: 'Times New Roman';">New Password</label>

                                                <div class="col-sm-8" style="font-size: 16px;font-family: 'Times New Roman';">
                                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cnew_password" class="col-sm-4 control-label" style="font-size: 16px;font-family: 'Times New Roman';">Confirm new password</label>

                                                <div class="col-sm-8" style="font-size: 16px;font-family: 'Times New Roman';">
                                                    <input type="password" class="form-control" id="cnew_password" name="cnew_password" placeholder="Confirm new password" required>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <a href="movie.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
                                        <button type="submit" name="btnupdate" class="btn btn-success"><i class="fa fa-save">&nbsp;</i>Save</button>
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
            <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->
        <!--This is footer include-->
        <?php include "include/footer.php"; ?>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- InputMask -->
    <script src="../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "order": [[ 0, "desc" ]]

            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
        });

    </script>
    </body>

    <?php
}else
{
    echo "<script language=\"javascript\">window.location.href = \"movie.php\"</script>";
}
?>
</html>


