<?php
require_once('database.php');
$res=$database-> read(); 
?>

<!DOCTYPE html> 
<html>
<head>
	<title>Simple CRUD Application - READ Operation</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="bootstrap.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
	<h2>Read Operation in CRUD applicaiton</h2>
		<table class="table "> 
		<thead> 
			<tr> 
				<th>#</th> 
				<th>Full Name</th> 
				<th>E-Mail</th> 
				<th>Age</th> 
				<th>Gender</th> 
				<th>Extras</th>
			</tr> 
		</thead> 
		<tbody> 

        <?php
        while($record=mysqli_fetch_assoc($res))
        {
        ?>
			<tr> 
				<th scope="row"><?php echo $record['id']; ?></th> 
				<td><?php echo $record['firstname']." ".$record['lastname'];?></td> 
				<td><?php echo $record['email']; ?></td> 
				<td><?php echo $record['age']; ?></td> 
				<td><?php echo $record['gender']; ?></td> 
				<td>
					<a href="update.php?id=<?php echo $record['id'];?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
					<a href="delete.php?id=<?php echo $record['id'];?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			</tr> 
            <?php }?>
		</tbody> 
		</table>
	</div>
</div>
</body>
</html>