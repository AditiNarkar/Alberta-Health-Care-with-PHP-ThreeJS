<?php

$db['host']="localhost";
$db['user']='root';
$db['password']='';
$db['name']='ehosp';

foreach($db as $key => $val){
    define(strtoupper($key), $val);
}

$conn = mysqli_connect(HOST, USER, PASSWORD, NAME);
if(!$conn){ echo "connection error"; }


if(isset($_POST['register']))
{
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $mstatus = $_POST['mstatus'];
    $pwd = $_POST['pwd'];

    $ename = $_POST['ename'];
    $econtact = $_POST['econtact'];
    $rln = $_POST['rln'];

    $query = "SELECT email FROM patients WHERE email = '{$email}'";
    $exist_email = $conn->query($query);
    if($exist_email -> num_rows > 0)
    {
        echo '<script>alert("user already exists.")</script>' ;
        die();
    }

    $query = "INSERT INTO patients(full_name,dob,age,email,contact,sex,martial_status,password)VALUES('{$full_name}', '{$dob}',$age,'{$email}','{$contact}','{$gender}','{$mstatus}','{$pwd}')";
    $insert_patients_query = mysqli_query($conn,$query);
    if(!$insert_patients_query) die("failed.". mysqli_error($conn));
    else 
    {
        $query = "SELECT patient_id FROM patients WHERE email = '{$email}'";
        $result = $conn->query($query);
        $row = mysqli_fetch_array($result);
        if($row['patient_id'])
        {
            $patient_id = $row['patient_id'];
            $query = "INSERT INTO emergency_contacts(patient_id,relationship,name,contact) VALUES($patient_id, '{$rln}','{$ename}','{$econtact}')";
            $insert_econtacts_query = mysqli_query($conn,$query);
            if(!$insert_econtacts_query) die("failed.". mysqli_error($conn));
        }
        
        header("Location:login.php");
    }
}

$conn->close();
?>