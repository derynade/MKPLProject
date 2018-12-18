<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Faculty of Computer Science (FILKOM)</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css');?>">

</head>
<body>

	<nav class="navbar navbar-inverse">
 	 <div class="container-fluid">
  	  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://localhost/semweb/"><kbd>HOME</kbd></a>
     </div>
     <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav">
        <li><a href="http://localhost/semweb/Staff/">Staff</a></li>
        <li><a href="http://localhost/semweb/Lecturer/">Lecturer</a></li>
       </ul>
      </div>
     </div>
	</nav> 
	
		<div class="container">
			<a href="https://filkom.ub.ac.id/"><img src="<?php echo base_url('assets/img/filkom.png')?>" class="img-rounded" alt="filkom_ub" width="200"></a>
			
			
			<h3 style="text-align: right;">Human Resources : <kbd>Lecturer</kbd></h3>
			
			<button class="btn btn-success" onclick="add_lecturer()" ><i class="glyphicon glyphicon-plus"></i>Add Data</button>
			<br>
			<br>

			<table id="table_id" class="table table-hover table-bordered">
				<thead class=".thead-dark">
				<tr>
					<th>Staff ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Degree</th>
					<th>Concentration</th>
					<th>Email</th>
					<th>Room</th>
					<th>Position</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($lecturers as $lecturer) {
			

			?>
				<tr>
					<td><?php echo $lecturer->lecturer_id; ?></td>
					<td><?php echo $lecturer->f_name; ?></td>
					<td><?php echo $lecturer->l_name; ?></td>
					<td><?php echo $lecturer->degree; ?></td>
					<td><?php echo $lecturer->concentration; ?></td>
					<td><?php echo $lecturer->email; ?>@ub.ac.id</td>
					<td><?php echo $lecturer->room; ?></td>
					<td><?php echo $lecturer->position; ?></td>
					<td>
						<button type="button" class="btn btn-primary" onclick="edit_lecturer(<?php echo $lecturer->lecturer_id; ?>)"><i class="glyphicon glyphicon-pencil"> </i></button>
						
						<button class="btn btn-danger" onclick="delete_lecturer(<?php echo $lecturer->lecturer_id; ?>)"> <i class="glyphicon glyphicon-remove"> </i> </button>
					</td>
				</tr>
			<?php
			}
			?>
			</tbody>
			</table>
		</div>
		<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ;?>"></script>
		<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ;?>"></script>
		<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ;?>"></script>
		<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ;?>"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('#table_id').DataTable();
			});

			var save_method;
			var table;

			function add_lecturer(){
				save_method = 'add';
				$('#form')[0].reset();
				$('#modal_form').modal('show');
			}

			function save(){
				var url;
				if(save_method == 'add'){
					url = '<?php echo site_url('index.php/Lecturer/lecturer_add') ;?>';
				} else {
					url = '<?php echo site_url('index.php/Lecturer/lecturer_update') ;?>';
				}

				$.ajax({
					url: url,
					type: "POST",
					data: $('#form').serialize(),
					dataType: "JSON",
					success: function(data){
						$('#modal_form').modal('hide');
						alert('data entered successfully');
						location.reload();

					},
					error: function(jqXHR, textStatus, errorThrown){
						alert('Error adding / update data');
					}
				});
			}

			function edit_lecturer(id){
				save_method = 'update';
				$('#form')[0].reset();

				$.ajax({
					url: "<?php echo site_url('index.php/lecturer/ajax_edit/') ;?>/"+id,
					type: "GET",
					dataType: "JSON",
					success: function(data){
						$('[name="lecturer_id"]').val(data.lecturer_id);
						$('[name="f_name"]').val(data.f_name);
						$('[name="l_name"]').val(data.l_name);
						$('[name="degree"]').val(data.degree);
						$('[name="concentration"]').val(data.concentration);
						$('[name="email"]').val(data.email);
						$('[name="room"]').val(data.room);
						$('[name="position"]').val(data.position);

						$('#modal_form').modal('show');
						$('.modal_title').text('Edit Lecturer');
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert('Error Get Data From ajax');
					}
				});
			}

			function delete_lecturer(id){
				if (confirm('Are you sure delete this data?')) {
					$.ajax({
						url: "<?php echo site_url('index.php/lecturer/lecturer_delete/') ;?>/"+id,
						type: "POST",
						dataType: "JSON",
						success: function(data){
							location.reload();
						},
						error: function(jqXHR, textStatus, errorThrown){
							alert('Error Deleting Data');
						}
					})
				}
			}


		</script>

<div class="modal" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Lecturer Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body form">
      <form action="#" id="form" class="form-horizontal">
      	<input type="hidden" value="" name="lecturer_id">

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">First Name</label>
      			<div class="col-md-9">
      				<input type="text" name="f_name" placeholder="First Name ..." class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Last Name</label>
      			<div class="col-md-9">
      				<input type="text" name="l_name" placeholder="Last Name ..." class="form-control">
      			</div>
      		</div>
      	</div>
      	
      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Degree</label>
      			<div class="col-md-9">
      				<input type="text" name="degree" placeholder="Degree ..." class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Concentration</label>
      			<div class="col-md-9">
      				<input type="text" name="concentration" placeholder="Concentration ..." class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Email</label>
      			<div class="col-md-9">
      				<input type="text" name="email" placeholder="Email ..." class="form-control">
      			</div>
      		</div>
      	</div>
		
		<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Room</label>
      			<div class="col-md-9">
      				<input type="text" name="room" placeholder="Room ..." class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Position</label>
      			<div class="col-md-9">
      				<input type="text" name="position" placeholder="Position ..." class="form-control">
      			</div>
      		</div>
      	</div>

      </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="save()" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>