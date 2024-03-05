<?
    include('extra/top.php');
?>
<div class="main">
    <div class="col-sm-12 pad0 headdingnav">
        <div class="col-sm-6 pad0"><div class="headding">Upload Campus Map</div></div>
        <div class="col-sm-6 pad0" align="right">
            <a href="home" class="btn batt"><i class="fa fa-arrow-left"></i> Back</a>
        </div>   
        <div class="clear"></div>
    </div>

    <div class="col-sm-12 page_area">
        <div class="pagewrok">
            <form class="form" method="post" enctype="multipart/form-data">
                <div class="col-sm-12 pad0">
                    <div class="col-sm-4 form-group">
                        <label>Campus Map File *</label>
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
                    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
                    $name ="campus_map.".$extension;
                    move_uploaded_file($_FILES['file']['tmp_name'], "pdf/".$name);
                    $con->query("UPDATE campus SET file='$name' WHERE id='1'");

                    echo "<script>alert('Record Saved.');</script>";
                    echo "<script>window.location.href='campus';</script>";
                }
            ?>
        </div>
        <div class="clear"></div>
    </div><br>

    <div class="col-sm-12 pad0">
    <object
        data='pdf/campus_map.pdf'
        type="application/pdf"
        width="100%"
        height="678"
      >
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
                data : {id : delid, tname : 'slider'},
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
