<?php 
error_reporting(0);
include('config.php');
?>
<!doctype html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script></head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="form">  
    <h4 class="text-center" style="text-align:center">ADD DONOR</h4>
    <h4 class="text-center" style="text-align:center"><i class="fa fa-user-plus"></i></h4>
    <h4 style="color:#902dfe;" class="text-center"><error id="details" class="text-center"> </error></h4>
      <form action="form.php" method="POST" class="form_">
    
             <input type="text" name="name" placeholder="Enter your name" required>
             
             <input type="text" name="contact" placeholder="Enter your Mobile Number" required>
            
             <input type="text" name="gender" placeholder="Enter your Gender" required>
            
             <input type="text" name="age" placeholder="Enter your Age" required>

             <input type="text" name="address" placeholder="Enter your local address" required>

             <input type="submit" name="submit" value="Register" class="text-dark rg_btn">
      </form>
  </div>

  <style>
    .form_{
    text-align:center;
    padding:15px;
    width:50%;
    margin:auto;
   /* border:2px solid black;*/
}

.log-btn{
    margin-left:900px;
}

.log-btn:hover{
    cursor:pointer;
    border-bottom:2px solid green; 
}
input[type=text], select,input[type=email],input[type=number],input[type=password],input[type=date]{
    width: 100%;
    height:30px;
    padding: 10px 15px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  input[type=submit] {
    width: 100%;
    background-color: #4435356;
    color: black;
    padding: 4px 10px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .rg_btn {
    background-color: lightgreen;
   }

 
   .rg_btn:hover {
    background-color: whitesmoke;
   }

</style>

  <?php
if(isset($_POST['submit']))
    {
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address=$_POST['address'];

     $select = mysqli_query($conn, "select * from donor where D_name =  '".$name."' AND Phone_no = '".$contact."'");

    if(mysqli_num_rows($select) > 0){?>
      <script type="text/javascript">
         document.getElementById('details').innerText = "User Already Exists";
      </script>
      <?php
    }

    else{

      $result=mysqli_query($conn,"INSERT INTO donor (D_name, Gender, Age, Phone_no, D_Address ) VALUES ('$name', '$gender', '$age','$contact', '$address')");?>

      <script type="text/javascript">
         document.getElementById('details').innerText = "You are Registered Successfully";
      </script>


   <?php }
    
   }   

?>
</body>
</html>
   