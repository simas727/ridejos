 
<?php 
include("sql.php");

echo "
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>

<title>$title</title>
<style>
*{
	padding:0;
	margin:0;
}
 body{
	 background:black;
 }
 .logo{
	 color:white;
 }
 .content{
	 width:20%;
 }
</style>

</head>
<body>
<div class='logo'>
 <h1>LOGO</h1>
 </div>
<div id= class=' w3-bar w3-border w3-light-grey'>
 <a class='w3-bar-item w3-button' href='http:://www.google.lt'>Google</a>
<a class='w3-bar-item w3-button' href='http://bing.com'>bing </a>
<a class='w3-bar-item w3-button' href='http://fearrust.eu'>FEARrust</a>
</div>
<div class='w3-panel w3-green'>
  <h3><center>website just started! welcome </center></h3>
 </div> 
 
 <div class='content w3-container w3-white s' >
  <h1> topic </h1>
  <p>offtopic</p>
  
 
</body>
</html>
";

?>