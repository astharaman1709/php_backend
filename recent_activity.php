
<?php include('extra/top.php');?>

<div class="main">
	<div class="col-sm-12 pad0 headdingnav">
        <div class="col-sm-6 pad0"><div class="headding">Recent Activity</div></div>
        <div class="col-sm-6 pad0" align="right">
            <a href="home" class="btn batt"><i class="fa fa-arrow-left"></i> Back</a>
        </div>   
        <div class="clear"></div>
    </div>

    <div class="col-sm-12 page_area">
        <div class="header">Add Recent Activity</div>
        <div class="pagewrok">
            <form class="form" method="post" enctype="multipart/form-data" id="form" name="form">
				<div class="col-sm-4 form-group">
					<label>Date</label>
					<input type="date" name="date" class="form-control" required>
				</div>
				<div class="col-sm-4 form-group">
					<label>Image</label>
					<input type="file" name="file" class="form-control" required>
				</div>
				<div class="col-sm-12 form-group">
					<label>Heading</label>
					<textarea name="heading" class="form-control" required maxlength="160" style="height: 100px; resize: none;"></textarea>
				</div>
				<div class="col-sm-12 form-group">
					<label>Details</label>
					<textarea name="details" id="summernote" class="form-control" placeholder="Details...." required maxlength="160" style="height: 120px; resize: none;"></textarea>
				</div>
				<div class="col-sm-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" >
                    </div>
                </div>
			</form>
			<?php
				if(isset($_POST['submit']))
				{
					extract($_POST);

					$file = rand().$_FILES["file"]["name"];
					move_uploaded_file($_FILES['file']['tmp_name'], "gallery_img/".$file);

					$heading=htmlspecialchars($heading,ENT_QUOTES);
					$details=htmlspecialchars($details,ENT_QUOTES);
					$sql="insert into recent_activity values('','$date','$file','$heading','$details')";
					$con->query($sql);
					echo "<script>alert('Record Saved.');</script>";
					echo "<script>window.location.href='recent_activity';</script>";
				}
			?>
		</div>
	</div>

	<div class="col-sm-12 page_area">
        <div class="header">List</div>
        <div class="pagewrok">
			<table id="example" class="table table-bordered">
				<thead>
					<tr style="background: #DDD;">
						<td width="80">Sl.No.</td>
						<td>File</td>
						<td>Heading</td>
						<td width="100" align="center">Action</td>
					</tr>
				</thead>
				<tbody>
					<?
						$i=1;
						$res=$con->query("select * from recent_activity order by(rid) desc");
						while($row=mysqli_fetch_array($res))
						{$id=$row['rid'];
							?>
							<tr>
								<td><? echo $i++;?></td>
								<td><img src="gallery_img/<?echo $row['file'];?>" width="100"></td>
								<td><? echo htmlspecialchars_decode($row['heading']);?></td>
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
        window.location = "delete.php?id="+delid+"&&tname=recent_activity";   
    } 
    else {     
        swal("Record Not Deleted.");   
        } });
}
</script>


