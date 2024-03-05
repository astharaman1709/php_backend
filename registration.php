
<?include('extra/top.php');?>

<div class="main">
    <div class="col-sm-12 pad0 headdingnav">
        <div class="col-sm-6 pad0"><div class="headding">Registration Form</div></div>
        <div class="col-sm-6 pad0" align="right">
            <a href="home" class="btn batt"><i class="fa fa-arrow-left"></i> Back</a>
        </div>   
        <div class="clear"></div>
    </div>

    <div class="col-sm-12 page_area">
        <div class="pagewrok">
            <table id="example" class="table table-bordered">
                <thead>
                    <tr class="tr">
                        <td width="50">#</td>
                        <td>Reg. No.</td>
                        <td>Reg. Date</td>
                        <td>Session</td>
                        <td>Class</td>
                        <td>Name</td>
                        <td>Gender</td>
                        <td>Father' Name</td>
                        <td>Mother's Name</td>
                        <td align="center">Action</td>
                    </tr>
                </thead>
                <?
                    $sql="SELECT * FROM registration order by(reg_no) desc";
                    $res=$con->query($sql);
                    while($row=mysqli_fetch_array($res))
                    {   $id=$row['reg_no']; ++$i;
                    ?>
                        <tr>
                            <td><?echo $i;?></td>
                            <td><?echo $row['reg_no'];?></td>
                            <td><?echo date("d-m-Y", strtotime($row['reg_date']));?></td>
                            <td><?echo $row['reg_session'];?></td>
                            <td><?echo $row['class'];?></td>
                            <td><?echo $row['name'];?></td>
                            <td><?echo $row['gender'];?></td>
                            <td><?echo $row['fname'];?></td>
                            <td><?echo $row['mname'];?></td>
                            <td align="center">
                                <a href="#" onclick='JSconfirm(<?php echo $id;?>)'><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?}
                ?>
            </table>
            <div class="clear"></div>
        </div>
    </div><br>
</div>

	




<?php include('extra/footer.php');?>

<script type="text/javascript">
function JSconfirm(delid){
    swal({ 
    title: "Do you want to delete it ?",   
    // text: "Redirect me to home page?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Yes",   
    cancelButtonText: "No",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    
    function(isConfirm){   
    if (isConfirm) 
    {   
        window.location = "delete.php?id="+delid+"&&tname=registration";   
    } 
    else {     
        swal("Record Not Deleted.");   
        } });
}
</script>
