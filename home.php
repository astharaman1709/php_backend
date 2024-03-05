
<?
    include('extra/top.php');
?>

<div class="main">
    <!-- <div class="headding">Dashborad</div> -->
    <div class="col-sm-12 pad0">
        <div class="col-sm-4 pad20r">
            <div class="box">
                <div class="col-sm-9 col-xs-9 ddata">
                    <span>Total Managments</span><br><br>
                    <b><?echo mysqli_num_rows($con->query("SELECT * from managment"));?></b>
                </div>
                <div class="col-sm-3 col-xs-3 dicon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-sm-4 pad20r">
            <div class="box">
                <div class="col-sm-9 col-xs-9 ddata">
                    <span>Total Teachers</span><br><br>
                    <b><?echo mysqli_num_rows($con->query("SELECT * from faculty"));?></b>
                </div>
                <div class="col-sm-3 col-xs-3 dicon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>


    <div class="clear"></div>
</div>




<?include('extra/footer.php');?>
