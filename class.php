 
         
<?php 
session_start();
  
class page
{
	function gallery(){
		include("sql.php");
		/*
		<div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="../images/tunnel.jpg">
                        <img src="../images/tunnel.jpg" alt="Tuneel">
                    </a>
                    <div class='caption'>
                        <h3>Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
		*/
		if($_GET["page"] == "galerija"){
		
		$sql = "SELECT * FROM galerija";
$result = $conn->query($sql);
echo "  
       <div class='row'>
<div class='tz-gallery'>


                
 ";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " <div class='col-sm-6 col-md-4'> <div class='thumbnail'> <a class='lightbox' href='".$row["image"]."'><img style='max-height:150px;' src='".$row["image"]."'> </img></a> </div> </div>";
    }
} else {
    echo "0 results";
}
echo "      
			</div>
			</div>";
		}
if($_GET["page"] == "g"){
	$imgid = $_GET["imageid"];
	$imgname = $_GET["imagename"];
	echo "a".$imgid."b".$imgname;
	
	//unlink("");
}
	 
 if($_GET["page"] == "admindeletegalerija"){
		$this->checkk();
		$sql = "SELECT * FROM galerija";
$result = $conn->query($sql);
echo "  
       <div class='row'>
 

                
 ";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " <div class='col-sm-6 col-md-4'>
		<div class='thumbnail'> 
		<a href='/pg/g/imageid/".$row["id"]."/imagename/".$row["image"]."'>
		<img style='max-height:150px;' src='http://ridejos.lt/".$row["image"]."'> </img>
		</a> </div> </div>";
    }
} else {
    echo "0 results";
}
echo "      
		 
			</div>";
		}
	 
	}
	function about(){
		include("sql.php");
		if($_GET["page"] == ""){
		echo "
	  <img style='max-height:150px;   border-radius:20%;' src='img/rrr.jpg'></img>
	 ";
		$sql = "SELECT * FROM about";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<hr />".$this->bbcodes($row["post"]);
    }
} else {
    echo "0 results";
}
		}
		
	}
	function forumcat(){
		include("sql.php");
		if($_GET["page"] == "forum"){
			$cat = $_GET["cat"];
			$post = $_GET["topic"];
			
			if(empty($_GET["topic"])){
			}else{
					echo "<style>
			#forumtopics{
				display:none;
			}
			#forumcat{
				display:none;
			}
			</style>
			";
		 
		 
			$sql = "SELECT * FROM forum_posts where post_topic = '$post'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["post_content"];
    }
} else {
    echo "0 results";
}

			}
			if(empty($_GET["cat"])){
			}else{
			echo "<style>
			#forumcat{
				display:none;
			}
			</style>
			";
			echo "
			<table class='table' id='forumtopics'>
			<thead>
			<tr>
			<td>forumas</td>
			<td></td>
			 
			</tr>
			</thead>
			<tbody>
			";
		 
			$sql = "SELECT * FROM forum_topic where topic_cat = '$cat'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><a href='?page=forum&topic=".$row["topic_id"]."'>" . $row["topic_name"]. "</a></td></tr>";
    }
} else {
    echo "0 results";
}
			
			
			
		 
			
			 echo "
			</tbody>
			</table>
			";
			}
		}
	}
	function forum(){
		$this->forumcat();
		include("sql.php");
		echo "
			<table class='table' id='forumcat'>
			<thead>
			<tr>
			<td>forumas</td>
			<td></td>
			 
			</tr>
			</thead>
			<tbody>
			";
		if($_GET["page"] == "forum"){
			$sql = "SELECT * FROM forum_cat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><a href='?page=forum&cat=".$row["cat_id"]."'>" . $row["cat_name"]. "</a><br /> ".$row["cat_desc"]."</td></tr>";
    }
} else {
    echo "0 results";
}
			
			
			
		 
			
			 echo "
			</tbody>
			</table>
			";
		}
		
	}
	function admincreatenews(){
		include("sql.php");
		if($_GET["page"] == "admincreatenews"){
			$this->checkk();
		echo "
		<br />
		<br />
		<form method='post'>
		<input type='text' name='title' class='form-control'><br />
		<textarea placeholder='postas' name='post' class='form-control'></textarea><br />
		<input type='submit' class='btn btn-default'>
		</form>
		<br />
		<br />
		";
	$post   = $_POST["post"];
	$title  = $_POST["title"];
	$author = $_SESSION["username"];
	$date = date("Y-m-d H:i");
		
	
	if(empty($post)){
		
	}elseif(empty($title)){
		
	}else{
	$sql = "INSERT INTO news (title, post, author,date,udate)
VALUES ('$title', '$post','$author','$date','')";

if ($conn->query($sql) === TRUE) {
    echo "sukurta puikiai";
	echo "<script>window.history.back();</script>";
	 	
	header("refresh: 1");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}	
	}
		}
	}
	function admindeletenews(){
		include("sql.php");
		
					 		  if(isset($_GET["deletenewsbyid"])){
								  $this->checkk();
 	                    $postid = $_GET["deletenewsbyid"];
						 $sql = "DELETE FROM news WHERE id=$postid";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
	echo "<script>window.history.back();</script>";
	header("refresh: 1");
} else {
    echo "Error deleting record: " . $conn->error;
}
							  }
				 		  if($_GET["page"] == "admindeletenews"){
 	 echo "<div class='row'>";
				
					 $sql = "SELECT * FROM news GROUP BY id  DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
		<div class='list-group'>
  <a href='?deletenewsbyid=".$row["id"]."' class='list-group-item'>".$row["title"]."</a>
</div> 
		
		
		 
		";
    }
} else {
    echo "<center><h1>Naujienu nėra.</h1></center>";
}
echo "</div>



