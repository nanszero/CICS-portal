

<?php $this->load->view('dashboard/template/header.php')?>
<?php $this->load->view('dashboard/template/sidebar.php')?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="mt-2 mb-4">
					<h2 class="text-black pb-2">Grade/Level Management</h2>
				</div>	
				<div class="row row-card-no-pd">
					<div class="col-md-12">					
						<?php $this->load->view('dashboard/template/success_message.php')?>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of Grade/Level</h4>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select1" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Grade/Level</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($gradelevel as $row): ?>
											<tr>
												<td><?= $row->level ?></td>
											</tr>
											<?php endforeach; ?>
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

<?php $this->load->view('dashboard/admin/modal/add-sy.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>

<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Section Details');

	});
</script>
