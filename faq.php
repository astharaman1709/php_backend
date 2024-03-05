
<?php 
	include('extra/top.php');
?>

<div class="main">
	<div class="col-sm-12 pad0 headdingnav">
        <div class="col-sm-6 pad0"><div class="headding">FA&Q</div></div>
        <div class="col-sm-6 pad0" align="right">
            <a href="home" class="btn batt"><i class="fa fa-arrow-left"></i> Back</a>
        </div>   
        <div class="clear"></div>
    </div>

    <div class="col-sm-12 page_area">
        <div class="pagewrok">
            <form class="form" method="post" enctype="multipart/form-data" id="form" name="form">
				<div class="col-sm-12 form-group">
					<label>Details</label>
					<input type="text" name="question" class="form-control">
				</div>
				<div class="col-sm-12 form-group">
					<label>Details</label>
					<textarea name="details" id="summernote" class="form-control"></textarea>
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

					$details=htmlspecialchars($details,ENT_QUOTES);
					$sql="insert into fnq values('','$question','$details')";
					$con->query($sql);
					echo "<script>alert('Record Saved.');</script>";
					// echo "<script>window.location.href='faq';</script>";
				}
			?>
		</div>
	</div>

	<div class="col-sm-12 page_area">
        <div class="header">FNQ List</div>
        <div class="pagewrok">
			<table id="example" class="table table-bordered">
				<thead>
					<tr style="background: #DDD;">
						<td width="80">Sl.No.</td>
						<td>Question</td>
						<td>Answer</td>
						<td width="100" align="center">Action</td>
					</tr>
				</thead>
				<?
					$i=1;
					$res=$con->query("select * from fnq order by(id) desc");
					while($row=mysqli_fetch_array($res))
					{	$id=$row['1'];
						?>
						<tr>
							<td><?echo $i++;?></td>
							<td><?echo $row['1'];?></td>
							<td><?echo html_entity_decode($row['2']);?></td>
							<td align='center'>
								<a href="#" onclick='JSconfirm(<?php echo $id;?>)' title="Delete Record"><i class="fa fa-trash"></i></a>
							</td>						
						</tr>
					<?}
				?>
			</table>
		</div>
	</div>
</div>


<?php include('extra/footer.php');?>

