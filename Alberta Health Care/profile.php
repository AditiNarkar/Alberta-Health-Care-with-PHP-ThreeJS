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

    $query = "SELECT * FROM patients WHERE patient_id = {$id}";
    $select_patient_query = mysqli_query($conn,$query);
    if(!$select_patient_query) die("failed.". mysqli_error($conn));

    $row = mysqli_fetch_assoc($select_patient_query);

    $full_name = $row['full_name'];
    $dob = $row['dob'];
    $age = $row['age'];
    $email = $row['email'];
    $contact = $row['contact'];
    $sex = $row['sex'];
    $martial_status = $row['martial_status'];

    $query = "SELECT * FROM emergency_contacts WHERE patient_id = {$id}";
    $select_econt_query = mysqli_query($conn,$query);
    if(!$select_econt_query) die("failed.". mysqli_error($conn));

    $row = mysqli_fetch_assoc($select_econt_query);

    $ename = $row['name'];
    $econtact = $row['contact'];
    $relationship = $row['relationship'];

if(isset($_GET['logout']))
{
    logout();
}
function logout()
{
    session_unset();
    session_destroy();
    echo "<script>window.location.href = 'index.php'; </script>";
}
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

    <div class="profile">
        <nav class="navbar">
            <label class="logotext"> <i class="ri-profile-line"></i> Patient Profile </label>
            <ul>
                <li><a href="index.html">Home <i class="ri-home-2-line"></i></a></li>
                <li><a href="index.html#about">About Us<i class="ri-information-line"></i></a></li>
                <li><a href="#">Services <i class="ri-service-line"></i></a></li>
                <li><a href="registration.html">Register <i class="ri-add-box-line"></i></a></li>
                <li><a href="contact.html">Contact Us <i class="ri-phone-line"></i></a></li>
                <li><a class="logout" href="profile.php?logout=true"> Log Out <i class="ri-logout-box-line"></i></a></li>
            </ul>
        </nav>

        <div class="sidebar">
            <ul class="profilesideul">
                <li><a href="profile.php" onmouseover="Shadow(this)" onmouseout="remShadow(this)">Personal Information </a></li><hr>
                <li><a href="#" onmouseover="Shadow(this)" onmouseout="remShadow(this)">Medical History      </a></li><hr>
                <li><a href="#" onmouseover="Shadow(this)" onmouseout="remShadow(this)">Book an Appointment  </a></li><hr>
                <li><a href="#" onmouseover="Shadow(this)" onmouseout="remShadow(this)">Buy Meds             </a></li><hr>
                <li><a href="#" onmouseover="Shadow(this)" onmouseout="remShadow(this)">My Reports      </a></li><hr>
                <li><a href="#" onmouseover="Shadow(this)" onmouseout="remShadow(this)">Our Specialists      </a></li><hr>
                <li><a href="#" onmouseover="Shadow(this)" onmouseout="remShadow(this)">Feedback      </a></li>
            </ul>
        </div>

        <form action="<?php echo 'edit_personal_info.php'?>" method="POST">
        <div class="info">
            <img class="infologo" src="images/logo3.png" width="150" height="150"><hr>
            <h6 style="text-align: center;">Personal Information</h6><br>
            <label>PatientID</label>    <span>PAT<?php echo $id; ?></span><br>
            <label>Name</label>         <span><?php echo $full_name; ?></span><br>
            <label>Date of Birth</label><span><?php echo $dob; ?></span><br>
            <label>Age/Sex</label>      <span><?php echo $age; ?> / <?php echo $sex; ?></span><br>
            
            <label>Marital Status</label>        <span><?php echo $martial_status; ?></span><br>
            <label>Contact 1</label>     <span><?php echo $contact; ?></span><br>
        
            <label>Email</label> <span><?php echo $email; ?></span><br><br><br>
           
            <button class="btn btn-primary infologo" type="submit">Edit</button><hr>
        </form>


        <form action="<?php echo 'edit_econt.php'?>" method="POST">

            <h6 style="text-align: center;">Emergency Contact Details</h6><br>
            <label>Name</label>         <span><?php echo $ename; ?></span><br>
            <label>Relation with patient</label> <span><?php echo $relationship; ?></span><br>
          
            <label>Contact</label>     <span><?php echo $econtact; ?></span><br><br><br>
    
            <button class="btn btn-primary infologo" type="submit">Edit </button>
        </div>
        </form>

    </div>
</body>
<script src="scripts.js"></script>
</html>