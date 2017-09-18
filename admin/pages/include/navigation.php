<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>TY</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>TY Theater</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <a href="../../">Home Site</a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="../dist/img/users/<?php echo $user_image;?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $fullname;?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../dist/img/users/<?php echo $user_image;?>" class="img-circle" alt="User Image">
              <p>
                <?php echo $fullname;?>
                <small>Member since <?php echo $date_added;?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="profile.php" class="btn btn-default btn-flat">Edit Profile</a>
              </div>
              <div class="pull-right">
                <a href="?log_out=true" class="btn btn-default btn-flat">Log out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php
  if(isset($_GET['log_out'])=='true'){
    session_destroy();
    echo "<script language=\"javascript\">window.location.href = \"../\"</script>";
  }
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../dist/img/users/<?php echo $user_image;?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $fullname;?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>

      <?php
        if($user_role=='Admin'){
      ?>
      <li>
        <a href="dashboard.php">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        <span class="pull-right-container">
          <!--<small class="label pull-right bg-red">3</small>-->
          <!--<small class="label pull-right bg-blue">17</small>-->
        </span>
        </a>
      </li>
      <li>
        <a href="movie.php">
          <i class="fa fa-video-camera"></i> <span>Movie</span>
        </a>
      </li>
      <li>
        <a href="category.php">
          <i class="fa fa-briefcase"></i> <span>Category</span>
        </a>
      </li>

      <li>
        <a href="users.php">
          <i class="fa fa-user"></i> <span>User</span>
        </a>
      </li>
      <li>
        <a href="slide.php">
          <i class="fa fa-sliders"></i> <span>Slide</span>
        </a>
      </li>
    <li>
        <a href="trash.php">
            <i class="fa fa-trash-o"></i> <span>Trash</span>
        </a>
    </li>
      <?php
      }elseif($user_role=='Subscriber'){
          ?>
        <li>
            <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                    <!--<small class="label pull-right bg-red">3</small>-->
                    <!--<small class="label pull-right bg-blue">17</small>-->
                </span>
            </a>
        </li>
          <li>
            <a href="movie.php">
              <i class="fa fa-video-camera"></i> <span>Movie</span>
            </a>
          </li>
          <li>
            <a href="category.php">
              <i class="fa fa-magic"></i> <span>Category</span>
            </a>
          </li>
          <li>
            <a href="trash.php">
                <i class="fa fa-trash-o"></i> <span>Trash</span>
            </a>
          </li>
      <?php

        }
      ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>