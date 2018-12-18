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
        <li><a href="http://localhost/semweb/Mahasiswa/">Student</a></li>
       </ul>
      </div>
     </div>
	</nav> 
	
		<div class="container">
			<a href="https://filkom.ub.ac.id/"><img src="<?php echo base_url('assets/img/filkom.png')?>" class="img-rounded" alt="filkom_ub" width="200"></a>
			
			<h3 style="text-align: right;">Human Resources : <kbd>Student</kbd></h3>
			
			<button class="btn btn-success" onclick="add_mahasiswa()" ><i class="glyphicon glyphicon-plus"></i>Add Data</button>
			<br>
			<br>

			<table id="table_id" class="table table-hover table-bordered">
				<thead class=".thead-dark">
				<tr>
					<th>Student ID</th>
					<th>NIM</th>
					<th>Student Name</th>
					<th>Departement</th>
					<th>Major</th>
					<th>Year</th>
					<th>City</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($Mahasiswas as $mahasiswa) {
			

			?>
				<tr>
					<td><?php echo $mahasiswa->student_id; ?></td>
					<td><?php echo $mahasiswa->nim; ?></td>
					<td><?php echo $mahasiswa->student_name; ?></td>
					<td><?php echo $mahasiswa->student_dep; ?></td>
					<td><?php echo $mahasiswa->student_major; ?></td>
					<td><?php echo $mahasiswa->year; ?></td>
					<td><?php echo $mahasiswa->city; ?></td>
					<td><?php echo $mahasiswa->address; ?></td>
					
					<td>
						<button type="button" class="btn btn-primary" onclick="edit_mahasiswa(<?php echo 
							$mahasiswa->student_id; ?>)"><i class="glyphicon glyphicon-pencil"> </i></button>
						
						<button class="btn btn-danger" onclick="delete_mahasiswa(<?php echo 
							$mahasiswa->student_id; ?>)"> <i class="glyphicon glyphicon-remove"> </i> </button>
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

			function add_mahasiswa(){
				save_method = 'add';
				$('#form')[0].reset();
				$('#modal_form').modal('show');
			}

			function save(){
				var url;
				if(save_method == 'add'){
					url = '<?php echo site_url('index.php/Mahasiswa/mahasiswa_add') ;?>';
				} else {
					url = '<?php echo site_url('index.php/Mahasiswa/mahasiswa_update') ;?>';
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

			function edit_mahasiswa(id){
				save_method = 'update';
				$('#form')[0].reset();

				$.ajax({
					url: "<?php echo site_url('index.php/mahasiswa/ajax_edit/') ;?>/"+id,
					type: "GET",
					dataType: "JSON",
					success: function(data){
						$('[name="student_id"]').val(data.student_id);
						$('[name="nim"]').val(data.nim);
						$('[name="student_name"]').val(data.student_name);
						$('[name="student_dep"]').val(data.student_dep);
						$('[name="student_major"]').val(data.student_major);
						$('[name="year"]').val(data.year);
						$('[name="city"]').val(data.city);
						$('[name="address"]').val(data.address);

						$('#modal_form').modal('show');
						$('.modal_title').text('Edit Student');
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert('Error Get Data From ajax');
					}
				});
			}

			function delete_mahasiswa(id){
				if (confirm('Are you sure delete this data?')) {
					$.ajax({
						url: "<?php echo site_url('index.php/mahasiswa/mahasiswa_delete/') ;?>/"+id,
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
        <h5 class="modal-title">Add Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body form">
      <form action="#" id="form" class="form-horizontal">
      	<input type="hidden" value="" name="student_id">

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">NIM</label>
      			<div class="col-md-9">
      				<input type="text" name="nim" placeholder="NIM ..." class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Student Name</label>
      			<div class="col-md-9">
      				<input type="text" name="student_name" placeholder="Name ..." class="form-control">
      			</div>
      		</div>
      	</div>
      	
      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Departement</label>
      			<div class="col-md-9">
      				<input type="text" name="student_dep" placeholder="Departement ..." class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Major</label>
      			<div class="col-md-9">
      				<input type="text" name="student_major" placeholder="Major ..." class="form-control">
      			</div>
      		</div>
      	</div>
		
		<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Year</label>
      			<div class="col-md-9">
      				<input type="text" name="year" placeholder="Year ..." class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">City</label>
      			<div class="col-md-9">
      				<input type="text" name="city" placeholder="City ..." class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Address</label>
      			<div class="col-md-9">
      				<input type="text" name="address" placeholder="Address ..." class="form-control">
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