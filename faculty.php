
<?php include('extra/top.php');?>


<div class="main">
	<div class="col-sm-12 pad0 headdingnav">
        <div class="col-sm-6 pad0"><div class="headding">Facultys</div></div>
        <div class="col-sm-6 pad0" align="right">
            <a href="faculty_add" class="btn batt"><i class="fa fa-plus"></i> Add</a>
        </div>   
        <div class="clear"></div>
    </div>

	<div class="col-sm-12 pad0">
        <?
            $sql="SELECT * FROM faculty order by(id) desc";
            $res=$con->query($sql); $i=1;
            while($row=mysqli_fetch_array($res))
            {   $id=$row['id'];
            ?>
                <div class="col-sm-3" id="pr<?echo $id;?>">
                    <div class="gallery">
                        <img src="files/<?echo $row['file'];?>">
                        <div><b><?echo $row['name'];?></b></div>
                        <div><?echo $row['department'];?></div>
                        <div align="right">
                            <a class="batt" href="#!" onclick="JSconfirm(<?echo $id?>)"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            <?}
        ?>
	</div>
	<div class="clear"></div>
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
                data : {id : delid, tname : 'faculty'},
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

