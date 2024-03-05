
<?php include('extra/top.php');?>


<div class="main">
	<div class="col-sm-12 pad0 headdingnav">
        <div class="col-sm-6 pad0"><div class="headding">Managments</div></div>
        <div class="col-sm-6 pad0" align="right">
            <a href="managments" class="btn batt"><i class="fa fa-arrow-left"></i> Back</a>
        </div>   
        <div class="clear"></div>
    </div>

    <div class="col-sm-12 page_area">
        <div class="header">Add Managments</div>
        <div class="pagewrok">
            <form class="form" method="post" enctype="multipart/form-data" id="form" name="form">
				<div class="col-sm-4 form-group">
					<label>Name *</label>
					<input type="text" name="name" class="form-control" placeholder="Faculty's Name...." required>
				</div>
				<div class="col-sm-4 form-group">
					<label>Department *</label>
					<input type="text" name="department" class="form-control" placeholder="Faculty's Name...." required>
				</div>
				<div class="col-sm-4 form-group">
					<label>File *</label>
					<input type="file" name="file" class="form-control" required>
				</div>
				<div class="col-sm-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" >
                    </div>
                </div>
			</form>
			<?php
				if (isset($_POST["submit"])) 
                {
                	extract($_POST);
                    $file = rand().$_FILES["file"]["name"];

                	$sql="INSERT INTO managment values('','$name','$department','$file')";
					$con->query($sql);
					move_uploaded_file($_FILES['file']['tmp_name'], "files/".$file);

					echo "<script>alert('Record Saved.');</script>";
					echo "<script>window.location.href='managments_add';</script>";
				}
			?>
		</div>
		<div class="clear"></div>
	</div>
</div>



<?php include('extra/footer.php');?>