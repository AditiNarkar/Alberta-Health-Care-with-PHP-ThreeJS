<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Hospital Service</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href ="styles.css">
</head>
<body>
<div class="base">
    <div class="div1">
        <nav class="navbar">
            <label class="logotext"> <i class="ri-home-2-fill"></i> Home </label>
            <ul>
                <li><a class="active" href="index.php" >Home <i class="ri-home-2-line"></i></a></li>
                <li><a href="javascript:void(0)" onclick="window.scrollBy(0, 500)">About Us <i class="ri-information-line"></i></a></li>
                <li><a href="#">Services <i class="ri-service-line"></i></a></li>
                <li><a href="contact.php">Contact Us <i class="ri-phone-line"></i></a></li>
                <li><a href="javascript:void(0)" onclick="readCookie()">Log In <i class="ri-login-box-line"></i></a></li>
            </ul>
        </nav>
        <h1><span>eHospital Services</span></h1>
        <h2 align="center"><i>offered by Alberta Health Care </i></h2>
        <div class="logo"></div> 
             
        <div class="model">
            <canvas class="webgl"></canvas>
            <script type="module" src="load_model.js"></script>
        </div>
        
        <div class="nurse"></div> 
        
        <div class="div2">
            <button class="btn btn-primary" type="button" onclick="window.location.href='login.php'" onmouseover="Shadow(this)" onmouseout="remShadow(this)">Log In</button>
            <br> <br> <button class="btn btn-outline-info" type="button" onclick="window.location.href='registration.php'" onmouseover="Shadow(this)" onmouseout="remShadow(this)">Register</button>
        </div>
    </div>

    <br><br>
    <div class="about" id="about">
        <h3>Alberta Health Care</h3>
        <div><img src="images/mission.png" width="1000"></div> <br>
        <div><img src="images/about1.png" ><img src="images/img1.png" width="350" height="300" ></div><br><hr>
        <div>
            <img src="images/about2.png" onmouseover="photo_in(this)" onmouseout="photo_out(this)"> 
            <img src="images/about3.png" style="padding-left: 60px;" onmouseover="photo_in2(this)" onmouseout="photo_out2(this)">
            <img src="images/about4.png" style="float: right;" onmouseover="photo_in(this)" onmouseout="photo_out(this)">
        </div><br><hr>
        <h3 style="text-align: center;"> Cares </h3>
        <div>
            <img src="images/care1.png" id="c1" onmouseover="Shadow(this)" onmouseout="remShadow(this)">
          <img src="images/care2.png" id="c2" onmouseover="Shadow(this)" onmouseout="remShadow(this)" style="float: right;">
        </div><br>
        <div>
            <img src="images/care3.png" id="c3" onmouseover="Shadow(this)" onmouseout="remShadow(this)">
            <img src="images/care4.png" id="c4" onmouseover="Shadow(this)" onmouseout="remShadow(this)" style="float: right;">
        </div><br>
        <div><button type="button" class="btn btn-primary" onmouseover="Shadow(this)" onmouseout="remShadow(this)">View All</button></div><hr>
        
        <h3 style="text-align: center;">Clinical Excellence</h3>
        <div>
            <img src="images/e1.png" alt="">
            <img src="images/e2.png" style="padding-left: 150px;">
            <img src="images/e3.png" style="float: right;">
        </div><br> <hr>
        <div class="icon">
            <i class="ri-facebook-circle-fill" onmouseover="Shadow(this)" onmouseout="remShadow(this)"></i>
            <i class="ri-instagram-fill" onmouseover="Shadow(this)" onmouseout="remShadow(this)"></i>
            <i class="ri-twitter-fill" onmouseover="Shadow(this)" onmouseout="remShadow(this)"></i>
        </div>
    </div>

</div>
</body>

<script src="scripts.js"></script>
</html>