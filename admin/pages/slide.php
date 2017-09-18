<!DOCTYPE html>
<html>
<title>Slider Management</title>
<?php
session_start();
//error_reporting(0);
require_once "../../includes/db.php";
include '../../_config_inc.php';

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$user_role = $_SESSION['user_role'];

$s_user = "SELECT * FROM users WHERE user_id=$user_id";
$run_s_user = mysqli_query($connection,$s_user);
while($row = mysqli_fetch_assoc($run_s_user)) {
    $username = $row['username'];
    $fullname = $row['fullname'];
    $user_image = $row['user_image'];
    $date_added = $row['date_added'];
}

if($user_role=='Admin')
{
?>

<!--This is header include-->
<?php include "include/header.php"; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!--This is header include-->
    <?php include "include/navigation.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <?php
        if(isset($_GET['action'])){
            $source = $_GET['action'];
        }else{
            $source='';
        }
        switch($source){
            case 'edit_slide';
                include "include/edit_slide.php";
                break;
            default:
                include "include/view_all_slide.php";
        }
        ?>

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
<!-- bootstrap color picker -->
<script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "order": [[ 0, "DESC" ]]
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

    });

</script>
</body>
    <?php
}
else
{
    echo "<script language=\"javascript\">window.location.href = \"../\"</script>";
}
?>
</html>
