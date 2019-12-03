<?php  
$this->load->view('header'); 
?>

<title>Student Details</title>
</head>
<body>
	<div class="container">
		<div class="container-fluid">
			<!-- Navigation Bar -->
			<?php 
			$this->load->view('navbar');
			?>	
			<!-- End Navigation Bar -->




			<!-- Flashadata -->

			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php 
				if ($this->session->flashdata('update_msg')) {
					?>
					<div class="alert alert-success alert-dismissible">
						<span class="close" data-dismiss="alert" aria-label="close">&times;</span>
						<?php echo $this->session->flashdata('update_msg'); ?>
					</div>
				<?php }


				if ($this->session->flashdata('delete_msg')) {
					?>
					<div class="alert alert-danger alert-dismissible">
						<span class="close" data-dismiss="alert" aria-label="close">&times;</span>
						<?php echo $this->session->flashdata('delete_msg'); ?>
					</div>
				<?php }
				?>
			</div>
			<div class="col-md-3"></div>

			<!-- End of flashdata -->



			<!-- Page Content -->
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Sr. No.</th>
						<th scope="col">Roll No.</th>
						<th scope="col">Name</th>
						<th scope="col">E-mail</th>
						<th scope="col">Gender</th>
						<th scope="col">Contact</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if($stuData != ''){
						$i=1;
						foreach ($stuData as $rows){
							?>
							<tr>
								<td><?php echo $i; ?> </td>
								<td><?php echo$id = $rows['id']; ?></td>
								<td><?php echo $rows['name']; ?></td>
								<td><?php echo $rows['email']; ?></td>
								<td><?php echo $rows['gender']; ?></td>
								<td><?php echo $rows['contact']; ?></td>	
								<td>
									<a href="updateStu?id=<?=$id?>&class=<?=$this->input->get('class');?>"><button class="btn btn-info">Update</button></a>
									<button class="btn btn-danger" data-toggle="modal" data-target="#confmDelete">Delete</button>
								</td>
							</tr>
							<?php 
							$i++;
						} 
					}
					else{
						?>
						<tr>
							<td colspan="4"><?php echo "Student Data is not Available for this Standard."; ?></td>
						</tr>
					<?php }
					?>

				</tbody>


				<div class="modal fade" id="confmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Delete Student</h4>
							</div>
							<div class="modal-body">
								<p>Are you sure to Delete Student Data ?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
								<a href="delStu?id=<?=$id?>&class=<?=$this->input->get('class');?>"><button type="button" class="btn btn-info" id="confirm">Yes</button></a>
							</div>
						</div>
					</div>
				</div>
				
			</table>
			<!-- End Page Content -->

		</div>
	</div>
</body>
</html>