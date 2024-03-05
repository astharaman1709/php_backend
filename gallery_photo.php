<?
    include('extra/top.php');
    $id=$_REQUEST['id'];
?>
<div class="main">
    <div class="col-sm-12 pad0 headdingnav">
        <div class="col-sm-6 pad0"><div class="headding">Gallery Photo</div></div>
        <div class="col-sm-6 pad0" align="right">
            <a href="gallery" class="btn batt"><i class="fa fa-arrow-left"></i> Back</a>
        </div>   
        <div class="clear"></div>
    </div>

    <div class="col-sm-12 page_area">
        <div class="pagewrok">
            <form class="form" method="post" enctype="multipart/form-data">
                <div class="col-sm-12 pad0">
                    <div class="col-sm-4 form-group">
                        <label>Image *</label>
                        <input type="file" class="form-control" name="file[]" multiple required>
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
                    foreach ($_FILES["file"]["name"] as $i => $value) {
                        $file = rand().$_FILES["file"]["name"][$i];
                        $sql="insert into gallery_photo values('','$id','$file')";
                        $con->query($sql);
                        move_uploaded_file($_FILES['file']['tmp_name'][$i], "gallery_img/".$file);
                    }
                    echo "<script>alert('Record Saved.');</script>";
                    echo "<script>window.location.href='gallery_photo?id=".$id."';</script>";
                }
            ?>
        </div>
        <div class="clear"></div>
    </div><br>

    <div class="col-sm-12 pad0">
        <?
            $sql="SELECT * FROM gallery_photo where gid='$id' order by(id) desc";
            $res=$con->query($sql); $i=1;
            while($row=mysqli_fetch_array($res))
            {   $id=$row['id'];
            ?>
                <div class="col-sm-3" id="pr<?echo $id;?>">
                    <div class="gallery">
                        <img src="gallery_img/<?echo $row['file'];?>">
                        <div align="right">
                            <a class="batt" href="#!" onclick="JSconfirm(<?echo $id?>)"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            <?}
        ?>
        <div class="clear"></div>
    </div><br>
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
                data : {id : delid, tname : 'gallery_photo'},
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
