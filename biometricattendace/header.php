<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href="css/bootstrap.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css"/>
</head>
<header>
	<div class="header" style="display: flex; align-items: center; justify-content: space-between; padding: 10px; width: 100%; height: 130px; background:#000C29;">

		<!-- Left section: Logo and university text -->
		<div style="display: flex; align-items: center; gap: 20px;">
      <img src="https://i.postimg.cc/D0HCN1Yx/kdulogo-removebg-preview.png" alt="kdu logo" style="width: 130px; height: auto;">

     <!-- Adding the university text -->
	 <div style="color: #ffffff; font-size: 24px; line-height: 1.2;">
        <p style="margin: 0;">General Sir John Kotelawala</p>
        <p style="margin: 0;">Defence University</p>
		<div style="color: #ffffff; font-size: 14px; line-height: 1.2;">
        <p style="margin: 0;">For the Motherland Forever | සිය රටටම‍යි කවදත්</p>
		
		</div>
      </div>
    </div>
    
    <!-- Dashboard Right-aligned text -->
    <h1 style="font-size: 300px; color: #ffffff; font-weight: bold; margin: 0; margin-left: auto;"> Biometric Attendance   Management   System</h1>
  </div>


	

<?php  
  if (isset($_GET['error'])) {
		if ($_GET['error'] == "wrongpasswordup") {
			echo '	<script type="text/javascript">
					 	setTimeout(function () {
			                $(".up_info1").fadeIn(200);
			                $(".up_info1").text("The password is wrong!!");
			                $("#admin-account").modal("show");
		              	}, 500);
		              	setTimeout(function () {
		                	$(".up_info1").fadeOut(1000);
		              	}, 3000);
					</script>';
		}
	} 
	if (isset($_GET['success'])) {
		if ($_GET['success'] == "updated") {
			echo '	<script type="text/javascript">
			 			setTimeout(function () {
			                $(".up_info2").fadeIn(200);
			                $(".up_info2").text("Your Account has been updated");
              			}, 500);
              			setTimeout(function () {
                			$(".up_info2").fadeOut(1000);
              			}, 3000);
					</script>';
		}
	}
	if (isset($_GET['login'])) {
	    if ($_GET['login'] == "success") {
	      echo '<script type="text/javascript">
	              
	              setTimeout(function () {
	                $(".up_info2").fadeIn(200);
	                $(".up_info2").text("You successfully logged in");
	              }, 500);

	              setTimeout(function () {
	                $(".up_info2").fadeOut(1000);
	              }, 4000);
	            </script> ';
	    }
	  }
?>
<div class="topnav" id="myTopnav" style="background: #526D82; padding:10px;">
  <a href="index.php" style="padding:10px 93px;font-weight: bold;";>Students</a>
    <a href="ManageUsers.php" style="padding:10px 91px;font-weight: bold;">Register</a>
    <a href="UsersLog.php" style="padding:10px 93px;font-weight: bold;">Students Log</a>
    <a href="devices.php" style="padding:10px 93px;font-weight: bold;">Department</a>
  <style>
  .topnav a {
    padding: 10px 30px;
    color: white;
    text-decoration: none;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .topnav a:hover {
    background-color: #465E71; /* Change this to your desired hover background color */
    color: #E6E7E9; /* Change this to your desired hover text color */

  }
  </style>
    <?php  
    	if (isset($_SESSION['Admin-name'])) {
    		/*echo '<a href="#" data-toggle="modal" data-target="#admin-account">'.$_SESSION['Admin-name'].'</a>';*/
    		echo '<a href="logout.php" style="padding:10px 93px;font-weight: bold;">Log out</a>';
    	}
    ?>

    <a href="javascript:void(0);" class="icon" onclick="navFunction()">
	  <i class="fa fa-bars"></i></a>
</div>
<div class="up_info1 alert-danger"></div>
<div class="up_info2 alert-success"></div>
</header>

<script>
	function navFunction() {
	  var x = document.getElementById("myTopnav");
	  if (x.className === "topnav") {
	    x.className += " responsive";
	  } else {
	    x.className = "topnav";
	  }
	}
</script>


	

	
