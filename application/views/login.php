<?php $this->load->view('header'); ?>
 
<title>login</title>
</head>
<body>
	<div class="container">
		<div class="container-fluid" style="width: 500px">
			<?php 
             if ($this->session->flashdata('success_msg')) {
             ?>
             <div class="alert alert-success alert-dismissible">
             	<span class="close" data-dismiss="alert" aria-label="close">&times;</span>
             	<?php echo $this->session->flashdata('success_msg'); ?>
             </div>
             <?php }


			echo validation_errors('<div class="alert alert-danger">','</div>'); 
			

			?>

			<form method="post" class="form" action="">
				<h1 style="margin: 50px;" class="text-center">Sign In</h1>
				
				<div class="form-group">
					<input class="form-control" type="email" name="email" placeholder="Enter your E-Mail">
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="password" placeholder="Enter Password">
				</div>
		
				<div class="form-group text-center">
					<input class="btn btn-info" type="submit" name="signin" value="Sign In">
				</div>
			</form>
		</div>
	</div>
</body>
</html>