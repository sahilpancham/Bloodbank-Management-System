<?php 
	session_start();
	include('config.php');

	$name = "";
	$gender = "";
	$age = "";
	$contact = "";
    $address = "";
	$id = 0;
	$update = false;
     
    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM donor WHERE D_id = $id");

		if ($record > 0 ) {
			$n = mysqli_fetch_array($record);
		 	$name = $n['D_name'];
			$gender = $n['Gender'];
			$age = $n['Age'];
			$contact = $n['Phone_no'];
            $address = $n['D_Address'];
		}
     }

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
		
		$contact = $_POST['contact'];
		$address = $_POST['address'];

		mysqli_query($conn, "INSERT INTO donor (D_name, Gender, Age, Phone_no, D_Address) VALUES ('$name', '$gender', '$age', '$contact', '$address')"); 
		$_SESSION['message'] = "Details saved"; 
		header('location: main.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];

		mysqli_query($conn, "UPDATE donor SET D_name='$name', Gender='$gender', Age='$age', Phone_no='$contact', D_Address='$address'  WHERE D_id=$id");
		$_SESSION['message'] = "Details updated!"; 
		header('location: main.php');
	}
	if (isset($_GET['del'])) {
	   $id = $_GET['del'];
	   mysqli_query($conn, "DELETE FROM donor WHERE D_id=$id");
	   $_SESSION['message'] = "Details deleted!"; 
	   header('location: main.php');
    }
?>