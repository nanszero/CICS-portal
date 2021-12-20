<?php $this->load->view('dashboard/template/header.php')?>
<?php $this->load->view('dashboard/template/sidebar.php')?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="mt-2 mb-4">
					<h2 class="text-black pb-2"><?= ucfirst($this->uri->segment(4)) ?> Management</h2>
				</div>
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<?php $this->load->view('dashboard/template/success_message.php')?>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of <?= ucfirst($this->uri->segment(4)) ?></h4>
									<button id="btnAdd" class="btn btn-primary btn-round ml-auto">
										<i class="fa fa-plus"></i>
										Add <?= ucfirst(  substr_replace($this->uri->segment(4), "", -1) ) ?>
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Name</th>
												<th>Gender</th>
												<th>Email</th>
												<th>Contact</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($users as $info){
											?>
											<tr>
												<td><?= $info->last_name ?>,<?= $info->first_name ?>
												<?= $info->middle_name ?>.</td>
												<td><?= $info->gender ?></td>
												<td><?= $info->email ?></td>
												<td><?= $info->contact ?></td>
												<td>
													<div class="btn-group">
														<button title="Edit" class="form-control btn-warning btn-sm br-0" onclick="getEdit('<?= $info->id ?>')"><i class="fa fa-edit"></i></button>
														<button title="Delete" class="form-control btn-danger btn-sm br-0" onclick="getDelete('<?= $info ->id ?>','<?= base_url()?>/user/delete')"><i class="fa fa-trash"></i></button>
													</div>
												</td>
											</tr>
											<?php
											}
											?>
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
<?php $this->load->view('dashboard/admin/modal/add-user.php')?>
<?php $this->load->view('dashboard/class/delete.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>

<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('<?= ucfirst(  substr_replace($this->uri->segment(4), "", -1) ) ?> Details');
		$('#myForm').attr('action','<?php echo base_url() ?>user/add_user');
		$(".logindetails").attr('hidden',false);
	});

	function getEdit(id){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Update User');
		$('#myForm').attr('action','<?php echo base_url() ?>/user/update');
		$('#btnSaveProduct').text('Update');
		$("#username").attr('required',false);
		$("#password").attr('required',false);

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?php echo base_url()?>user/edit',
			data:{
				id:id,
				},
			async: false,
			dataType: 'text',
			success: function(response){
			var data = JSON.parse(response);
		
				$("#id1").val(data[0].id);
				$("#first_name").val(data[0].first_name);
				$("#middle_name").val(data[0].middle_name);
				$("#last_name").val(data[0].last_name);
				$("#birthday").val(data[0].birthday);
				$("#gender").val(data[0].gender);
				$("#nationality").val(data[0].nationality);
				$("#civil_status").val(data[0].civil_status);
				$("#religion").val(data[0].religion);
				$("#email").val(data[0].email);
				$("#contact").val(data[0].contact);
				$("#address").val(data[0].address);

				$("#picture1").attr({ "src": '<?= base_url()?>public/uploads/dp/' + data[0].picture });
			
			},
			error: function(){
				swal('Something went wrong');
			}
		});
	}


	$("#btnssave").click(function(e){
		var operation = $("#btnssave").attr('data-operation');
		if(operation == 'save'){
			var title = 'Do you want to save this record?';
		}else{
			var title = 'Do you want to edit this record?';
		}
		var id = $("#id").val();
		var photo = $("#photo").val();
		var first_name = $("#first_name").val();
		var middle_name = $("#middle_name").val();
		var last_name = $("#last_name").val();  
		var birthday = $("#birthday").val();  
		var gender = $("#gender").val();  
		var nationality = $("#nationality").val();  
		var civil_status = $("#civil_status").val();  
		var religion = $("#religion").val();  
		var email = $("#email").val();  
		var contact = $("#contact").val();  
		var address = $("#address").val();  

		if(photo == '' || first_name == '' || middle_name == ''|| last_name == ''|| birthday == '' || gender == '' || nationality == '' || civil_status == ''|| religion == ''|| email == ''|| contact == ''|| address == ''){
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


	$("#file").change(function(){
		
		var userfile = $(this).prop('files');

		var temp_photo_arr = $("#temp_photo_arr").val();
		var name = document.getElementById("file").files[0].name;
		var form_data = new FormData();
		var ext = name.split('.').pop().toLowerCase();

		if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
		{
		alert("Invalid Image File");
		}
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("file").files[0]);
		var f = document.getElementById("file").files[0];
		var fsize = f.size||f.fileSize;
		if(fsize > 2000000)
		{
		alert("Image File Size is very big");
		}
		else
		{
		form_data.append("file", document.getElementById('file').files[0]);
		$.ajax({
			url: "<?= base_url() ?>user/upload_profile_pic/" + temp_photo_arr,
			method:"POST",
			data: form_data,
			contentType: false,
			cache: false,
			processData: false,
			beforeSend:function(){
				$('.uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
			},   
			success:function(response){
				var split_img = response.split(',');
				$('.uploaded_image').html(split_img[0]);
				$("#temp_photo_arr").val(split_img[1]);
			}
		});
		}
	})

</script>
