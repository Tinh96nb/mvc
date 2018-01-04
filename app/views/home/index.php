<div class="main">
  	<div class="hipsum">
	    <div class="jumbotron">
	    	<div class="box-title">
	    		<h2>List User</h2>
	    	</div>
			<table class="table table-bordered display" cellspacing="0" width="100%" id="dttable">
		        <thead>
		              <tr>
		                  <th>ID</th>
		                  <th>Name</th>
		                  <th>Email</th>
		                  <th>Gender</th>
		                  <th>Phone</th>
		                  <th>Age</th>
		                  <th>Active</th>
		              </tr>
		        </thead>
		        <?php
		        	foreach ($datas as $value) {
		        	 	echo "<tr>";
		        	 		echo "<td>".$value->id."</td>";
		        	 		echo "<td>".$value->name."</td>";
		        	 		echo "<td>".$value->email."</td>";
		        	 		echo "<td>".$value->gender."</td>";
		        	 		echo "<td>".$value->phone."</td>";
		        	 		echo "<td>".$value->age."</td>";
		        	 		if($value->active==1){
						    	echo '<td><div class="text-center"><i class="fa fa-eye" aria-hidden="true"></i></div></td>';
						    } else {
						    	echo '<td><div class="text-center"><i class="fa fa-eye-slash" aria-hidden="true"></i></div></td>';
						    }
		        	 	echo "</tr>";
		        	 }

		        ?>
		        <tfoot>
		              <tr>
		                  <th>ID</th>
		                  <th>Name</th>
		                  <th>Email</th>
		                  <th>Gender</th>
		                  <th>Phone</th>
		                  <th>Age</th>
		                  <th>Active</th>
		              </tr>
		        </tfoot>
		     </table>
	    </div>
  </div>
</div>
<?php require_once INC_ROOT .'/app/views/partials/js.php'; ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#dttable').DataTable();
  });
</script>
</html>
