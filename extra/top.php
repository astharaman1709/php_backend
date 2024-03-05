<?
	date_default_timezone_set('Asia/Kolkata');
    $date=date("Y-m-d");
    $timestamp = time();
    $ctime = date("h:i A", $timestamp);

    session_start();
    if(!$_SESSION['ntuser'])
        echo "<script>window.location.href='logout';</script>";

    $sesuser=$_SESSION['ntuser'];

    include_once('extra/connect.php');
    $con->set_charset('utf8');
    $data=mysqli_fetch_array($con->query("select * from user1 where userid='$sesuser'"));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="js/sweetalert.css">
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="shortcut icon" href="img/slogo.png"/>

</head>

<body>
<div id="savedata"></div>
<div id="overlay">
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
</div>
<div class="fadebg"></div>

<div class="sidemenu">
	<div class="logo">
        Admin
    </div>
    <div class="mymenu">
		<ul id="mymenu">
            <li><a href="home">Dashborad</a></li>
            <li><a href="slider">Banner Slider</a></li>
            <li><a href="faculty">Facultys</a></li>
            <li><a href="managments">Managments</a></li>
            <li><a href="#!">Notice / News <i class="fa fa-angle-down"></i></a>
                <ul id="down-menu">
                    <li><a href="news"><i class="fa fa-angle-double-right"></i> News</a></li>
                    <li><a href="latestnews"><i class="fa fa-angle-double-right"></i> Latest News</a></li>
                </ul>
            </li>
            <li><a href="#">Gallery <i class="fa fa-angle-down"></i></a>
                <ul id="down-menu">
                    <li><a href="gallery"><i class="fa fa-angle-double-right"></i> Image Gallery</a> </li>
                    <li><a href="press-gallery"><i class="fa fa-angle-double-right"></i> Press Gallery</a></li>
                    <li><a href="video-gallery"><i class="fa fa-angle-double-right"></i> Video Gallery</a> </li>
                </ul>
            </li>
            <li><a href="#">Downloads <i class="fa fa-angle-down"></i></a>
                <ul id="down-menu">
                    <li><a href="prospectus"><i class="fa fa-angle-double-right"></i> Prospectus</a></li>
                    <li><a href="calender"><i class="fa fa-angle-double-right"></i> Calendar</a></li>
                    <li><a href="sylabus"><i class="fa fa-angle-double-right"></i> Syllabus</a></li>
                </ul>
            </li>
            <li><a href="award">Awards</a></li>
            <li><a href="dox">Dox</a></li>
            <li><a href="quiz">Quiz</a></li>
            <li><a href="result">Results</a></li>
	 	</ul>
	</div>
</div>


<div class="top" id="top">
	<div class="col-sm-6 col-xs-7 toplogo pad0">
        <div class="tlogo">
            Admin
        </div>
        <!-- <div class="topsearch">
            <form>
                <i class="fa fa-search"></i>
                <input type="search" name="search" placeholder="Type to search">
            </form>
        </div> -->
	</div>
	<div class="col-sm-6 col-xs-4 pad0 topuser" align="right">
		<div class="topuser2">
            <a class="admin dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="img/user.png"></a>
            <div class="dropdown-menu pull-right">
                <div class="topmenuuser">
                    <img src="img/user.png">
                    <?echo $data['user_name'];?>
                </div>
                <div class="topmenulist">
                    <a href="profile"><i class="fa fa-user-o"></i> Profile</a>
                    <!-- <a href="password"><i class="fa fa-lock"></i> Change PSW.</a>
                    <a href="setting"><i class="fa fa-cog"></i> Setting</a> -->
                    <a href="logout"><i class="fa fa-power-off"></i> Log Out</a>
                </div>
            </div>
		</div>
		<div class="topuser3">
			<a class="admin dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="img/user.png"></a>
            <div class="dropdown-menu pull-right">
                <div class="topmenuuser">
                    <img src="img/user.png">
                    <?echo $data['user_name'];?>
                </div>
                <div class="topmenulist">
                    <a href="profile"><i class="fa fa-user-o"></i> Profile</a>
                    <!-- <a href="password"><i class="fa fa-lock"></i> Change PSW.</a>
                    <a href="setting"><i class="fa fa-cog"></i> Setting</a> -->
                    <a href="logout"><i class="fa fa-power-off"></i> Log Out</a>
                </div>
            </div>
		</div>        
	</div>
    <div class="col-xs-1 pad0 text-right">
        <i class="fa fa-bars mobilemenu"></i>
    </div>
</div>