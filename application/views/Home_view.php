<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Faculty of Computer Science (FILKOM)</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css');?>">

	<style>
		body{
			background-image: url("<?php echo base_url('assets/img/filkom2.jpg')?>");
			background-repeat: no-repeat;
    		background-size: 100%;
    		
		}
	</style>

	<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ;?>"></script>
<style type="text/css">
#overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=70);
-moz-opacity:0.7;
-khtml-opacity: 0.7;
opacity: 0.7;
z-index: 100;
display: none;
}
.cnt223 a{
text-decoration: none;
}
.popup{
width: 100%;
margin: 0 auto;
display: none;
position: fixed;
z-index: 101;
}
.cnt223{
min-width: 600px;
width: 600px;
min-height: 150px;
margin: 100px auto;
background: #f3f3f3;
position: relative;
z-index: 103;
padding: 15px 35px;
border-radius: 5px;
box-shadow: 0 2px 5px #000;
}
.cnt223 p{
clear: both;
    color: #555555;
    /* text-align: justify; */
    font-size: 20px;
    font-family: sans-serif;
}
.cnt223 p a{
color: #d91900;
font-weight: bold;
}
.cnt223 .x{
float: right;
height: 35px;
left: 22px;
position: relative;
top: -25px;
width: 34px;
}
.cnt223 .x:hover{
cursor: pointer;
}
</style>
<script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.popup').show();
$('.close').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});


 

$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
});
</script>
<div class='popup'>
<div class='cnt223'>
<h1>Welcome To Filkom web!</h1>
<p>
You can check the list of our staff, Lecturer and Student by click on nav-bar on the top. thank you for visiting us.
<br/>
<br/>
<a href='' class='close'>Close</a>
</p>
</div>
</div>

</head>
<body>
	<nav class="navbar navbar-inverse">
 	 <div class="container-fluid">
  	  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://localhost/semweb/"><kbd>HOME</kbd></a>
     </div>
     <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav">
        <li><a href="http://localhost/semweb/Staff/">Staff</a></li>
        <li><a href="http://localhost/semweb/Lecturer/">Lecturer</a></li>
        <li><a href="http://localhost/semweb/Mahasiswa/">Student</a></li>
       </ul>
      </div>
     </div>
	</nav>

<div class="container">
	
</div>
</body>
</html>