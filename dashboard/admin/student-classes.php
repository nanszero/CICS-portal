<?php $this->load->view('dashboard/template/header.php')?>
<?php $this->load->view('dashboard/template/sidebar.php')?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="mt-2 mb-4">
					<h2 class="text-black pb-2">Classes and Grades</h2>
				</div>	
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<?php $this->load->view('dashboard/template/success_message.php')?>
					</div>
                    <?php $this->load->view('dashboard/tables/student-class-grade.php')?>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('dashboard/admin/modal/add-subject.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>

<script>
	$("#btnssave").click(function(e){
		var operation = $("#btnssave").attr('data-operation');
		if(operation == 'save'){
			var title = 'Do you want to save this record?';
		}else{
			var title = 'Do you want to edit this record?';
		}

		var id = $("#id").val();
		var code = $("#code").val();
		var subject = $("#subject").val();

		if(code == '' || subject == ''){
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
		$('#myForm').attr('action','<?php echo base_url() ?>admin/subjects/add');

		$('#id').val('');
		$('#code').val('');
		$('#subject').val('');
	});

	$('.btnUpdate').click(function(){
		var id = $(this).attr("data-id");
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('<?= ucfirst(  substr_replace($this->uri->segment(4), "", -1) ) ?> Details');
		$('#btnssave').text('Update');
        $('#btnssave').attr('data-operation','edit');
        $('#myForm').attr('action','<?= base_url()?>admin/subjects/update');


		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?= base_url() ?>admin/subjects/get_data',
			data: {
				id : id
			},
			datatype: 'text',
			success: function(response){
				var data = JSON.parse(response);
					$("#id1").val(data[0].id);
					$("#code").val(data[0].code);
					$("#subject").val(data[0].subject);
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
                url: '<?= base_url()?>admin/subjects/delete',
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
