<?php  
$this->load->view('header'); 
?>

<title>Update Student</title>
</head>
<body>
	<div class="container">
		<div class="container-fluid">
			<?php 
			$this->load->view('navbar');
			$id = $this->input->get('id');
			$data =$this->Queries->stuDetails($id);
			?>
			<div class="row col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<br>
					<h2 class="text-center">Update Student</h2>
					<br>
					<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
					<form class="form form-horizontal" action="" method="post">
						<div class="form-group">
							<label>Name :</label>
							<input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
						</div>
						<div class="form-group">
							<label>E-mail :</label>
							<input type="email" name="email" class="form-control" value="<?php echo $data['email'];?>">
						</div>
						<div class="form-group">
							<label>Standard :</label>
							<input type="number" name="cls" class="form-control" value="<?php echo $data['class'];?>">
						</div>
						<div class="form-group">
							<label>Gender :</label>
							<?php if($data['gender']=='male') :?>
							<select name="gender" class="form-control">
								<option value="male" selected>Male</option>
								<option value="female">Female</option>
							</select>
							<?php endif; ?>
							<?php if($data['gender']=='female') :?>
							<select name="gender" class="form-control">
								<option value="male">Male</option>
								<option value="female" selected>Female</option>
							</select>
							<?php endif; ?>

						</div>
						<div class="form-group">
							<label>Contact :</label>
							<input type="number" name="contact" class="form-control" value="<?php echo $data['contact'];?>">
						</div>
						<div class="form-group">
							<input type="submit" name="update" class="btn btn-info" value="Update">
						</div>
					</form>
				</div>
				<div class="col-md-2"></div>



				<?php// print_r($data);die; ?>
			</div>
		</div>
	</div>
</body>
</html>