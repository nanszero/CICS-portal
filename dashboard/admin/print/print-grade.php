

<?php $this->load->view('dashboard/template/header.php')?>
<style>
    .table td, .table th {
        padding: 0 4px!important;
    }
</style>

<div class="content">
		<div class="row row-card-no-pd">
			<div class="col-md-12">
				<div class="card">
					<div class="text-center">
						<div class="card-head-row">
							<h4 class="card-title">Grades of (<?= $class_details->level ?> - <?= $class_details->section ?>) <br>
								<small>Subject: <?= $class_details->subject ?> <br> Teacher: <?= $class_details->teacher ?></small>
							</h4>
						</div>
					</div>
					<div class="card-body">
						<?php
						if($level == 13 || $level == 14 || $level == 15){ // COLLEGE & SHS
							$this->load->view('dashboard/tables/grades-college-shs.php');
						}else{
							$this->load->view('dashboard/tables/grades-primary-primary.php');
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	print();
</script>