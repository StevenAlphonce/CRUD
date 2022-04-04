<?php
require_once('database.php');
$id=$_GET['id'];
$res=$database->read($id);
$record=mysqli_fetch_assoc($res);

?>
<!DOCTYPE html>
<html>
<head>
	<title>UPDATE RECORD</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
		<h2>UPDATE Operation in CRUD Application</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">First Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="fname"  class="form-control" id="input1" value="<?php echo $record['firstname'];?>" placeholder="First Name" />
			    </div>
			</div>
 
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Last Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="lname"  class="form-control" id="input1" value="<?php echo $record['lastname'];?>" placeholder="Last Name" />
			    </div>
			</div>
 
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">E-Mail</label>
			    <div class="col-sm-10">
			      <input type="email" name="email"  class="form-control" id="input1" value="<?php echo $record['email'];?>" placeholder="E-Mail" />
			    </div>
			</div>
 
			<div class="form-group" class="radio">
			<label for="input1" class="col-sm-2 control-label">Gender</label>
			<div class="col-sm-10">
			  <label>
			    <input type="radio" name="gender" id="optionsRadios1" value="male" <?php if($record['gender']=='male'){echo "checked";}?>> Male
			  </label>
			  	  <label>
			    <input type="radio" name="gender" id="optionsRadios1" value="female"<?php if($record['gender'] == 'female'){ echo "Chacked";}?>> Female
			  </label>
			</div>
			</div>
 
			<div class="form-group">
			<label for="input1" class="col-sm-2 control-label">Age</label>
			<div class="col-sm-10">
				<select name="age" class="form-control">
					<option>Select Your Age</option>
					<option value="20" <?php if($record['age'] == '20'){ echo "selected";} ?>>20</option>
                    <option value="21" <?php if($record['age'] == '21'){ echo "selected";} ?>>21</option>
                    <option value="22" <?php if($record['age'] == '22'){ echo "selected";} ?>>22</option>
                    <option value="23" <?php if($record['age'] == '23'){ echo "selected";} ?> >23</option>
                    <option value="24" <?php if($record['age'] == '24'){ echo "selected";} ?>>24</option>
                    <option value="25" <?php if($record['age'] == '25'){ echo "selected";} ?>>25</option>
				</select>
			</div>
			</div>
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update" />

            <?php
            if(isset($_POST)& !empty($_POST)){
                $fname=$database->sanitize($_POST['fname']);
                $lname=$database->sanitize($_POST['lname']);
                $email=$database->sanitize($_POST['email']);
                $gender=$database->sanitize($_POST['gender']);
                $age=$database->sanitize($_POST['age']);
            
            //Submit updated data
            $res = $database->update($fname,$lname,$email,$gender,$age,$id);
            if($res){
                header('Location:view.php');
            }else{
                echo "failed to Update data";
            }
            }
            ?>
		</form>
	</div>
</div>
</body>
</html>