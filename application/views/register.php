<?php  $this->load->view('header'); ?>


	<title>register</title>
</head>
<body>
	<div class="container">
		<div class="container-fluid" style="width: 500px">
			<?php echo validation_errors('<div class="alert alert-danger alert-dismissible"><span class="close" data-dismiss="alert" aria-label="close">&times;</span>','</div>'); ?>

			<form method="post" class="form text-center" action="">
				<h1 style="margin: 10px;">Student Registration</h1>
				<div class="form-group">
					<input class="form-control" type="text" name="name" placeholder="Student's Name">

				</div>
				<div class="form-group">
					<input class="form-control" type="email" name="email" placeholder="Student's E-Mail Id">
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="password" placeholder="Enter Password">
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="c_password" placeholder="Confirm Password">
				</div>
				<div class="form-group">
					<input class="form-control" type="number" name="cls" placeholder="Student's Class">
				</div>
				<div class="form-group">
					<select class="form-control" name="gender">
						<option hidden>Gender</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
				<div class="form-group">
					<input class="form-control" type="number" name="phone" placeholder="Contact No.">
				</div>
				
				<div class="form-group">
					<input class="btn btn-info" type="submit" name="signup" value="Sign Up">
				</div>
			</form>
		</div>
	</div>
</body>
</html>