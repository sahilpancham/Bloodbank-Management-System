<?php 
error_reporting(0);
include('main__.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		
table, th, td{
 border: 1px solid #cbcbcb;

}
table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
    border: 1px solid #cbcbcb;

}

body {
    font-size: 19px;
    /* background: whitesmoke; */
    background:url('images/backimg.png');
    background-repeat:no-repeat;
    background-attachment:fixed;
    background-size:cover;
}

th, td{
    border:1;
    height: 30px;
    padding: 10px;

}

.__main__tr{
    background:#d71616a3;
}
tr{
    background:#9be3e68c;
    color:black;
}
tr:hover {
    background:#d71616a3;
    color:white;
}

form {
    width: 45%;
    margin: 50px auto;
    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: green;
    border: none;
    border-radius: 0px;
}
.edit_btn {
	font-size: 15px;
    text-decoration: none;
    padding: 4px 8px;
    background:blue;
    color: white;
    border-radius: 0px;
}

.del_btn {
    text-decoration: none;
    font-size: 15px;
    padding: 4px 8px;
    color: white;
    border-radius: 0px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}
	</style>
</head>
<body >

   <h2 style="margin-top:40px;margin-bottom:50px;text-align:center;background:#d71616a3;padding:7px;color:white"> ADMIN PANEL </h2>

   <h2 style="text-align: center;color:black;font-weight: bolder;margin-top:30px;margin-bottom:50px"> You can Modify the Data or Records Here </h2>

	<?php if (isset($_SESSION['message'])): ?>         <!--Session Messege-->
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6" style="margin-top:50px;">
<?php 
$results = mysqli_query($conn, "SELECT * FROM donor"); ?>
<table>
	<thead>
		<tr class="__main__tr">
		<th>Id</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Age</th>
			<th>Contact</th>
            <th>Address</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
		<td><?php echo $row['D_id']; ?></td>
			<td><?php echo $row['D_name']; ?></td>
			<td><?php echo $row['Gender']; ?></td>
			<td><?php echo $row['Age']; ?></td>
			<td><?php echo $row['Phone_no']; ?></td>
            <td><?php echo $row['D_Address']; ?></td>
			<td>
				<a href="main.php?edit=<?php echo $row['D_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="main__.php?del=<?php echo $row['D_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
	
</table>
    </div>
	<div class="col-md-6">
<h2 style="text-align:center;justify-content:center;margin-top:50px;">Insert Form </h2>

<form method="post" action="main__.php">

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	</div>
	<div class="input-group">
		<label>Gender</label>
		<input type="text" name="gender" value="<?php echo $gender; ?>">
	</div>
    <div class="input-group">
		<label>Age</label>
		<input type="text" name="age" value="<?php echo $age; ?>">
	</div>
	<div class="input-group">
		<label>Contact</label>
		<input type="text" name="contact" value="<?php echo $contact; ?>">
	</div>
	<div class="input-group">
		<label>Address</label>
		<input type="text" name="address" value="<?php echo $address; ?>">
	</div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
        </div>
        </div>
</body>
</html>