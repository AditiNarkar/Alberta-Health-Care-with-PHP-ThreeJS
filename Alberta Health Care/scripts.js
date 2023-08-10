/*var m = document.getElementById('c1');
m.addEventListener('click', ()=>{
    window.open('cancer.html', '', 'top=150, left=500, width=500,height=400');
});*/
function emptyErrors(){
    document.getElementById('errorname').innerHTML = null ;
    document.getElementById('errordob').innerHTML = null ;
    document.getElementById('errorage').innerHTML = null ;
    document.getElementById('errormail').innerHTML = null ;
    document.getElementById('errorcon').innerHTML = null ;
    document.getElementById('errorpwd').innerHTML = null ;
    document.getElementById('errorpwd2').innerHTML = null ;
    document.getElementById('errorename').innerHTML = null ;
    document.getElementById('errorecon').innerHTML = null ;
    document.getElementById('errorrln').innerHTML = null ;
    document.getElementById('errorsex').innerHTML = null ;
    document.getElementById('errorstatus').innerHTML = null ;
}

const Name    = document.getElementById('name');
const dob     = document.getElementById('dob');
const age     = document.getElementById('age');
const mail    = document.getElementById('mailid');
const con     = document.getElementById('contact');
const p1      = document.getElementById('pwd');
const p2      = document.getElementById('pwd2');
const ename   = document.getElementById('ename');
const econ    = document.getElementById('econtact');
const rln     = document.getElementById('rln');
const sex     = document.reg_form.gender;
const ms      = document.getElementById('mstatus');
const confirm = document.getElementById('confirm');

const pattern  = /^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;

function SubValidate()
{
    emptyErrors();
    
    var validateSex = false;

    if( Name.value =="" && dob.value=="" && age.value=="" && mail.value=="" && con.value=="" && validateSex == false && p1.value == "" && p2.value=="" && ename.value == "" && econ.value =="" && rln.value=="" )
    {
        window.scrollBy(0, -1000);
        alert("Dear Patient, Fill all fields before registering.");
        return false;
    }
    else if(confirm.checked == false){
        alert("Confirm Registration by clicking on the checkbox.");
        return false;
    }
    else if(dob.value == "")
    {
        dob.style.borderColor = "red";
        document.getElementById("errordob").innerHTML = "Date of Birth cannot be empty";
        window.scrollBy(0, -900);
        return false;
    }
    else if(!age.value.match(/^[0-9]{2}$/))
    {
        age.style.borderColor = "red";
        document.getElementById("errorage").innerHTML = "Age should be a number.";
        window.scrollBy(0, -900);
        return false;
    }
    else if(mail.value=="")
    {
        mail.style.borderColor = "red";
        document.getElementById("errormail").innerHTML = "Mail cannot be empty";
        window.scrollBy(0, -900);
        return false;
    }
    else if(con.value=="")
    {
        con.style.borderColor = "red";
        document.getElementById("errorcon").innerHTML = "Contact cannot be empty";
        window.scrollBy(0, -700);
        return false;
    }
    else if(!con.value.match(/^[0-9]{10}$/))
    {
        con.style.borderColor = "red";
        document.getElementById("errorcon").innerHTML = "Invalid Contact. Enter 10 digit contact number.";
        window.scrollBy(0, -700);
        return false;
    }
    else if(con.value.length != 10 )
    {
        con.style.borderColor = "red";
        document.getElementById("errorcon").innerHTML = "Contact is 10 digit.";
        window.scrollBy(0, -700);
        return false;
    }
    else if(p1.value=="")
    {
        p1.style.borderColor = "red";
        document.getElementById("errorpwd").innerHTML = "Password cannot be empty";
        window.scrollBy(0, -600);
        return false;
    }
    else if(p2.value == "" && p1.value != p2.value)
    {
        p2.style.borderColor = "red";
        document.getElementById("errorpwd2").innerHTML = "Should be same as entered password";
        window.scrollBy(0, -600);
        return false;
    }
    else if(ename.value=="")
    {
        ename.style.borderColor = "red";
        document.getElementById("errorename").innerHTML = "Enter person name to contact in emergency.";
        window.scrollBy(0, -100);
        return false;
    }
    else if(econ.value=="")
    {
        econ.style.borderColor = "red";
        document.getElementById("errorecon").innerHTML = "Emergency Contact Number cannot be empty";
        window.scrollBy(0, -100);
        return false;
    }
    else if(econ.value.length != 10)
    {
        econ.style.borderColor = "red";
        document.getElementById("errorecon").innerHTML = "Emergency Contact Number should be 10 digit.";
        window.scrollBy(0, -100);
        return false;
    }
    else if(!econ.value.match(/^[0-9]+$/))
    {
        econ.style.borderColor = "red";
        document.getElementById("errorecon").innerHTML = "Emergency Contact Number invlaid. Enter only numbers.";
        window.scrollBy(0, -100);
        return false;
    }
    else if(rln.value =="")
    {
        rln.style.borderColor = "red";
        document.getElementById("errorrln").innerHTML = "Enter your relationship with the person.";
        window.scrollBy(0, -100);
        return false;
    }
    else if(ms.value == "Choose...")
    {
        console.log(ms.value);
        document.getElementById("errorstatus").innerHTML = "Select your marital status.";
        window.scrollBy(0, -600);
        return false;
    }
    else if(validateSex == false)
    {
        for(var i=0; i<sex.length; i++)
        {
            if(sex[i].checked)
            {
                validateSex = true;
                break;
            }
        }
        if(validateSex == false){
            document.getElementById("errorsex").innerHTML = "Choose your sex.";
            window.scrollBy(0, -600);
            return false;
        }
    }
}