";

						  }
	}
	function admineditnewsform(){
		  include("sql.php");
		  $id = $_POST["neid"];
		  $email = $_POST["email"];
		  $text = $_POST["netext"];
		   $date = date("Y-m-d H:i");
  if(empty($text)){
			 
		 }else{
			 
			 $sql = "UPDATE news SET title='$title', post='$text', email='$email', udate='$date' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "redagavimas pavyko";
		echo "<script>window.history.back();</script>";
	 	
	header("refresh: 1");
} else {
    echo "Error updating record: " . $conn->error;
}
		 }
	}
		function admineditaboutform(){
		  include("sql.php");
		  $id = $_POST["neid"];
		   $text = $_POST["netext"];
  if(empty($text)){
			 
		 }else{
			 
			 $sql = "UPDATE about SET post='$text' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "redagavimas pavyko";
		echo "<script>window.history.back();</script>";
	 	
	header("refresh: 1");
} else {
    echo "Error updating record: " . $conn->error;
}
		 }
	}

	function checkk(){
		 if($_SESSION["admin"] < 1){
			 header("location: index.php");
		 }
	}
	 function admineditnews(){
		 include("sql.php");
		 
		if($_GET["page"] == "admineditabout"){
			$this->checkk();
					 $sql = "SELECT * FROM about  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='col-sm-4'>". $row["post"]. " <br /> </div><br />";
    }
} else {
    echo "<center><h1>Naujienu nėra.</h1></center>";
}
echo "

 <br />
 bbkodai 
[b]<b>paryškintas tekstas</b>[/b] /n - perkelia i kita eilute { :) :p :D } - smailai
<br /><form method='post'> 
 <br /><textarea placeholder='Info' name='netext' class='form-control' rows='5' ></textarea>
<input class='btn btn-default' type='submit'><br />
<br />
<br />

</form>
";
			$this->admineditaboutform();
		}
					
		 		  if($_GET["page"] == "admineditnews"){
					  $this->checkk();
 	 echo "<div class='row'>";
				
					 $sql = "SELECT * FROM news GROUP BY id  DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='col-sm-4'>". $row["post"]. " <br /><br /><br /><hr /> paštas i kuri gaunami laiškai yra: ". $row["email"]." </div><br />";
    }
} else {
    echo "<center><h1>Naujienu nėra.</h1></center>";
}
echo "
</div>
 <br />
 bbkodai 
[b]<b>paryškintas tekstas</b>[/b] /n - perkelia i kita eilute { :) :p :D } - smailai
<br /><form method='post'> 
<br /> <input placeholder='myemail@gmail.com' type='email' name='email' class='form-control'>
 <br /><textarea placeholder='Info' name='netext' class='form-control' rows='5' ></textarea>
<input class='btn btn-default' value='siųsti' type='submit'><br />
<br />
<br />

