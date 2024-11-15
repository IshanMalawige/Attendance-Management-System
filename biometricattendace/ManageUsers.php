<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Users</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" type="image/png" href="icons/atte1.jpg">
	<link rel="stylesheet" type="text/css" href="css/manageusers.css">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
    </script>   
    <script type="text/javascript" src="js/bootbox.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/manage_users.js"></script>
	<script>
	  	$(window).on("load resize ", function() {
		    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
		    $('.tbl-header').css({'padding-right':scrollWidth});
		}).resize();

	  $(document).ready(function(){
	  	  $.ajax({
	        url: "manage_users_up.php"
	        }).done(function(data) {
	        $('#manage_users').html(data);
	      });
	    setInterval(function(){
	      $.ajax({
	        url: "manage_users_up.php"
	        }).done(function(data) {
	        $('#manage_users').html(data);
	      });
	    },5000);
	  });
	</script>
</head>
<body>
<?php include'header.php';?>
<main>
	<h1 style="color: #000000;">ADD Students, UPDATE & REMOVE</h1>
	<div class="form-style-5">
		<form enctype="multipart/form-data">
			<fieldset>
				<label for="Device" style="color:#ffffff;"><b>Department Name:</b></label>
                    <select name="dev_sel" id="dev_sel" style="background: #99A1A7; color:#00080E;">
                      <option value="0">All Departments</option>
                      <?php
                        require'connectDB.php';
                        $sql = "SELECT * FROM devices ORDER BY device_name ASC";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo '<p class="error">SQL Error</p>';
                        } 
                        else{
                            mysqli_stmt_execute($result);
                            $resultl = mysqli_stmt_get_result($result);
                            while ($row = mysqli_fetch_assoc($resultl)){
                      ?>
                              <option value="<?php echo $row['id'];?>"><?php echo $row['device_dep']; ?></option>
                      <?php
                            }
                        }
                      ?>
                    </select>
			<legend style="color:#ffffff;">Fingerprint ID Info:</legend>
				<label style="color:#ffffff;">Enter Fingerprint ID between 1 & 127:</label>
				<input type="number" name="fingerid" id="fingerid" placeholder="Student Fingerprint ID...">
				<button type="button" name="fingerid_add" class="fingerid_add" style="background: #66717B;">Add Fingerprint ID</button>
			</fieldset>
			<div class="alert">
				<label id="alert"></label>
			</div>
			<fieldset>
				<legend style="color:#ffffff;">Students Info:</legend>
				<input type="hidden" name="finger_id" id="finger_id">
				<input type="hidden" name="dev_id" id="dev_id">
				<input type="text" name="name" id="name" placeholder="Student Name..." style="background: #99A1A7;">
				<input type="text" name="number" id="number" placeholder="Index Number..." style="background: #99A1A7;">
				<!-- <input type="email" name="email" id="email" placeholder="User Email..."> -->
			</fieldset>
			<label style="color:#ffffff;">
				<input type="radio" name="gender" class="gender" value="Female">Female
	          	<input type="radio" name="gender" class="gender" value="Male" checked="checked">Male
	      	</label >
			</fieldset>
				<div class="row">
					<div class="col-lg-4">
						<button type="button" name="user_add" class="user_add" style="background: #66717B;">Add</button>
					</div>
					<div class="col-lg-4">
						<button type="button" name="user_upd" class="user_upd" style="background: #66717B;">Update</button>
					</div>
					<div class="col-lg-4">
						<button type="button" name="user_rmo" class="user_rmo" style="background: #66717B;">Remove</button>
					</div>
				</div>
		</form>
	</div>

	<!--User table-->
	<div class="section">
		
		
			<div id="manage_users"></div>
		
	</div>
</main>
</body>
		<div class="footer" style="padding:0; margin:0; box-sizing:border-box; background: #001323; width:100%; padding:10px; text-align:center; color:#ffffff">
		    <p>2024 Sir John Kotelawela Defence University<br>Copyright @</p>
  	 	</div>
</html>