function cancelReg(){
    alert("Registration Cancelled.");
    window.location.href='index.html';
}

function loadlogin(){
    alert("Dear Patient, if you are registered, Login with your email and password.");
}

function validateName(){

    if(!Name.value.match(/^[A-Za-z\s]+$/))
    {
        Name.style.borderColor = "red";
        document.getElementById("errorname").innerHTML = "Patient Name is not valid.";
    }
    else{
        document.getElementById("errorname").innerHTML = null;
        Name.style.borderColor = "green";
    }
}

function validateEname(){

    if(!ename.value.match(/^[A-Za-z\s]+$/))
    {
        ename.style.borderColor = "red";
        document.getElementById("errorename").innerHTML = "Emergency Contact Name is not valid.";
    }
    else{
        document.getElementById("errorename").innerHTML = null;
        ename.style.borderColor = "green";
    }
}

function validateEmail(){
    if(mail.value=="")
    {
        mail.placeholder="yourname@gmail.com";
    }
}

function clickPwd(){
    if(p1.value == ""){
        p1.placeholder ="Enter minimum 4 character length password.";
    }
}

function validatePwd(){
    if(p1.value.length > 0){
        if(p1.value.length < 4){
            p1.style.borderColor = "red";
            document.getElementById("errorpwd").innerHTML = "Password too short.";
        }
        else if(p1.value.length > 8){
            p1.style.borderColor = "red";
            document.getElementById("errorpwd").innerHTML = "Password too long.";
        }
        else {
            p1.style.borderColor = "green";
            document.getElementById("errorpwd").innerHTML = null;
        }
    }
}

function validateDOB(){
    if(dob.value.length > 0){
        if(!pattern.test(dob.value)){
            dob.style.borderColor = "red";
            document.getElementById("errordob").innerHTML = "Incorrect Date of Birth.";
        }
        else{
            dob.style.borderColor = "gray";
            document.getElementById("errordob").innerHTML = null;
        }
    }
}

function Shadow(ele){
    ele.style.boxShadow = "6px 6px 29px -4px black";
}

function remShadow(ele){
    ele.style.boxShadow = "none";
}

function loadreg(){
    alert("Fill out the form to register.");
}

function photo_in(p)
{
	p.style.height = "200px";
	p.style.width = "300px";
    //p.style.left = "10px";
}
function photo_out(p)
{
	//p.style.height = "100px";
	p.style.width = "289px";
    p.style.height = "194px";
}

function photo_in2(p)
{
	p.style.height = "200px";
	p.style.width = "400px";
    //p.style.left = "10px";
}
function photo_out2(p)
{
	//p.style.height = "100px";
	p.style.width = "370px";
    p.style.height = "194px";
}

/*function readRole()
{
    var crole = document.getElementById("role").value;
    var cmail = document.getElementById("logmailid").value;

    if(crole == "patient")
    {
        createCookie(crole, cmail);
        //window.location.href = "homelogin.html";
    }
    else 
        alert("Please login as patient.");
    
    return false;
}

function createCookie(crole, cmail)
{
    var now = new Date();
    now.setTime(now.getTime() + 3600 * 1000);

    document.cookie =
    "role=" + crole +
    "; expires=" + now.toUTCString();
    document.cookie = "email=" + cmail;
    alert("cookie created");
}

var ReadMail;
function readCookie()
{
    var carray = document.cookie.split(";");

    var RolePair = carray[0].split("=");
    var ReadRole = RolePair[1];
    
    if(ReadRole == "patient")
    {
        window.location.href = "homelogin.html";
    }
    else window.location.href = "login.html";

    var MailPair = carray[1].split("=");
    var mail = MailPair[1];
    window.ReadMail = mail;  
}*/

var m = document.getElementById('c1');
m.addEventListener('click', ()=>{
    window.open('cancer.html', '', 'top=150, left=500, width=500,height=400');
});


/*function setMail()
{
    alert(window.ReadMail);
    document.getElementById("writeMail").innerHTML = window.ReadMail;
}*/