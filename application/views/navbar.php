<nav class="navbar navbar-expand-lg navbar-light bg-dark">
				<div class="collapse navbar-collapse">
					<div class="navbar-nav">
						<a class="nav-item nav-link active" href="#"> <span class="sr-only">(current)</span></a>
						<a class="nav-item nav-link" href="#"></a>
					</div>
				</div>
				<button class="btn btn-default" type="button" data-toggle="modal" data-target="#confirmDelete" > Logout
				</button>

				<!-- modal for logout confirmation -->
				<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Log Out</h4>
							</div>
							<div class="modal-body">
								<p>Are you sure to Logout ?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
								<a href="logout"><button type="button" class="btn btn-info" id="confirm">Yes</button></a>
							</div>
						</div>
					</div>
				</div>
				<!-- end of modal -->

			</nav>
