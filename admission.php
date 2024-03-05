
<?include('extra/top.php');?>

<div class="main">
    <div class="col-sm-12 pad0 headdingnav">
        <div class="col-sm-6 pad0"><div class="headding">Admission Form</div></div>
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
                        <td>#</td>
                        <td>Date</td>
                        <td>Name</td>
                        <td>Gender</td>
                        <td>Session</td>
                        <td>Class</td>
                        <td>Father's Name</td>
                        <td>Mobile</td>
                        <td align="center" width="80">Action</td>
                    </tr>
                </thead>
                <?
                    $i=0;
                    $sql="SELECT * FROM student order by(class) desc";
                    $res=$con->query($sql);
                    while($row=mysqli_fetch_array($res))
                    {   $id=$row['sid'];
                    ?>
                        <tr>
                            <td><?echo ++$i;?></td>
                            <td><?if($row['adm_date']=="0000-00-00"){echo $row['adm_date'];} else {echo date("d-m-Y", strtotime($row['adm_date']));}?></td>
                            <td><?echo $row['name'];?></td>
                            <td><?echo $row['gender'];?></td>
                            <td><?echo $row['class_session'];?></td>
                            <td><?echo $row['class'];?></td>
                            <td><?echo $row['fname'];?></td>
                            <td><?echo $row['mobile'];?></td>
                            <td align="center">
                                <a href="#" onclick='JSconfirm(<?php echo $id;?>)' title="Delete Record"><i class="fa fa-trash"></i></a>
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
        window.location = "delete.php?id="+delid+"&&tname=fee_receipt";   
    } 
    else {     
        swal("Record Not Deleted.");   
        } });
}
</script>