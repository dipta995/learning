<?php 

  include_once '../include/ViewClass.php';
  
  include_once '../include/InsertClass.php';
  include_once '../include/DeleteClass.php';
  
  $viewcls = new ViewClass();
  $senddata = new InsertClass();
  $deletedata = new DeleteClass();
  session_start();
    if (!isset($_SESSION['true'])) {
echo "<script> window.location = 'login.php';</script>";}
$adminid= $_SESSION['admin_id'];

  if (isset($_GET['logout'])=='action') {
    session_destroy();
    echo "<script> window.location = 'login.php';</script>"; }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
< 
<!------ Include the above in your HEAD tag ---------->
 
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script href="js/style.js"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="https://bryanrojasq.wordpress.com">
                    <img src="http://placehold.it/200x50&text=LOGO" alt="LOGO">
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                    </a>
                </li>            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username =$_SESSION['name']; ?> <b class="fa fa-angle-down"></b></a>
                    <ul class="dropdown-menu">
                       <!--  <li><a href="editprofile.php"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li> -->
                       <!--  <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                        <li class="divider"></li> -->
                        <li><a href="?logout=action"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!-- <li>
                        <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> MENU 1 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                        <ul id="submenu-1" class="collapse">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.1</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.2</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.3</a></li>
                        </ul>
                    </li> -->
                    <!-- <li>
                        <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  MENU 2 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                        <ul id="submenu-2" class="collapse">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.1</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.2</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.3</a></li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="student.php"><i class="fa fa-fw fa-user-plus"></i>Student Profile</a>
                    </li>
                    <li>
                        <a href="studentenroll.php"><i class="fa fa-fw fa-paper-plane-o"></i>Student Payment</a>
                    </li>
                    <li>
                        <a href="teacher.php"><i class="fa fa-fw fa fa-question-circle"></i>Teacher Profile</a>
                    </li>
                    <li>
                        <a href="cat.php"><i class="fa fa-fw fa fa-question-circle"></i>Catagory</a>
                    </li>
           


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>