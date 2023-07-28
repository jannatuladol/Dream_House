<?php
require "../Model/managerDB.php";

session_start();
if (!isset($_COOKIE['rem'])) {
	header('location: logout.php');
}
if (!isset($_SESSION['id'])) {
	header('location: login.php');
}
?>

<?php
// include ('profile-header.php'); 
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<!-- PHP Start -->
	<?php
	// Variable
	$FirstNameErrMsg = "";
	$LastNameErrMsg = "";
	$GenderErrMsg = " ";
	$NIDErrMsg = " ";
	$SoldErrMsg = "";



	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$flag = false;
		if (empty($_POST['FirstName'])) {
			$FirstNameErrMsg = "First Name Empty";
			$flag = true;
		}
		if (empty($_POST['LastName'])) {
			$LastNameErrMsg = "Last Name Empty";
			$flag = true;
		}
		if (empty($_POST['Gender'])) {
			$GenderErrMsg = "Gender not Selected";
			$flag = true;
		}
		if (empty($_POST['NID'])) {
			$NIDErrMsg = "NID is Empty";
			$flag = true;
		}
		if (empty($_POST['Sold'])) {
			$SoldErrMsg = "Sold is Empty";
			$flag = true;
		}

		// condition All true then			
		if (!$flag) {
			insert_manager($_POST['FirstName'], $_POST['LastName'], $_POST['Gender'], $_POST['NID'], $_POST['Sold']);
			// setcookie('msg', '<b>✅Registration uccessful!</b><br>', time() + 1, '/');
		} else {
			setcookie('msg', '<b>❌Manager ADD NOT Successful!</b><br>', time() + 1, '/');
			header('location: ../View/managerlist.php');
		}
	}
	?>