</form>";
$this->admineditnewsform();

				  }
	 }
 
	 function uploadphoto(){
		 include("sql.php");
		 if($_GET["page"] == "adminuploadphoto"){
			 echo "
			 <form   method='post' enctype='multipart/form-data'>
    pasirinkite nuotrauka : 
    <input type='file' name='fileToUpload' id='fileToUpload'>
    <input type='submit' value='Upload Image' name='submit'>
</form>
<br />
nuotrauka keliama i serveri tuo pačiu užrašoma i duom baze todėl rezultatus matome 2 <br />
nuotrauka užregistruota <br />
failas ikeltas

			 
			 ";
			  
			 		 $target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(empty($_POST["submit"])){
}else{
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "ne nuotrauka atmesta";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "atleiskit failas jau egzistuoja";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "failas per didelis";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Atleiskit tik JPG, JPEG, PNG & GIF failai yra priimtini";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "klaida ikelti nepavyko";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $image = basename( $_FILES["fileToUpload"]["name"]);
	$sql = "INSERT INTO galerija (image)
VALUES ('$target_dir"."$image')";

if ($conn->query($sql) === TRUE) {
    echo "Nuotrauka užregistruota eikite i galerija <br />";
} else {
    echo "klaida: " . $sql . "<br>" . $conn->error;
}

	  echo "failas ". basename( $_FILES["fileToUpload"]["name"]). " ikeltas";
    } else {
        echo "ivyko klaida keliant faila";
    }
	}
}
			 }
 
	 }
	function adminmain(){
		// 
		$this->uploadphoto();
		$this->admineditnews();
		$this->admindeletenews();
		$this->admincreatenews();
		if($_GET["page"] == "exit"){
			echo "<script>window.history.back();</script>";
	 	 session_destroy();
		 header("refresh: 1");
		
	}
	if($_GET["page"] == "adminmain"){
				  include("sql.php");	
					 $sql = "SELECT * FROM news GROUP BY id  DESC";
$result = $conn->query($sql);
 
$newscount = mysqli_num_rows($result);
$videocount = mysqli_num_rows($resultI);
$rulescount = mysqli_num_rows($resultII);
 if(empty($_SESSION["admin"])){
	 $this->login();
 }elseif($_SESSION["admin"] > 0){
			
		echo "
		 <div class='row'>
    <div class='col-sm-4'>
	<h1 data-toggle='collapse' data-target='#newsmenu'>Kontaktai</h1>
			<div id='newsmenu'>
		<a href='/pg/admineditnews' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span></a>
    

	</div>
  <h1 data-toggle='collapse' data-target='#gallerymenu'>Galerija</h1>
   <div id='gallerymenu'>
   <a href='/pg/adminuploadphoto' class='btn btn-primary'><span class='glyphicon glyphicon-camera'></span></a>
    
   </div>
   <h1 data-toggle='collapse' data-target='#about'>apie</h1>
   <div id='about'>
   <a href='/pg/admineditabout' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span></a>
    
   </div>
	</div>
   
	 
	 </div>
	";
		
		}else{
			header("location: index.php");
		}
	}
	}
	function pollresult(){
		include("sql.php");
		
			$sql = "SELECT * FROM pollanswers order by id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $id = $row["id"];
	
	$sqlz = "SELECT * FROM pollquestions where pollid='$id' order by id";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {
    // output data of each row
    while($rowz = $result->fetch_assoc()) {
		 echo "<h1 style='color:white'>".$rowz["question"]."</h1>";

 
	
	
	if(!empty($row["an1"])){
    
	echo "<p style='color:white'>".$rowz["an1"].":".(100*round($row["an1"]/($row["an1"]+$row["an2"]+$row["an3"]+$row["an4"]+$row["an5"]),2)). "% <br/> </p>";
 
 } 
 	
	if(!empty($row["an2"])){
    
	echo "<p style='color:white'>".$rowz["an2"].":".(100*round($row["an2"]/($row["an1"]+$row["an2"]+$row["an3"]+$row["an4"]+$row["an5"]),2)). "% <br /> </p>";
 
 } 
 if(!empty($rowz["an3"])){
		 echo "<p style='color:white'>".$rowz["an3"].":".(100*round($row["an3"]/($row["an1"]+$row["an2"]+$row["an3"]+$row["an4"]+$row["an5"]),2)). "%<br /></p>";

	}
	 if(!empty($rowz["an4"])){
		 echo "<p style='color:white'>".$rowz["an4"].":".(100*round($row["an4"]/($row["an1"]+$row["an2"]+$row["an3"]+$row["an4"]+$row["an5"]),2)). "%<br /></p>";

	}
	 if(!empty($rowz["an5"])){
		 echo "<p style='color:white'>".$rowz["an5"].":".(100*round($row["an5"]/($row["an1"]+$row["an2"]+$row["an3"]+$row["an4"]+$row["an5"]),2)). "%<br /></p>";

	}
	}
}else{
	
}
	 
	
}}else{
	
}
	}
	function support(){
		 if($_GET["page"] == "contact"){
			 	include("sql.php");
		
		 echo " <h2 class='title'><a href='#'>SUSISIEKTI</a></h2>";
		 	
		?>
		<form method="post">
		<input type="button" id="mygtukasred" value="radau čyteri" onclick="cheateron()" />
		<input type="button" id="mygtukasred" value="blogas admin" onclick="adminr()" />
<input type="button" id="mygtukasgreen" value="kita" onclick="other()" />
<input type="button" id="mygtukasblue" value="paremiau serveri" onclick="donate()" />
		
		<div id="cheateron"  style="display:none;" >

		
		<?php //pranešti cheateri
  //tavo slapyvardis 
  //cheaterio slapyvardis arba steam profilis 
  //priežastis 
 		
		?>
		<br />
		<br />
		<br /> Tavo steam slapyvardis   
		<br /><input type='text' name='csusername'>
		<br /> Cheaterio steam slapyvardis arba profilio url 
		<br /><input type='text' name='cusername'>
		<br /> priežastis 
		<br /><input type='text' name='creason'> 
		
		<br /><input type='submit' name='csubmit'>
		<br />
		
		</div>
		<div id='adminrr'  style='display:none;' >

		
		<?php 
		/* cheater on
		
		csusername
		cusername
		creason
		csubmit
		
		-- admin 
		asusername
		ausername
		areason
		asubmit
		--kita
		kusername
		kzinute
		osubmit
		--donate
		dsusername
		dsteamid
		dsubmit
		*/
		
		//admin blogai elgiasi panešk 
        //tavo slapyvardis (steam)
		// administratoriaus vardas
  		
		?>
		<br /> Tavo steam slapyvardis   
		<br /><input type='text' name='asusername'>
		<br /> Cheaterio steam slapyvardis arba profilio url 
		<br /><input type='text' name='ausername'>
		<br /> priežastis 
		<br /><input type='text' name='areason'> 
		
		<br /><input type='submit' name='asubmit'>
		<br />
		
		</div>
		<div id='otherr' style='display:none;' >

		 
		<?php //kitka 
		//vardas
		//žinute
	 	
		
		?>
		<br /> Tavo steam slapyvardis   
		<br /><input type='text' name='kusername'>
		<br /> žinute
		<br /><textarea name='kzinute'></textarea>
		 
		<br /><input type='submit' name='osubmit'>
		<br />
		
	</div>
		<div id="donate"  style="display:none;" >

		 
		<?php //pranešti paremima 
		//vardas
		//steamid 
		//laikas
		 
		?>
		<br /> Tavo steam slapyvardis   
		<br /><input type='text' name='dsusername'>
		<br /> steamid 
		<br /><input type='text' name='dsteamid'>
		<br />kokiu laiku buvo paremta tiksliai ? Y/M/D/H/S
		<br /><input type='text' name='ddate'> 
		
		<br /><input type='submit' name='dsubmit'>
		<br />
		
		</div>
<?php 
 $reportspam = $_SESSION["reportspam"];
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
if($reportspam >= $maxspam){
	$sql = "INSERT INTO badip (ip)
VALUES ('$ip')";
$sqlz = "SELECT * FROM badip where ip='$ip'";
$result = $conn->query($sqlz);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 


	}
}else{
	if ($conn->query($sql) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
 
$sql = "SELECT * FROM badip where ip='$ip'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "jusu ip blokuojamas todėl negalite toliau spaminti";
	   }
} else {
?>
</form>
 <?php
	/* cheater on
		
		$_POST['csusername'];
		$_POST['cusername'];
		$_POST['creason'];
		$_POST['csubmit'];
		
		
		--kita 
		
		--donate'];
		$_POST['dsusername'];
		$_POST['dsteamid'];
		$_POST['dsubmit'];
		*/
 
  		
$find = array("<",">");
$replace = array(".");
   
        $csusername = str_replace($find,$replace,$_POST['csusername']);
		$cusername  = str_replace($find,$replace,$_POST['cusername']);
		$creason    = str_replace($find,$replace,$_POST['creason']);
		$csubmit    = str_replace($find,$replace,$_POST['csubmit']);
  // admin 
		$asusername = str_replace($find,$replace,$_POST['asusername']);
	    $ausername = str_replace($find,$replace,$_POST['ausername']);
		$areason = str_replace($find,$replace,$_POST['areason']);
		$asubmit = str_replace($find,$replace,$_POST['asubmit']);
        //kita
		$kusername = str_replace($find,$replace,$_POST['kusername']);
		$kzinute = str_replace($find,$replace,$_POST['kzinute']);
		$osubmit = str_replace($find,$replace,$_POST['osubmit']);
	    //donate 
        $dsusername = str_replace($find,$replace,$_POST['dsusername']);
		$dsteamid = str_replace($find,$replace,$_POST['dsteamid']);
		$ddate = str_replace($find,$replace,$_POST['ddate']);
	    $dsubmit = str_replace($find,$replace,$_POST['dsubmit']);
		

 		if(isset($csubmit) && !empty($csubmit)){
			$reportspam = $_SESSION["reportspam"];
		
		$sql = "INSERT INTO reportcheater (vardas, cheateris,reason,ip)
VALUES ('$csusername', '$cusername', '$creason','$ip')";
if(!empty($csusername) && !empty($cusername) && !empty($creason)){

if ($conn->query($sql) === TRUE) {
unset($_POST);   
   $_SESSION["reportspam"] ++; 
	echo "pareiškimas pateiktas | spam: $reportspam";
 
	} else {
	
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
		}elseif(isset($asubmit) && !empty($asubmit)){
			
			$sql = "INSERT INTO reportadmin (name, adminname, reason,ip)
VALUES ('$asusername', '$ausername', '$areason','$ip')";

if ($conn->query($sql) === TRUE) {
     $_SESSION["reportspam"] ++; 
	
   echo "New record created successfully r $reportspam";

	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
		}elseif(isset($osubmit) && !empty($osubmit)){
			$reportspam = $_SESSION["reportspam"];
		
					$sql = "INSERT INTO contactother (vardas, zinute, ip)
VALUES ('$kusername', '$kzinute', '$ip')";
if(!empty($kusername) && !empty($kzinute)  ){

if ($conn->query($sql) === TRUE) {
  
  $_SESSION["reportspam"] ++; 
	
  echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
		}elseif(isset($dsubmit) && !empty($dsubmit)){
			$reportspam = $_SESSION["reportspam"];
		
					$sql = "INSERT INTO remejai (vardas, steamid, data,ip)
VALUES ('$dsusername', '$dsteamid', '$ddate','$ip')";
if(!empty($dsusername) && !empty($dsteamid) && !empty($ddate)){
if ($conn->query($sql) === TRUE) {
   
  $_SESSION["reportspam"] ++; 
	
   echo "paraiška pateikta";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

		}
 
}	

 ?>
 <br />
 <br />
 
		<script>
		function cheateron() {
   document.getElementById('cheateron').style.display = "block";

   
    document.getElementById('donate').style.display = "none";
  document.getElementById('otherr').style.display = "none";
  document.getElementById('admin-r').style.display = "none";

  
  
   }
	function adminr() {
    document.getElementById('cheateron').style.display = "none";

   
    document.getElementById('donate').style.display = "none";
  document.getElementById('otherr').style.display = "none";
  document.getElementById('adminrr').style.display = "block";

   
   }
   function other() {
    document.getElementById('cheateron').style.display = "none";

   
    document.getElementById('donate').style.display = "none";
  document.getElementById('otherr').style.display = "block";
  document.getElementById('adminrr').style.display = "none";

   
   }
   
   
   function donate() {
    document.getElementById('cheateron').style.display = "none";

   
    document.getElementById('donate').style.display = "block";
  document.getElementById('otherr').style.display = "none";
  document.getElementById('adminrr').style.display = "none";

   
   }
		</script>
		
		<?php
		
		  }
		
	}
	function serverrules(){
		include("sql.php");
		
		if($_GET["page"] == "rules"){
			 echo " <h2 class='title'><a href='#'>TAISYKLĖS</a></h2>";
				echo "<ul>  ";
			
			$sql = "SELECT * FROM rules";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<center> <h3><img src='bullet.png' width='170px' height='80px;' align='middle'>" . $row["rule"]." | už taisyklės pažeidima gresia ".$row["action"]."</h3></center><br />";
    }
} else {
    echo "<center><h2>taisykliu kolkas nėra</h2></center>";
}
		 }
	}
	function menu(){
		include("sql.php");
		
	}
	function donateme(){
		  if($_GET["page"] == "donate"){
						 echo " <h2 class='title'><a href='#'>PARAMA</a></h2>";
				 $parama = "
<center>
<h1> sms</h1>
			 <table border='1'>
       <tbody><tr>
        <th>Tel. nr.</th>
        <th>Žinutės tekstas</th>
        <th>Žinutės kaina</th>
        
       </tr>
              <tr align='center'>
        <td>1679</td>
        <td>iv1 simas727</td>
        <td>1.00 EUR</td>
        
       </tr>
              <tr align='center'>
        <td>1679</td>
        <td>iv2 simas727</td>
        <td>2.00 EUR</td>
      
       </tr>
              <tr align='center'>
        <td>1679</td>
        <td>iv3 simas727</td>
        <td>3.00 EUR</td>
 
       </tr>
              <tr align='center'>
        <td>1679</td>
        <td>iv4 simas727</td>
        <td>4.00 EUR</td>
        
       </tr>
              <tr align='center'>
        <td>1679</td>
        <td>iv5 simas727</td>
        <td>5.00 EUR</td>
      
       </tr>
              <tr align='center'>
        <td>1679</td>
        <td>iv6 simas727</td>
        <td>6.00 EUR</td>
        
       </tr>
              <tr align='center'>
        <td>1679</td>
        <td>iv7 simas727</td>
        <td>7.00 EUR</td>
        
       </tr>
              <tr align='center'>
        <td>1679</td>
        <td>iv8 simas727</td>
        <td>8.00 EUR</td>
         
       </tr>
             </tbody></table> <br /> 
			 <b>PASTABA:</b> SMS žinutės turi būti siunčiamos tik numeriu 1679, tik iš Lietuvos mobilaus ryšio operatorių. Mėnesio eigoje iš vieno telefono numerio galima išsiųsti ne daugiau kaip 60 EUR bendros vertės SMS žinučių. Dovana negrąžinama ir skiriama tik SMS žinutėje nurodytam naudotojui. Už žinutės tekstą atsakingas SMS siuntėjas.<br />
			 siunčiant suma didesne nei du eurai patartina gale žinutės teksto irašyti savo steamid. Tai butina padaryti dėl apdovanojimo privilegijomis ar panašiai.
kitu atveju norint gauti vip ar pan. Už parama serveriui reikia pranešti administracijai savo steamid bei kokiu laiku buvo iš siusta žinute. siunčiant suma didesne nei du eurai patartina gale žinutės teksto įrašyti savo steamid. Tai būtina padaryti dėl apdovanojimo privilegijomis ar panašiai.
kitu atveju norint gauti vip ar pan. Už parama serveriui reikia pranešti administracijai savo steamid bei kokiu laiku buvo iš siusta žinute.  

			 <br />
			 <hr />
			 <br />
			 <h1>banku</h1>
			 <br />
			 saskaita: LT173500010001454242 <br />
			 IBAN sąskaita skirta pervedimams tik EUR valiuta SEPA.<br />
Swift kodas: EVIULT21XXX<br />
Banko kodas: 35000<br />
Banko pavadinimas: „Paysera LT“, UAB<br />
Banko adresas: Mėnulio g. 7, Vilnius, LT-04326, Lietuva<br />
	<br /><b>mokėjimo paskirtyje nurodykite steamid </b>		 
			
           <h1>paypal</h1> <br />
		   <a href='paypal.me/RustServeris'><img src='https://static1.squarespace.com/static/55f19172e4b0d34cb3ea44c2/t/568b23f4d82d5e25a61266cb/1483408910831/?format=300w'></img></a>
	
			</center>
			 ";
			echo $this->bbcodes($parama);
		  }
	}
	function bbcodes($post){
 
					$find = array("[b]","[/b]","/n","<",">",":)",":p",":D");
$replace = array("<b>","</b>","<br />","<",">","<img src='/img/smile/smile.gif'> </img>","<img src='/img/smile/puh2.gif'> </img>","<img width='20' height='20' src='https://discordapp.com/assets/b731b88b6459090c02b8d1e31a552c5a.svg'> </img>");
	$post = str_replace($find,$replace,$post);       
 $post = preg_replace("~(https?://(?:www\.)?[^\s]+)~i","<a href='$1'>$1</a>",$post);
		return $post;
	}
	function defaultpage(){
		include("sql.php");
		
		  if($_GET["page"] == "susisiekti"){
			  
 	 echo "
	 <h1>susisiekti</h1>
	 <form method='post'>
	 <div class='form-group'>
  <label for='usr'>Vardas:</label>
  <input type='text' class='form-control' name='name'>
</div>
 <div class='form-group'>
  <label for='usr'>El paštas:</label>
  <input type='email' class='form-control' name='email'>
</div>
<div class='form-group'>
  <label for='text'>žinute:</label>
  <textarea class='form-control' name='ctext'></textarea>
</div> 
<div class='form-group'>
  <input type='submit' value='siųsti' name='submit' class='btn btn-sucess'>
</div> 

</form><hr />";
$textukas = $_POST["ctext"];
$name = $_POST["name"];
$emails = $_POST["name"];

 				$find = array("[b]","[/b]","/n","<",">",":)",":p",":D");
$replace = array("<b>","</b>","<br />","<",">","<img src='/img/smile/smile.gif'> </img>","<img src='/img/smile/puh2.gif'> </img>","<img width='20' height='20' src='https://discordapp.com/assets/b731b88b6459090c02b8d1e31a552c5a.svg'> </img>");
		
					 $sql = "SELECT * FROM news GROUP BY id  DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


	   echo  $this->bbcodes($row['post']);
	  // echo  $this->bbcodes($row['email']);
	if(isset($_POST["submit"])){  
	if(empty($name)){
			echo  "<div class='alert alert-warning'>
              Vardo laukas neturi būti tuščias
</div>";
	}elseif(empty($textukas)){
			echo "<div class='alert alert-warning'>
 žinute negali būti tuščia
 </div>";
	}elseif(empty($emails)){
			echo "<div class='alert alert-warning'>
    El. Pašto laukas privalo būti užpildytas
</div>";
	}else{
	  $to      = $row['email'];
$subject = 'Ridėjos siuntėjas >>'.$name;
$message = $textukas;
$headers = 'siuntėjas:'.$name. "\r\n" .
    'Atsakyti siuntėjui paštu: '. $_POST["email"]. "\r\n";
    ;

$send = mail($to, $subject, $message, $headers);
if($send){
	echo "<div class='alert alert-success'>
  <strong>Ačiū!</strong> laiškas išsiųstas sėkmingai atsakysime kaip galėdami greičiau
</div>";
}else{
	echo "<div class='alert alert-danger'>
  <strong>Klaida!</strong> laiškas neišsiųstas dėl klaidos kreipkitės <a href='http://www.sdweb.lt'>čia</a>
</div>";
}
$_POST["submit"] = "";
	}
	}
	}
} else {
    echo "<center><h1>Naujienu nėra.</h1></center>";
}
				
		 
		 }
	}
	function pagevideo(){
			include("sql.php");
		
		 if($_GET["page"] == "video"){
			 echo "<div class='row'>";
		
					 $sql = "SELECT * FROM videos GROUP BY id  DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if( $row["isfile"] == 1)
	  {
		   
		  echo "<center><h1>".$row["title"]."</h1> <video width='860' height='540' controls><source src='". $row["file"] ."' type='video/mp4'> </video><br><br />".$this->bbcodes($row['description'])."<hr /> </center>";
	  }else{
		  $videolink = $row["link"];
		   $link = str_replace("/watch?v=","/embed/","$videolink");
		  echo "<div class='col-sm-4'><center><h1>".$row["title"]."</h1><iframe width='860' height='540' src='$link' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe><br><br />".$row["description"]."<hr /> </center> </div>";
	     
	  }
	  
	  
	  }
} else {
    echo "<center><h1>jokių irašų nerasta ! </h1></center>";
}
echo "</div>";
		 }
	}
	function votepoll(){
	 	include("sql.php");
		?>
		
		<form method='post'>
  
		<?php 
				$sql = "SELECT * FROM pollanswers order by id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $id = $row["id"];
	
	$sqlz = "SELECT * FROM pollquestions where pollid='$id' order by id";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {
    // output data of each row
	
		
    while($rowz = $result->fetch_assoc()) {
		 echo "<h1 style='color:white'>".$rowz["question"]."</h1>";

 
	
	
	if(!empty($row["an1"])){
    
	echo "<p style='color:white'><input type='radio' name='an' value='1'>".$rowz["an1"]."<br /></p>"; 
 
 } 
 	
	if(!empty($row["an2"])){
    
	echo "<p style='color:white'><input type='radio' name='an' value='2'> ".$rowz["an2"]."<br /></p>";
 
 } 
 if(!empty($rowz["an3"])){
		echo "<p style='color:white'><input type='radio' name='an' value='3'> ".$rowz["an3"] ."<br /></p>"; 
 
	}
	 if(!empty($rowz["an4"])){
		echo "<p style='color:white'><input type='radio' name='an' value='4'> ".$rowz["an4"]."<br /></p>"; 
 
	}
	if(!empty($rowz["an5"])){
		echo "<p style='color:white'><input type='radio' name='an' value='5'>  ".$rowz["an5"]."<br /></p>"; 
 
	}
	
	
	
	}
}else{
	
}
	 
	
}}else{
	
}
      
	 
		?>
	<input type='submit' >
	</form>
	<?php 
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

	
					$sqlb = "SELECT * FROM pollanswers order by id";
