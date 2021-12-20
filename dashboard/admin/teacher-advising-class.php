

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
                            <a href="#">Classes Management</a>
                        </li>
                    </ul>
                </div>
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of My Advicing Class</h4>
									<button id="btnAdd" class="btn btn-primary btn-round ml-auto">
										<i class="fa fa-plus"></i>
										Add Class
									</button>
								</div>
							</div>
					<?php $this->load->view('dashboard/template/class-list.php')?>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('dashboard/admin/modal/add-class.php')?>
<?php $this->load->view('dashboard/class/delete.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>

<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Class Details');
		$('#btnssave').text('Save');
		$('#btnssave').attr('data-operation','save');
		$('#myForm').attr('action','<?php echo base_url() ?>admin/Classes/save');
	});

	$("#btnssave").click(function(e){
		e.preventDefault();
		let data = $("#myForm").serializeArray();

		swal({
			title: 'Do you want to proceed?',
			text:   '',
			content: '',
			icon: 'warning',
			buttons:{
				cancel: {
				visible: true,
				text : 'No',
				className: 'btn btn-danger'
				},        			
				confirm: {
				text : 'Yes',
				className : 'btn btn-success'
				}
			},
			successMode: true,
			}).then(function(isConfirm) {
			if (isConfirm) {
				
				for(var i=0;i<data.length;i++){
					if(data[i].name != 'id'){
						if(data[i].value == ''){
							swal('Please fill-up all the required fields','','warning');
							return false;
						}
					}
				}

				$('#myForm').submit();
			} else {
				
			}
		})
    })


	function getEdit(id){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('<?= ucfirst(  substr_replace($this->uri->segment(4), "", -1) ) ?> Details');
		$('#btnssave').text('Update');
        $('#btnssave').attr('data-operation','edit');
        $('#myForm').attr('action','<?= base_url()?>admin/Classes/update');

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?= base_url() ?>admin/Classes/get_data',
			data: {
				id : id
			},
			datatype: 'text',
			success: function(response){
				var data = JSON.parse(response);
				$("#id1").val(data[0].id);
				$("#id_sy").val(data[0].id_sy);
				$("#id_adviser").val(data[0].id_adviser);
				$("#id_teacher").val(data[0].id_teacher);
				$("#id_grade_level").val(data[0].id_grade_level);
				$("#id_section").val(data[0].id_section);
				$("#id_subject").val(data[0].id_subject);
			},
			error: function(){
				swal("There is something error, Try to fix it.");
			}
		})
	};

</script>
