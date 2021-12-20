

<?php $this->load->view('dashboard/template/header.php')?>
<?php $this->load->view('dashboard/template/sidebar.php')?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="mt-2 mb-4">
					<h2 class="text-black pb-2">Documents Management</h2>
				</div>
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<?php $this->load->view('dashboard/template/success_message.php')?>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of Documents</h4>
									<button id="btnAdd" class="btn btn-primary btn-round ml-auto">
										<i class="fa fa-plus"></i>
										Add Document
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Category</th>
												<th>Document</th>
												<th>Description</th>
												<th>Date Uploaded</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Modules</td>
												<td><a href="#">(DOCS1001) Sibika at Pagbasa</a></td>
												<td>Learning Materials</td>
												<!-- <td>Nurse Eva</td> -->
												<td>July 3, 2019 3:55PM</td>
												<td>
													<div class="btn-group">
														<button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
														<button type="button" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('dashboard/admin/modal/add-document.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>

<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Document Details');

	});
</script>
