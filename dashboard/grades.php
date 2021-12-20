<?php
session_start();
error_reporting(0);
include('../db/conn.php');


if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

include 'template/header.php';
include 'template/sidebar.php';
?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<!-- <div class="mt-2 mb-4">
					<h2 class="text-black pb-2">Classes and Schedules</h2>
				</div>	 -->
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">Grades</h4>
									<button id="btnAdd" class="btn btn-primary btn-round ml-auto">
										<i class="fa fa-print"></i>
										Print
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select1" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>SUBJECT</th>
												<th>INSTRUCTOR</th>
												<th>MIDTERM</th>
												<th>FINAL</th>
												<th>AVERAGE</th>
												<th>REMARKS</th>
											</tr>
										</thead>
										<tbody>
                                            <tr>
                                                <td>ITFE 111</td>
                                                <td>Sir Pero Dela Cruz</td>
                                                <td>1.75</td>
                                                <td>1.25</td>
                                                <td>1.5</td>
                                                <td>Passed</td>
                                            </tr>
                                            <tr>
                                                <td>LIT.2</td>
                                                <td>Sir Robert Golo</td>
                                                <td>1.75</td>
                                                <td>1.25</td>
                                                <td>1.5</td>
                                                <td>Passed</td>
                                            </tr>
                                            <tr>
                                                <td>DCOM</td>
                                                <td>Sir Juan Dela Cruz</td>
                                                <td>1.75</td>
                                                <td>1.25</td>
                                                <td>1.5</td>
                                                <td>Passed</td>
                                            </tr>
                                            <tr>
                                                <td>MATH 102</td>
                                                <td>Ma'am Bea Guzman</td>
                                                <td>1.75</td>
                                                <td>1.25</td>
                                                <td>1.5</td>
                                                <td>Passed</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>NET 2</td>
                                                <td>Ma'am  Sanchai Lole</td>
                                                <td>1.75</td>
                                                <td>1.25</td>
                                                <td>1.5</td>
                                                <td>Passed</td>
                                            </tr>
                                            <tr>
                                                <td>ITPC 104</td>
                                                <td>Ma'am  Myrna Lopez </td>
                                                <td>1.75</td>
                                                <td>1.25</td>
                                                <td>1.5</td>
                                                <td>Passed</td>
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

<?php
include 'template/footer.php';
?>

<script>
	$("#btnssave").click(function(e){
		var operation = $("#btnssave").attr('data-operation');
		if(operation == 'save'){
			var title = 'Do you want to save this record?';
		}else{
			var title = 'Do you want to edit this record?';
		}

		var id = $("#id").val();
		var section = $("#section").val();

		if(section == '' ){
			swal('Please input all the required(*) field','','error');
			return false;
		}

		e.preventDefault();
		swal({
			title: title,
			text:   '',
			content: '',
			icon: 'info',
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
				$('#myForm').submit();
			} else {
				
			}
		})
    })


	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('<?= ucfirst(  substr_replace($this->uri->segment(4), "", -1) ) ?> Details');
		$('#btnssave').text('Save');
        $('#btnssave').attr('data-operation','save');
		$('#myForm').attr('action','<?php echo base_url() ?>admin/sections/add');

		$('#id').val('');
		$('#section').val('');
	});

	$('.btnUpdate').click(function(){
		var id = $(this).attr("data-id");
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('<?= ucfirst(  substr_replace($this->uri->segment(4), "", -1) ) ?> Details');
		$('#btnssave').text('Update');
        $('#btnssave').attr('data-operation','edit');
        $('#myForm').attr('action','<?= base_url()?>admin/sections/update');


		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?= base_url() ?>admin/sections/get_data',
			data: {
				id : id
			},
			datatype: 'text',
			success: function(response){
				var data = JSON.parse(response);
					$("#id1").val(data[0].id);
					$("#section").val(data[0].section);
					console.log(response);
			},
			error: function(){
				swal("There is something error, Try to fix it.");
			}

		})


	});

	$(".btnDelete").click(function(){
        var id = $(this).attr("data-id");
        swal
        ({
            title: "Do you want to delete this record? ",
            text: "",
            icon: "error",
            buttons: 
                [
                    "Cancel",
                    "Yes"
                ],
            successMode: true,
            }).then(function(isConfirm){
            if(isConfirm)
            {
                $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url()?>admin/sections/delete',
                data: {
                    id : id     
                },
                datatype: 'text',
                success: function(response)
                {
                    location.reload();
                },
                error: function()
                {
                    swal('there is something wrong, try to fix it.');
                }
            })
            }
        })
    })
</script>
