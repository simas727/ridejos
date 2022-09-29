 
<?php
 
session_start();
// $_SESSION["reportspam"] = 0;
//konfiguracija
$maxspam = 5;
include("class.php");
$globalpage = new page();

 
include("sql.php");
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 

				 $sql = "SELECT * FROM server GROUP BY id  DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<title> " . $row["title"]. " </title> ";
		if($row["off"] == 1){
			die("<center><h1>Svetainė yra laikinai uždaryta</h1> <title> !!</title> ");
		}
    }
} else {
   die("<center><h1>Klaida!! netvarkinga duom bazė ! /h1></center> <title>Klaida !!</title>");
}

?> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="gallery-clean.css">
      <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
   
</head>
<body>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     
    </div>
    <ul class="nav navbar-nav">
      <?php 
	 $sql = "SELECT * FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "<li><a style='".$row["style"]."' href='".$row["link"]."'>".$row["title"]."</a></li>";
    
    }
} else {
   echo "<li><a href='index.php'>Home</a></li>";
}
?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
   <!--  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	  
    -->
			 <!-- Trigger the modal with a button -->
  <?php if($_SESSION["username"] == ""){
  echo "<li><button type='button' class='btn btn-success btn-lg' data-toggle='modal' data-target='#myModal'>Prisijungti</button></li>";
  }else{
	  ?>
	   <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>  <?php echo $_SESSION["username"]; ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		<li class="dropdown-header">paskyra</li> 
 <?php if($_SESSION["admin"] > 0){?>        
		<li><a href="/admin">administravimas</a></li>
 <?php }?>
          <li><a href="/iseiti" class='btn btn-danger'>atsijungti</a></li>
        </ul>
      </li>
	  <?php
  
  }
  ?>
 </ul>
  </div>
</nav> 
 
  
<div class="container gallery-container">
 
<?php 
echo "<img style='max-height:50px;' src='http://ridejos.lt/ridejos.png'> </img>";
 //ridejos.lt/index.php?page=adminmain
$globalpage->about();  
  $globalpage->defaultpage(). "<br />"; 
		$globalpage->adminmain();
		 
		$globalpage->gallery();
 
		 
		?> 
 </div>
<div class="panel panel-default">
  <div class="panel-body"><center>&copy 2018 - <?php echo date("Y"); ?> visos teisės saugomos </center></div>
</div>

 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Prisijungimas (administracijai)</h4>
        </div>
        <div class="modal-body">
         <?php $globalpage->login();?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">uždaryti</button>
        </div>
      </div>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>
