<?php
session_start();
$db['host']="localhost";
$db['user']='root';
$db['password']='';
$db['name']='ehosp';

foreach($db as $key => $val){
    define(strtoupper($key), $val);
}

$conn = mysqli_connect(HOST, USER, PASSWORD, NAME);
if(!$conn){ echo "connection error"; }
    $id = $_SESSION['pid'];

    $query = "SELECT * FROM emergency_contacts WHERE patient_id = {$id}";
    $select_patient_query = mysqli_query($conn,$query);
    if(!$select_patient_query) die("failed.". mysqli_error($conn));

    $row = mysqli_fetch_assoc($select_patient_query);

    $ename = $row['name'];
    $rln = $row['relationship'];
    $econtact = $row['contact'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Hospital Service</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href ="styles.css">
</head>
<body>
   <div class="regdiv">
        <nav class="navbar">
            <label class="logotext"> <i class="ri-add-box-line"></i> Registeration </label>
            <ul>
                <li><a href="index.html">Home <i class="ri-home-2-line"></i></a></li>
                <li><a href="index.html#about">About Us<i class="ri-information-line"></i></a></li>
                <li><a href="#">Services <i class="ri-service-line"></i></a></li>
                <li><a class="active" href="registration.html">Register <i class="ri-add-box-line"></i></a></li>
                <li><a href="contact.html">Contact Us <i class="ri-phone-line"></i></a></li>
                <li><a href="login.html">Log In <i class="ri-login-box-line"></i></a></li>
            </ul>
        </nav>

        <div class="formhead">
            <h6>Update your Emergency Contact</h6>
            <h5>The hospital you trust to care for those you love...</h5>
            <img src="images/logo3.png" align="right" width="370" height="300">
        </div>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" id="reg_form" name="reg_form" onsubmit="return SubValidate()">
       
        <div class="formsub2" style="top:400px; height:fit-content;">
            <h6>In Case of Emergency Contact ...</h6><br>
            <div class="row mb-3">
                <label for="ename" class="col-sm-2 col-form-label">Name of person</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="ename" name="ename" onblur="validateEname()" value="<?php echo $ename;?>">
                </div>
                <span id="errorename"></span>
            </div>
            <div class="row mb-3">
                <label for="econtact" class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="econtact" name="econtact" value="<?php echo $econtact;?>">
                </div>
                <span id="errorecon"></span>
            </div>
            <div class="row mb-3">
                <label for="rln" class="col-sm-2 col-form-label">Relationship</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="rln" name="rln" value="<?php echo $rln;?>">
                </div>
                <span id="errorrln"></span>
            </div>
        <button name ="update" class="btn btn-primary">Update</button>
        <button name="cancel" class="btn btn-danger">Cancel</button>

        </form>
    </div>
</body>
<script src="scripts.js"></script>
</html>


<?php

if(isset($_POST['cancel']))
{
    $conn->close();
    header("Location:profile.jsp");
}

if(isset($_POST['update']))
{
    $ename = $_POST['ename'];
    $econtact = $_POST['econtact'];
    $rln = $_POST['rln'];

    $query = "UPDATE emergency_contacts SET relationship = '{$rln}', name = '{$ename}', contact = '{$econtact}' WHERE patient_id = $id";

    $update_patients_query = mysqli_query($conn,$query);
    if(!$update_patients_query) die("failed.". mysqli_error($conn));
   
    header("Location:profile.php");
}

$conn->close();
?>