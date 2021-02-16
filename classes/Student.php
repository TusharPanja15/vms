<?php

$error = "";

// Checks Sessions and Cookies 

if (array_key_exists("logOut", $_GET)) {
	unset($_SESSION);
	setcookie("id", "", time() - 60 * 60);
	$_COOKIE["id"] = "";

	session_destroy();
}


if (array_key_exists("id", $_SESSION)) {
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath . '/../lib/Database.php');
	include_once($filepath . '/../helpers/Format.php');
}
?>


<?php

class Student
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getStudents()
	{
		$query = "SELECT * FROM tbl_employee WHERE user_id = '" . $_SESSION['id'] . "' ";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertStudent($name, $employee_id)
	{
		$name = $this->fm->validation($name);
		$employee_id = $this->fm->validation($employee_id);

		$name = mysqli_real_escape_string($this->db->link, $name);
		$employee_id = mysqli_real_escape_string($this->db->link, $employee_id);

		if (empty($name) || empty($employee_id)) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Field must not be empty !</div>";
			return $msg;
		} else {
			$stu_query = "INSERT INTO tbl_employee(user_id, name, employee_id) VALUES('" . $_SESSION['id'] . "', '$name', '$employee_id') ";
			$stu_insert = $this->db->insert($stu_query);

			$att_query = "INSERT INTO tbl_attendance(user_id, employee_id, att_time) VALUES('" . $_SESSION['id'] . "', '$employee_id', now()) ";
			$stu_insert = $this->db->insert($att_query);

			if ($stu_insert) {
				$msg = "<div class='alert alert-success'><strong>Success !</strong> Employee data inserted successfully !</div>";
				return $msg;
			} else {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong> Employee data not inserted !</div>";
				return $msg;
			}
		}
	}

	public function insertAttendance($attend = array())
	{
		$query = "SELECT DISTINCT att_time FROM tbl_attendance WHERE user_id = '" . $_SESSION['id'] . "' ";
		$getdata = $this->db->select($query);
		while ($result = $getdata->fetch_assoc()) {
			$db_date = $result['att_time'];
			$cur_date = date('Y-m-d');
			if ($cur_date == $db_date) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance Already Taken Today !</div>";
				return $msg;
			}
		}

		foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value == "present") {
				$stu_query = "INSERT INTO tbl_attendance(user_id, employee_id, attend, att_time) VALUES('" . $_SESSION['id'] . "', '$atn_key', 'present', now()) ";
				$data_insert = $this->db->insert($stu_query);
			} elseif ($atn_value == "absent") {
				$stu_query = "INSERT INTO tbl_attendance(user_id, employee_id, attend, att_time) VALUES('" . $_SESSION['id'] . "', '$atn_key', 'absent', now()) ";
				$data_insert = $this->db->insert($stu_query);
			}
		}

		if ($data_insert) {
			$msg = "<div class='alert alert-success'><strong>Success !</strong> Attendance data inserted successfully !</div>";
			return $msg;
		} else {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance data not inserted !</div>";
			return $msg;
		}
	}

	public function getDateList()
	{
		$query = "SELECT DISTINCT att_time FROM tbl_attendance WHERE user_id = '" . $_SESSION['id'] . "'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllData($dt)
	{
		$date = $this->fm->validation($dt);
		$date = mysqli_real_escape_string($this->db->link, $date);

		$query = "SELECT tbl_employee.name, tbl_attendance.*
				FROM tbl_employee
				INNER JOIN tbl_attendance
				ON tbl_employee.employee_id = tbl_attendance.employee_id
				WHERE att_time = '$date'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updateAttendance($dt, $attend)
	{
		foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value == "present") {
				$query = "UPDATE tbl_attendance
						SET attend = 'present'
						WHERE employee_id = '" . $atn_key . "' AND att_time = '" . $dt . "' AND user_id = '" . $_SESSION['id'] . "'";
				$data_update = $this->db->update($query);
			} elseif ($atn_value == "absent") {
				$query = "UPDATE tbl_attendance
						SET attend = 'absent'
						WHERE employee_id = '" . $atn_key . "' AND att_time = '" . $dt . "' AND user_id = '" . $_SESSION['id'] . "'";
				$data_update = $this->db->update($query);
			}
		}

		if ($data_update) {
			$msg = "<div class='alert alert-success'><strong>Success !</strong> Attendance data updated successfully !</div>";
			return $msg;
		} else {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance data not updated !</div>";
			return $msg;
		}
	}
}
