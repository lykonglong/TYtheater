<!DOCTYPE html>
<html>
<?php
session_start();
//error_reporting(0);
require_once "../../includes/db.php";
include 'include/function.php';
include '../../_config_inc.php';

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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo countMovie(); ?></h3>

                                <p>Movies</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-videocamera"></i>
                            </div>
                            <a href="movie.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo countCategory(); ?></h3>

                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-briefcase"></i>
                            </div>
                            <a href="category.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo countSlide(); ?></h3>

                                <p>Slide show</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-images"></i>
                            </div>
                            <a href="slide.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo countTrash(); ?></h3>

                                <p>Movies in trash</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-trash-a"></i>
                            </div>
                            <a href="trash.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-7">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest update movies</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Movie title</th>
                                        <th style="width: 130px">Category</th>
                                        <th style="width: 80px">Resolution</th>
                                        <th style="width: 100px">Release date</th>
                                    </tr>
                                    <?php
                                    $query="select * from movies WHERE status=1 ORDER BY movie_id DESC limit 5";
                                    $select_movie=mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($select_movie)){
                                    $movie_id= $row['movie_id'];
                                    $movie_cate_id= $row['movie_cate_id'];
                                    $movie_title= $row['movie_title'];
                                    $movie_date_db= $row['movie_date'];
                                    $movie_date = date("d-m-Y", strtotime($movie_date_db));
                                    $movie_resolution= $row['movie_resolution'];

                                    $cate_query="select * from categories where cate_id=$movie_cate_id";
                                    $select_category=mysqli_query($connection,$cate_query);
                                    while($row=mysqli_fetch_assoc($select_category)){
                                        $cate_name=$row['cate_name'];

                                    }
                                        $n=1;
                                    ?>
                                    <tr>
                                        <td><?php echo $n;?></td>
                                        <td><?php echo $movie_title;?></td>
                                        <td><?php echo $cate_name;?></td>
                                        <td><?php echo $movie_resolution;?></td>
                                        <td><?php echo $movie_date;?></td>
                                    </tr>
                                        <?php
                                        $n+=1;
                                    }
                                    ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">

                            </div>
                        </div>
                        <!-- /.box -->

                    </div>
                    <div class="col-md-5">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest slider</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Title</th>

                                    </tr>
                                    <?php
                                    $query="select * from slider ORDER BY slider_id DESC limit 5";
                                    $select_slider=mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($select_slider)){
                                        $slider_id = $row['slider_id'];
                                        $slider_title = $row['slider_title'];
                                        $slider_image= $row['slider_image'];

                                        ?>
                                        <tr>
                                            <td><?php echo $slider_id; ?></td>
                                            <td><?php echo $slider_title; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </table>
                            </div>
                            <!-- /.box-body -->
                            <!--<div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    <li><a href="#">&laquo;</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div>-->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->
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
                "autoWidth": false
            });
            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
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
