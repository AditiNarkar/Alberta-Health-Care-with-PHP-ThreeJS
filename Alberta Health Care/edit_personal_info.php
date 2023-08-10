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
                <li><a href="registration.html">Register <i class="ri-add-box-line"></i></a></li>
                <li><a href="contact.html">Contact Us <i class="ri-phone-line"></i></a></li>
                <li><a href="login.html">Log In <i class="ri-login-box-line"></i></a></li>
            </ul>
        </nav>


        <div class="formhead">
            <h6>Update your Personal Information</h6>
            <h5>The hospital you trust to care for those you love...</h5>
            <img src="images/logo3.png" align="right" width="370" height="300">
        </div>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" id="reg_form" name="reg_form" onsubmit="return SubValidate()">
        <div class="m-auto formsub1" style="height:fit-content;">
            <h6>Personal Information</h6><br>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name"  name="full_name" onblur="validateName()" value="<?php echo $full_name;?>">
                    </div>
                    <span id="errorname"></span>
                </div>
                
                <div class="row mb-3">
                    <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="dob" name="dob"placeholder="DD/MM/YYYY" onmouseout="validateDOB()" value="<?php echo $dob;?>">
                    </div>
                    <span id="errordob"></span>
                </div>

                <div class="row mb-3">
                    <label for="age" class="col-sm-2 col-form-label">Completed Age</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="age" name="age" value="<?php echo $age;?>">
                    </div>
                    <span id="errorage"></span>
                </div>

                <div class="row mb-3">
                  <label for="mailid" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="mailid" name="email" onclick="validateEmail()" value="<?php echo $email;?>">
                  </div>
                  <span id="errormail"></span>
                </div>

                <div class="row mb-3">
                    <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact;?>">
                    </div>
                    <span id="errorcon"></span>
                </div>

                <?php

                if($sex == 'male')
                {
                ?>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Sex</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                      <label class="form-check-label" for="male">
                        Male
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                      <label class="form-check-label" for="female">
                        Female
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                      <label class="form-check-label" for="other">
                        Other
                      </label>
                    </div>
                  </div>
                  <span id="errorsex"></span>
                </fieldset>

                <?php }

                else if($sex == 'female')
                {?>
                    <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Sex</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">
                          Female
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" checked>
                        <label class="form-check-label" for="other">
                          Other
                        </label>
                      </div>
                    </div>
                    <span id="errorsex"></span>
                  </fieldset>
                <?php
                }

                else{ ?>
                    <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Sex</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" checked>
                        <label class="form-check-label" for="other">
                            Other
                        </label>
                        </div>
                    </div>
                    <span id="errorsex"></span>
                    </fieldset>
                <?php
                }
                ?>

                <?php
                if($martial_status == 'Married')
                {?>
                    <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Marital Status</legend>
                    <div class="col-auto">
                        <select class="form-select" id="mstatus" name="mstatus">
                          <option value="Married" selected>Married</option>
                          <option value="Non-Married">Non-Married</option>
                        </select>
                      </div>
                     
                    </fieldset>
                <?php
                }

                else{
                ?>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Marital Status</legend>
                    <div class="col-auto">
                        <select class="form-select" id="mstatus" name="mstatus">
                         
                          <option value="Married">Married</option>
                          <option value="Non-Married" selected>Non-Married</option>
                        </select>
                      </div>
                     
                </fieldset>

                <?php
                }
                ?>

        <button name ="update" class="btn btn-primary">Update</button>
        <button name ="cancel" class="btn btn-danger">Cancel</button>
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
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $mstatus = $_POST['mstatus'];

    $query = "SELECT email FROM patients WHERE email = '{$email}' AND patient_id NOT EQUAL TO $id";
    $exist_email = $conn->query($query);
    if($exist_email)
    {
        echo '<script>alert("Entered email already exists. Cannot update.")</script>' ;
        die();
    }

    $query = "UPDATE patients SET full_name = '{$full_name}', full_name = '{$full_name}', dob = '{$dob}', age = {$age}, email = '{$email}', contact = '{$contact}', sex = '{$gender}', martial_status = '{$mstatus}' WHERE patient_id = $id";

    $update_patients_query = mysqli_query($conn,$query);
    if(!$update_patients_query) die("failed.". mysqli_error($conn));
   
   echo "<script>window.location.href='profile.php';</script>";  
}
$conn->close();
?>