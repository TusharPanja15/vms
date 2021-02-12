<?php

session_start();
$error = "";

// Checks Sessions and Cookies 

if (array_key_exists("logOut", $_GET)) {
	unset($_SESSION);
	setcookie("id", "", time() - 60 * 60);
	$_COOKIE["id"] = "";

	session_destroy();
}


if (array_key_exists("id", $_SESSION)) {
	include 'connection.php';
}
?>

<?php
include "header.php";
include "classes/Student.php";
include "navBarTop.php";

include "sideNavBar.php";
$stu = new Student();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$employee_id = $_POST['employee_id'];
	$insertdata = $stu->insertStudent($name, $employee_id);
}
?>

<div class="content">

	<div class="col">

		<h6 class="display-1" id="first name"><?php echo "My Staff Attendance."; ?></h6>

	</div>


	<div class="container">
		<?php
		if (isset($insertdata)) {
			echo $insertdata;
		}
		?>
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-success" href="add_attandance.php">Add Employee</a>
					<a class="btn btn-info float-right" href="attandance.php">Back</a>
				</h2>
			</div>

			<div class="card-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="name">Employee Name</label>
						<input type="text" class="form-control" name="name" id="name" required="">
					</div>

					<div class="form-group">
						<label for="employee_id">Employee ID</label>
						<input type="text" class="form-control" name="employee_id" id="employee_id" required="">
					</div>

					<div class="form-group text-center">
						<input type="submit" name="submit" class="btn btn-primary px-5" id="employee_id" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>