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

    <div class="contactdiv">
        <nav class="navbar">
            <label class="logotext"> <i class="ri-phone-line"></i> Contact Us</label>
            <ul>
                <li><a href="index.html">Home <i class="ri-home-2-line"></i></a></li>
                <li><a href="index.html#about">About Us<i class="ri-information-line"></i></a></li>
                <li><a href="#">Services <i class="ri-service-line"></i></a></li>
                <li><a href="registration.html">Register <i class="ri-add-box-line"></i></a></li>
                <li><a class="active" href="contact.html">Contact Us <i class="ri-phone-line"></i></a></li>
                <li><a href="login.html">Log In <i class="ri-login-box-line"></i></a></li>
            </ul>
        </nav>

        <div class="coninfo">
            <img src="images/logo3.png" height="150" width="150" class="infologo">
            <span><b>Address: </b>12, New Roseville Road, New Marine Lines, Mumbai, Maharashtra 400200</span>
            <br><br><span><b>Telephone No.: </b>+91-22-987654567 / 40611111</span>
            <br><span><b>Fax No.: </b>+91-22-34562133</span>
            <br><br><span><b>Email-id: </b></span>
            <br><span><b>Enquiries: </b>helpdesk@albertahospital.com</span>
            <br><span><b>Suggestions: </b>suggest@albertahospital.com</span>
        </div>

        <div class="contactform">
            <div class="col1">
                <img src="images/logo3.png" height="150" width="350" style="padding-left: 170px;">
                <img src="images/contact.jpg" style="padding-left: 70px;" height="370">
            </div>
            <div class="col2">
                <h3 style="padding-left: 70px; padding-top: 40px; font-family: 'Satisfy', cursive;">For Enquiries Contact Us</h3>
                <h4 style="padding-left: 70px; font-size: small; font-style: italic;">Feel free to contact us and we will get back to you a soon as we can.</h4>
                <hr>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ploginform" method="post">
                    <div class="row mb-3">
                        <label for="cname" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="cname" name="cname">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cmailid" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="cmailid" name="sender_email">
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea name="msg" class="form-control" placeholder="Type your Message" id="msg" style="height: 100px"></textarea>
                        <label for="msg">Type your Message</label>
                      </div><br>
                    <button type="submit" name="send" class="btn btn-primary" style="float: right;">Send</button><br><br><br>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
 if(isset($_POST['send']))
 {
    $cname= $_POST['cname'];
    $sender_email= $_POST['sender_email'];
    $msg= $_POST['msg'];

    $to = "aditinarkar2004@gmail.com";
    $subject = "Contacted us";
    $headers =  "FROM: ".$sender_email;
    $headers .=  "Name: ".$cname;

    if(mail($to, $subject, $msg, $headers))
         echo "<script>alert('Your meassage is delivered to us and we will try to contact asap.');</script>";
 }
?>