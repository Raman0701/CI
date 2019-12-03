<?php  
$this->load->view('header'); 
?>

<title>home</title>
</head>
<body>


	<div class="container">
		<div class="container-fluid">
			<!-- Navigation Bar -->					
			<?php 
			$this->load->view('navbar');
			?>	
			<!-- End Navigation Bar -->


			<!-- Page Content -->
			<div class="row text-center" style="">
				<?php 
				if($homeData != ''){

				foreach ($homeData as $classes) {
					 $cls = $classes['class_id'];
					?>
					<a href="stu_details?class=<?=$cls?>" style="text-decoration: none">
						<div class="card" style="width: 200px; margin: 21px">
							<h1>Class<br> <?php echo $cls; ?>th </h1>
					    </div>
					</a>	
				<?php 
			}
			}
			else{
				echo "This Teacher has no Assigned Classes.";
			}
			 ?>
			
				
			</div>
			<!-- End Page Content -->
			
		</div>
	</div>

</body>
</html>