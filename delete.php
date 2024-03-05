<?php
$id=$_REQUEST['id'];
$name=$_REQUEST['tname'];

include('extra/connect.php');

if($name=='award')
{
	$row=mysqli_fetch_array($con->query("select * from award where id='$id'"));
	$file=$row['file'];
	unlink("files/$file");
	$con->query("delete from award where id='$id'");
	echo "<script>window.location.href='award';</script>";
}

if($name=='dox')
{
	$row=mysqli_fetch_array($con->query("select * from dox where id='$id'"));
	$file=$row['file'];
	unlink("files/$file");
	$con->query("delete from dox where id='$id'");
	echo "<script>window.location.href='dox';</script>";
}

if($name=='quiz')
{
	$row=mysqli_fetch_array($con->query("select * from quiz where id='$id'"));
	$file=$row['file'];
	unlink("files/$file");
	$con->query("delete from quiz where id='$id'");
	echo "<script>window.location.href='quiz';</script>";
}

if($name=='result')
{
	$row=mysqli_fetch_array($con->query("select * from result where id='$id'"));
	$file=$row['file'];
	unlink("files/$file");
	$con->query("delete from result where id='$id'");
	echo "<script>window.location.href='result';</script>";
}

if($name=='news')
{
	$con->query("delete from news where nid='$id'");
	echo "<script>window.location.href='news';</script>";
}

if($name=='latest_news')
{
	$row=mysqli_fetch_array($con->query("select * from latest_news where lid='$id'"));
	$file=$row['file'];
	unlink("files/$file");
	$con->query("delete from latest_news where lid='$id'");
	echo "<script>window.location.href='latestnews';</script>";
}

if($name=='faculty')
{
	$row=mysqli_fetch_array($con->query("select * from faculty where id='$id'"));
	$file=$row['file'];
	unlink("files/$file");
	$con->query("delete from faculty where id='$id'");
}

if($name=='managment')
{
	$row=mysqli_fetch_array($con->query("select * from managment where id='$id'"));
	$file=$row['file'];
	unlink("files/$file");
	$con->query("delete from managment where id='$id'");
}

if($name=='gallery')
{
	$row=mysqli_fetch_array($con->query("select * from gallery where id='$id'"));
	$file=$row['file'];
	unlink("gallery_img/$file");
    $res=$con->query("SELECT * FROM gallery_photo where gid='$id'");
    while($row2=mysqli_fetch_array($res))
    {   
    	$gpid=$row2['id'];
    	$file2=$row2['file'];
		unlink("gallery_img/$file2");
		$con->query("delete from gallery_photo where id='$gpid'");
	}
	$con->query("delete from gallery where id='$id'");
}

if($name=='gallery_photo')
{
	$row=mysqli_fetch_array($con->query("select * from gallery_photo where id='$id'"));
	$file=$row['file'];
	unlink("gallery_img/$file");
    $con->query("delete from gallery_photo where id='$id'");
}

if($name=='gallery_press')
{
	$row=mysqli_fetch_array($con->query("select * from gallery_press where id='$id'"));
	$file=$row['file'];
	unlink("gallery_img/$file");
	$con->query("delete from gallery_press where id='$id'");
}

if($name=='gallery_video')
{
	$con->query("delete from gallery_video where id='$id'");
	echo "<script>window.location.href='video-gallery';</script>";
}

if($name=='slider')
{
	$row=mysqli_fetch_array($con->query("select * from slider where id='$id'"));
	$file=$row['file'];
	unlink("gallery_img/$file");
	$con->query("delete from slider where id='$id'");
}
?>