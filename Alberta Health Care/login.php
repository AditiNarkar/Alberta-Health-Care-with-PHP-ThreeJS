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


if(isset($_POST['login']))
{
    $logmailid = $_POST['logmailid'];
    $logpwd = $_POST['logpwd'];
    
    $query = "SELECT password, patient_id FROM patients WHERE email = '{$logmailid}'";
    $password_verification = $conn->query($query);
   
    if($password_verification -> num_rows == 0)
    {
        echo '<script>alert("User is not registered. Register first.")</script>';
    }
    else
    {
        $row = mysqli_fetch_array($password_verification);
        if($row['password'] == $logpwd)
        {
            $id = $row['patient_id'];
            $_SESSION['pid'] = $id;
            header("Location:profile.php");
        }
        else{
            echo '<script>alert("Invalid Login attempt.")</script>';
        }
    }
}

$conn->close();
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
<body onload="loadlogin()">

    <div class="logindiv">
        <nav class="navbar">
            <label class="logotext"> <i class="ri-login-box-line"></i> Log In Page</label>
            <ul>
                <li><a href="index.html">Home <i class="ri-home-2-line"></i></a></li>
                <li><a href="index.html#about">About Us<i class="ri-information-line"></i></a></li>
                <li><a href="#">Services <i class="ri-service-line"></i></a></li>
                <li><a href="registration.html">Register <i class="ri-add-box-line"></i></a></li>
                <li><a href="contact.html">Contact Us <i class="ri-phone-line"></i></a></li>
                <li><a class="active" href="login.html">Log In <i class="ri-login-box-line"></i></a></li>
            </ul>
        </nav>

        <div class="loginform">
            <div class="col1">
                <img src="images/logo3.png" height="150" width="350" style="padding-left: 170px;">
                <img src="images/login1.jpg" style="padding-left: 70px;">
            </div>
            <div class="col2">
                <h3 style="padding-left: 70px; padding-top: 40px; font-family: 'Satisfy', cursive;">Welcome, Patient !</h3>
                <h4 style="padding-left: 70px; font-size: small; font-style: italic;">Log In to your account ...</h4>
                <br><hr><br>

                <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="ploginform" method="POST">
                    <div class="row mb-3">
                        <label for="logmailid" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select id="role" name="role" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected value="patient">Patient</option>
                                <option value="doctor">Doctor</option>
                                <option value="nurse">Nurse</option>
                                <option value="admin">Admin</option>
                              </select>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <label for="logmailid" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="logmailid" name="logmailid">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="logpwd" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="logpwd" name="logpwd">
                        </div>
                    </div><br>
                    <button type="submit" class="btn btn-primary" style="float: right;" name = "login">Log In</button><br><br><br>
                    
                    <div>
                      <h4 style="padding-left: 10px; font-size: small; font-style: italic;">New Here? <a href="registration.html"> Register Instead </a></h4>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="scripts.js"></script>
</html>