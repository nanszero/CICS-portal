

<?php $this->load->view('dashboard/template/header.php')?>
<?php $this->load->view('dashboard/template/sidebar.php')?>
<style>
    .table td, .table th {
        padding: 0 4px!important;
    }
</style>
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
                            <a href="#">Grades (<?= $class_details->level ?> - <?= $class_details->section ?>)</a>
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
									if($_SESSION['id_user_role'] != 4){
										?>
										<div class="btn-group ml-auto">
											<button id="btnUpdate" class="btn btn-primary  ml-auto">
												<i class="fa fa-save"></i>
												Update Grades
											</button>
											<a href="<?= base_url() ?>admin/grades/print_grade/<?= $id_class ?>" target="_blank" class="btn btn-warning  ml-auto">
												<i class="fa fa-print"></i>
											</a>
										</div>
										<?php
									}
									?>

									
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

<?php $this->load->view('dashboard/admin/modal/add-student.php')?>
<?php $this->load->view('dashboard/class/delete.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>

<script>

	function getAverage(id_student){
		let level = <?= $level?>;

		if(level == 13 || level == 14 || level == 15){ // COLLEGE & SHS
			let first_midterm = "#first_midterm"+id_student;
			let first_finals = "#first_finals"+id_student;
			let first_sem = "#first_sem"+id_student;
			let getFirst_midterm = $(first_midterm).val();
			let getFirst_finals = $(first_finals).val();

			let first_semAverageIs = (parseInt(stringToInt(getFirst_midterm)) + parseInt(stringToInt(getFirst_finals))) / 2;
			$(first_sem).val(first_semAverageIs);

			let second_midterm = "#second_midterm"+id_student;
			let second_finals = "#second_finals"+id_student;
			let second_sem = "#second_sem"+id_student;
			let getsecond_midterm = $(second_midterm).val();
			let getsecond_finals = $(second_finals).val();

			let second_semAverageIs = (parseInt(stringToInt(getsecond_midterm)) + parseInt(stringToInt(getsecond_finals))) / 2;
			$(second_sem).val(second_semAverageIs);
		}else{
			let first_quarter = "#first"+id_student;
			let second_quarter = "#second"+id_student;
			let third_quarter = "#third"+id_student;
			let fourth_quarter= "#fourth"+id_student;
			let average = "#average"+id_student;
			let getFirstQuarter = $(first_quarter).val();
			let getSecondQuarter = $(second_quarter).val();
			let getThirdQuarter = $(third_quarter).val();
			let getFourthQuarter = $(fourth_quarter).val();

			let averageIs = (parseInt(stringToInt(getFirstQuarter)) + parseInt(stringToInt(getSecondQuarter)) + parseInt(stringToInt(getThirdQuarter)) + parseInt(stringToInt(getFourthQuarter))) / 4;

			$(average).val(averageIs);
		}

	

	}

	function stringToInt(string){
		if(string == ''){
			return 0;
		}
		return string;
	}

	$("#btnUpdate").click(function(){

		let level = <?= $level?>;

		if(level == 13 || level == 14 || level == 15){ // COLLEGE & SHS
			var table_data = [];
			$('.studenGrades tr').each(function(row,tr){
				if($(tr).find('td:eq(0)').text() == ''){
				}else{
					var sub = {
					'id_student' : $(tr).find('td:eq(1)').text(),
					'first_midterm' : $(tr).find('td:eq(2) input[type=text]').val(),
					'first_finals' : $(tr).find('td:eq(3) input[type=text]').val(),
					'first_sem' : $(tr).find('td:eq(4) input[type=text]').val(),
					'second_midterm' : $(tr).find('td:eq(5) input[type=text]').val(),
					'second_finals' : $(tr).find('td:eq(6) input[type=text]').val(),
					'second_sem' : $(tr).find('td:eq(7) input[type=text]').val(),
					'remarks' : $(tr).find('td:eq(8) input[type=text]').val()
					};
				} 
				table_data.push(sub);
			});
			table_data = table_data.filter(function(e){return e}); 
			var grades = {'data_table' : table_data}
		}else{
			var table_data = [];
			$('.studenGrades tr').each(function(row,tr){
				if($(tr).find('td:eq(0)').text() == ''){
				}else{
					var sub = {
					'id_student' : $(tr).find('td:eq(1)').text(),
					'first' : $(tr).find('td:eq(2) input[type=text]').val(),
					'second' : $(tr).find('td:eq(3) input[type=text]').val(),
					'third' : $(tr).find('td:eq(4) input[type=text]').val(),
					'fourth' : $(tr).find('td:eq(5) input[type=text]').val(),
					'average' : $(tr).find('td:eq(6) input[type=text]').val(),
					'remarks' : $(tr).find('td:eq(7) input[type=text]').val()
					};
				} 
				table_data.push(sub);
			});
			table_data = table_data.filter(function(e){return e}); 
			var grades = {'data_table' : table_data}
		}


		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?= base_url() ?>admin/grades/saveGrades',
			data: {
				grades : grades,
				id_class : <?= $id_class?>,
				level : level
			},
			datatype: 'text',
			success: function(response){
				swal('Grades was updated successfully','','success');
				$("#addRowModal").modal('hide');
			},
			error: function(){
				swal("There is something error, Try to fix it.");
			}
		})


	})

</script>
