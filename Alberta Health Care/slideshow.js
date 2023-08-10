//SLIDESHOW

var i = 0;
var images = [];
var t = 2000; //millisecs

images[0] = 'images/ss7.jpg';
images[1] = 'images/ss1.jpg';
images[2] = 'images/ss2.jpg';
images[3] = 'images/ss3.jfif';
images[4] = 'images/ss4.jpg';
images[5] = 'images/ss5.jpg';
images[6] = 'images/ss6.jpg';

function changeImg() 
{
    document.getElementById("slideimg").src = images[i];
    i = (i+1) % images.length; 
}
window.onload = function(){ setInterval(changeImg, t); } 