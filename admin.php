<?php
	$connection = mysql_connect('127.0.0.1', 'phpland', 'test');
	if (!$connection) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db('phpland', $connection);
	if (!db_selected) {
		die ('Can\'t use phpland : ' . mysql_error());
	}

	$query = "SELECT * FROM about";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
		$rows[] = $row;
	};

	print '<script>var object = ' . json_encode($rows) . ';console.log(object);</script>';
	// exit;
	// print"<pre>";
	// print_r($rows);
	// exit;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="styles2.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="scripts.js"></script>

</head>
<body>

	<!-- jquery way of doing things -->
	 <script>
	// $('.dropdown').change(function(){
	// 	var content = $(this).val();
	// 	$.ajax({
	// 		method: get,
	// 		url: 'local-phpland.com/admin.php',
	// 	})
	// })
	 </script>
	 <script>
	 	$(document).ready(function(){

		 	$('#select-menu').change(function(){
		 		selectMenuVal = $('#select-menu').val();
		 		for(i=0; i<object.length; i++){
		 			if(selectMenuVal == object[i].section){
		 				selectValue = i;
		 			}
		 		} 		
		 		$("#text-area").text(object[selectValue].content);
		 	});
		 });

	 </script>

	<h1>Admin</h1>
	<div class = "container form-wrapper">
		<hr></hr>
		<form>
			<div class="form-group">
				<label>Category</label>
				<select class="form-control" id="select-menu">
					<option disabled selected> -- select an option -- </option>
					<?php
						foreach($rows as $row){
							print '<option>' . $row['section'] . '</option>';
						}
					?>

				</select>
			</div>
			<div class="form-group">
				<label>Input Text</label>
				<textarea class="form-control" id="text-area" rows="8">
					
				</textarea>
			</div>
			<button class = "btn btn-primary btn-lg" type="submit">Submit
			</button>
		</form>
	</div>
</body>
</html>