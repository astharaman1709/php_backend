<?
    include('extra/top.php');
?>
<div class="main">
    <div class="col-sm-12 pad0 headdingnav">
        <div class="col-sm-6 pad0"><div class="headding">Upload Syllabus</div></div>
        <div class="col-sm-6 pad0" align="right">
            <a href="home" class="btn batt"><i class="fa fa-arrow-left"></i> Back</a>
        </div>   
        <div class="clear"></div>
    </div>

    <div class="col-sm-12 page_area">
        <div class="pagewrok">
            <form class="form" method="post" enctype="multipart/form-data">
                <div class="col-sm-12 pad0">
                    <div class="col-sm-8 form-group">
                        <label>Heading *</label>
                        <input type="text" class="form-control" name="heading" required accept="application/pdf">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label>Syllabus File *</label>
                        <input type="file" class="form-control" name="file" required accept="application/pdf">
                    </div>
                </div>
                <div class="col-sm-12 form-group">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
            <?php
                $c=0;
                if (isset($_POST["submit"])) 
                {
                    extract($_POST);
                    $file=rand()."_".$_FILES['file']['name'];
                    $heading=htmlspecialchars($heading,ENT_QUOTES);
                    $sql="INSERT INTO syllabus(heading,file) values('$heading','$file')";
                    $con->query($sql);
                    move_uploaded_file($_FILES['file']['tmp_name'], "pdf/".$file);

                    echo "<script>alert('Record Saved.');</script>";
                    echo "<script>window.location.href='sylabus';</script>";
                }
            ?>
        </div>
        <div class="clear"></div>
    </div><br>

    <div class="col-sm-12 page_area">
        <div class="header">List</div>
        <div class="pagewrok">
            <table id="example" class="table table-bordered">
                <thead>
                    <tr style="background: #DDD;">
                        <td width="80">Sl.No.</td>
                        <td>Heading</td>
                        <td>File</td>
                        <td width="100" align="center">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?
                        $i=1;
                        $res=$con->query("select * from syllabus order by(id) desc");
                        while($row=mysqli_fetch_array($res))
                        {$id=$row['id'];
                            ?>
                            <tr class="pr<?echo $id;?>">
                                <td><? echo $i++;?></td>
                                <td><? echo htmlspecialchars_decode($row['heading']);?></td>
                                <td>
                                    <? if($row['file']!=""){?>
                                        <a target="_blank" href="pdf/<?echo $row['file']?>">File</a>
                                        <?}
                                    ?>
                                </td>
                                <td align='center'>
                                    <a href="#" onclick='JSconfirm(<?php echo $id;?>)' title="Delete Record"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?}
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

	






<?include('extra/footer.php');?>


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
    closeOnCancel: true }, 
    
    function(isConfirm){   
    if (isConfirm) 
    {   
        $(document).ready(function(){
            $(document).ajaxSend(function(){
                $("#overlay").fadeIn(300);
            })
            $.ajax({
                type: 'POST',
                url : 'delete',  
                data : {id : delid, tname : 'syllabus'},
                success: function(data){
                    $('#pr'+delid).hide(300);
                }
            }).done(function() {
                setTimeout(function(){
                    $("#overlay").fadeOut(300);
                    swal.close();
                },500);
            });
        });
    } 
    });
}
</script>
