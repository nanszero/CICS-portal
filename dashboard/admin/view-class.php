<?php $this->load->view('dashboard/template/header.php')?>
<?php $this->load->view('dashboard/template/sidebar.php')?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Dashboard</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Classes Management (<?= $class_details->level ?> - <?= $class_details->section ?>)</a>
                        </li>
                    </ul>
                </div>
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of Students <br>
										<small>Subject: <?= $class_details->subject ?> <br> Teacher: <?= $class_details->teacher ?></small>
									</h4>
								
									<?php
									if($_SESSION['id_user_role'] == 1){
										?>
										<button id="btnAdd" class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Add Students
										</button>
										<?php
									}
									?>
								</div>
							</div>
							<div class="card-body">
                                <div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Student ID</th>
												<th>Gender</th>
												<th>Email</th>
												<th>Contact</th>

												<?php
												if($_SESSION['id_user_role'] == 1){
													?>
														<th>Option</th>
													<?php
												}
												?>
											
											</tr>
										</thead>
										<tbody>
											<?php foreach($get_students as $row): ?>
												<tr>
													<td><?= $row->name ?></td>
													<td><?= $row->name ?></td>
													<td><?= $row->gender ?></td>
													<td><?= $row->email ?></td>

													<?php
													if($_SESSION['id_user_role'] == 1){
														?>
														<td>
															<div class="btn-group">
																<a type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a>
															</div>
														</td>
														<?php
													}
													?>


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

<?php $this->load->view('dashboard/admin/modal/add-student.php')?>
<?php $this->load->view('dashboard/class/delete.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>

<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Add Students');
		$('#btnssave').text('Save');
		$('#btnssave').attr('data-operation','save');
	});

	$(".add_student").click(function(){
		let id_student = $("#id_student").val();
		let student_name = $('#id_student').find(":selected").text();

		if(id_student != ''){
			$(".studentlist").append(
				'<tr><td hidden>'+id_student+'</td> <td>'+student_name+'</td></tr>'
			);
		}else{
			swal('Please select student','','warning');
			return false;
		}

	})

	$("#btnssave").click(function(){

		var table_data = [];
		$('.studentlist tr').each(function(row,tr){
			if($(tr).find('td:eq(0)').text() == ''){
			}else{
				var sub = {
				'id_student' : $(tr).find('td:eq(0)').text()
				};
			} 
			table_data.push(sub);
		});
		table_data = table_data.filter(function(e){return e}); 
		var students = {'data_table' : table_data}
		
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'functions/save_student_to_class.php',
			data: {
				students : students,
				id_class : <?= $class_details->id ?>
			},
			datatype: 'text',
			success: function(response){
				swal('New students was successfully added in this class','','success');
				$("#addRowModal").modal('hide');
			},
			error: function(){
				swal("There is something error, Try to fix it.");
			}
		})

		// setTimeout(
		// function() 
		// {
		// 	// location.reload();
		// }, 1000);
		
	})

</script>
