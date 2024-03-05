
<?php include('extra/top.php');?>

<div class="main">
	<div class="col-sm-12 pad0 headdingnav">
        <div class="col-sm-6 pad0"><div class="headding">News</div></div>
        <div class="col-sm-6 pad0" align="right">
            <a href="home" class="btn batt"><i class="fa fa-arrow-left"></i> Back</a>
        </div>   
        <div class="clear"></div>
    </div>

    <div class="col-sm-12 page_area">
        <div class="header">Add News</div>
        <div class="pagewrok">
            <form class="form" method="post" enctype="multipart/form-data" id="form" name="form">
				<div class="col-sm-12 form-group">
					<label>News</label>
					<textarea name="news" class="form-control" placeholder="Tpye News...." required style="height: 120px; resize: none;"></textarea>
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

					$notice_tx=htmlspecialchars($news,ENT_QUOTES);
					$sql="insert into news values('','$notice_tx')";
					$con->query($sql);
					echo "<script>alert('Record Saved.');</script>";
					echo "<script>window.location.href='news';</script>";
				}
			?>
		</div>
	</div>

	<div class="col-sm-12 page_area">
        <div class="header">Notice List</div>
        <div class="pagewrok">
			<table id="example" class="table table-bordered">
				<thead>
					<tr style="background: #DDD;">
						<td width="80">Sl.No.</td>
						<td>Notice</td>
						<td width="100" align="center">Action</td>
					</tr>
				</thead>
				<tbody>
					<?
						$i=1;
						$res=$con->query("select * from news order by(nid) desc");
						while($row=mysqli_fetch_array($res))
						{$id=$row['nid'];
							?>
							<tr>
								<td><? echo $i++;?></td>
								<td><? echo htmlspecialchars_decode($row['news']);?></td>
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
        window.location = "delete.php?id="+delid+"&&tname=news";   
    } 
    else {     
        swal("Record Not Deleted.");   
        } });
}
</script>