$result = $conn->query($sqlb);

if ($result->num_rows > 0) {
    // output data of each row
    while($rowb = $result->fetch_assoc()) {
 
	$an = $_POST['an'];
	 if($an == 1){
		 $anm1 = 1 + $rowb["an1"];
	
	     // UPDATE `pollanswers` SET `an1` = an1 + 1
	$sqlv = "UPDATE pollanswers SET an1 = '$anm1' WHERE id=1";

if ($conn->query($sqlv) === TRUE) {
     $this->pollresult();
	 
	 
	 //ip
	 
	 $sql = "INSERT INTO votedip (ip,forv)
VALUES ('$ip','1')";

if ($conn->query($sql) === TRUE) {
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

	 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	 }elseif($an == 2){
		  $anmII = 1 + $rowb["an2"];
	
		 	$sqlv = "UPDATE pollanswers SET an2 = '$anmII' WHERE id=1";

if ($conn->query($sqlv) === TRUE) {
     $this->pollresult();
	 
	  $sql = "INSERT INTO votedip (ip,forv)
VALUES ('$ip','2')";

if ($conn->query($sql) === TRUE) {
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
		 
	 }elseif($an == 3){
		   $anmIII = 1 + $rowb["an3"];
	
		 	$sqlv = "UPDATE pollanswers SET `an3` = '$anmIII' WHERE id=1";

if ($conn->query($sqlv) === TRUE) {
     $this->pollresult();
	 
	 
	 //sendip
	  $sql = "INSERT INTO votedip (ip,forv)
VALUES ('$ip','3')";

if ($conn->query($sql) === TRUE) {
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
		 
	 }elseif($an == 4){
		  $anmIV = 1 + $rowb["an4"];
	
			 	$sqlv = "UPDATE pollanswers SET `an4` = '$anmIV' WHERE id=1";

if ($conn->query($sqlv) === TRUE) {
     $this->pollresult();
	 
  //sendip	
  
   $sql = "INSERT INTO votedip (ip,forv)
VALUES ('$ip','4')";

if ($conn->query($sql) === TRUE) {
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 
	 }elseif($an == 5){
		   $anmV = 1 + $rowb["an4"];
	
		 	 	$sqlv = "UPDATE pollanswers SET `an5` = '$anmV' WHERE id=1";

if ($conn->query($sqlv) === TRUE) {
     $this->pollresult();
	 
	 
	 //sendip
	  $sql = "INSERT INTO votedip (ip,forv)
VALUES ('$ip','5')";

if ($conn->query($sql) === TRUE) {
 } else {
    echo "Error: IP" . $sql . "<br>" . $conn->error;
}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	 } 
	 } 
}else{
		
	}
	 //f end
	}
	function showpoll(){
		include("sql.php");
					if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
		$sql = "SELECT  * FROM votedip where ip='$ip'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $this->pollresult(); 
	   
   }
} else {
 $this->votepoll();
 
 }
 
 //end f
	}
	function login(){
	include("sql.php");
	echo "
	<form method='post'>
	Slapyvardis:<input type='username' name='usr'>
	Slaptažodis:<input type='password' name='pass'>
	<input type='submit'>
	</form>
	
	
	";  
	if(empty($_POST['usr'])){
		
	}elseif(empty($_POST['pass'])){
		
	}else{
		// čia sql vykdimai 
		$find = array("<",">");
$replace = array(".");
 
		$usr = str_replace($find,$replace,$_POST['usr']);
		$pass = str_replace($find,$replace,$_POST['pass']);
		$hpass = md5($pass);
	    
		$sql = "SELECT * FROM users WHERE username='$usr' AND password='$hpass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $_SESSION["username"] = $row["username"];
	     $_SESSION["admin"] = $row["admin"];
	 
	 header("refresh: 1");
	 }
} else {
    echo "kažkas netaip !";
}
		
		
		
		
		
	}

    //f end	
	}
	function register(){
		include("sql.php");
		echo "
		<form method='post'>
	Slapyvardis:<input type='username' name='usr'>
	Slaptažodis:<input type='password' name='pass'>
	<input type='submit'>
	
	
	
	";  
	if(empty($_POST['usr'])){
		
	}elseif(empty($_POST['pass'])){
		
	}else{
		
		$find = array("<",">");
$replace = array(".");
 
		$usr = str_replace($find,$replace,$_POST['usr']);
		$pass = str_replace($find,$replace,$_POST['pass']);
		$hpass = md5($pass);
		$sql = "INSERT INTO users (username, password,admin)
VALUES ('$usr', '$hpass','1')";

if ($conn->query($sql) === TRUE) {
    echo "Vartotojas užregistruotas <a href='index.php'>grižti i fearrust ? </a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	     
	}
	//end f
	}
	
	function infobarI(){
	echo "<br />
		 <iframe src='https://discordapp.com/widget?id=494222250472505354&theme=dark' width='350' height='500' allowtransparency='true' frameborder='0'></iframe><br />  
		     <a href='ts3server://ts.fearrust.eu/?port=9987'><img width='50' height='50' src='ts3.png' ></img></a>
		  
		   <a href='steam://connect/185.69.55.244:28015'><img width='50' height='50' src='http://i.imgur.com/UJbPOGf.png'></a>
		   <br />
		   <br />
		   <div onclick='login()'> &copy; </div>2018
		   ";
}
	//end class
}


 class spaudimas
 {
 function output(){
		 include("sql.php");
		 		
			$sql = "SELECT * FROM spaudimas order by id";
$result = $conn->query($sql);
echo "<table border='1'>
		<tr>
		<td>sys</td>
		<td>dia</td>
		<td>pulse</td>
		<td>date</td>
		
		</tr>
	     
		 	<tr>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "
		
		<td>".$row["sys"]."</td>
		<td>".$row["dia"]."</td>
		<td>".$row["pulse"]."</td>
		<td>".$row["date"]."</td>
		</tr>
	 ";
		
	}
	
}
echo "
		 </table>";
	 }
	 
	  function insert(){
		 include("sql.php");
		 echo "
		 <form method='post'>
		 sys
		 <input type='number' name='sys'>
		 dia<input type='number' name='dia'>
         pulse<input type='number' name='pulse'>
		 		  <input type='submit'>
		 
		 </form>
		 <hr />
		 ";
		 // 143 87 82 10:57
		 $sys = $_POST['sys'];
		 $dia = $_POST['dia'];
		 $pulse = $_POST['pulse'];
		 $date = date("Y-m-d H:i:s");
		 
		 if($_POST['sys'] == ""){
			 
		 }elseif($_POST['dia'] == ""){
			 
		 }elseif($_POST['pulse'] == ""){
			 
		 }else{
			  
			 	$sql = "INSERT INTO spaudimas (sys, dia,pulse,date)
VALUES ('$sys', '$dia','$pulse','$date')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
	}
	 }
	 
	   function spaudimopage(){
		 include("sql.php");
		 if(empty($_SESSION["spaudimas"])){
	 	echo "
		 <form method='post'>
		 <input type='pass' name='pass'>
		  		 
		 </form>
		 
		
		 ";
	   }else{
		   	echo "ivesk šios dienos spaudimo duomenis<br />";
           $this->insert();
			 echo "išvestine <br />";
			 $this->output();
		 
	   }
		 if($_POST['pass'] == 1998){
            $_SESSION["spaudimas"] = 1;
			 
		 }else{
			 
		 }
	 }
 }
 
 
 /*
 
 
   
 	
 
 */
?>