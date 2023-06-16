<?php
  include_once("config.php");
  error_reporting(0);
?>  


<!doctype html>
<html>
<head>
<!-- <link rel="stylesheet" href="style.css">     -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script></head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body{
    padding:0px;
    margin:0px;
    background:url('admin/images/backimg.png');
    background-repeat:no-repeat;
    background-attachment:fixed;
    background-size:cover;
}

 

.form{
    width:30%;
    margin:auto;
    padding-top:120px;
    padding-bottom:160px;
   
}

.__hr{
width: 130px;
margin: auto;
height: auto;
color: black;
}

.form_{
    text-align:center;
    padding:15px;
   /* border:2px solid black;*/
}

.log-btn{
    margin-left:900px;
}

.log-btn:hover{
    cursor:pointer;
    border-bottom:2px solid green; 
}

.footer{
position: fixed;
bottom: 0;
}

.ft-nav{
    display: inline-flex;
}

.ft_{
    background-color: #d71616a3;
}

.admin:hover{
    cursor:pointer;
    border-bottom:2px solid black;
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


   .us_log{
    background-color: #90ee90;
   }
  

   .us_log:hover{
    
    background-color: whitesmoke;
   }
    </style>
<body>
<div class="main-image container-fluid">
   <div class="container">
   <h2 class="text-center pt-4">Online Blood Donation Camp</h2>
   <hr class="__hr">
   </div>
</div>
  
  <div class="" style="width:50%; margin:auto; margin-top:150px; padding-top:50px; padding-bottom:50px; border:2px solid black; opacity:0.8">
    <p style="font-size:25px;text-align:center;"> This Portal is For Online Registration Of the Donor for Youth Blood Donation Camp.
      You can Directly Register For Blood Donation and Help Other people who are in need of Blood.
    </p>
    <div class="text-center mt-5">
    <a href="form.php" class="btn btn-success">Register</a>
  </a>
  </div>
</div>

<!-- <div class="container-fluid footer">
    
        <div class="row p-2 ft_">
           <div class="col-sm-4  text-center text-dark" style="font-size:21px;">About-us</div>
           <div class="col-sm-4  text-center" style="font-size:21px;"><a href="#" class="text-decoration-none text-dark admin">Admin Login</a></div>
           <div class="col-sm-4  text-center text-dark" style="font-size:21px;">Feedback</div>
        </div>
   
</div> -->
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








