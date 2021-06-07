<?php
session_start();
$username=$_SESSION["username"];
if(!isset($_SESSION['cust_name']))
{
header('location:../login.php');
}
include("../dbconn.php");
if (count($_POST) > 0)
{
    $result = mysqli_query($conn, "SELECT *from tbl_login WHERE username='" . $_SESSION["username"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"])
    {
        mysqli_query($conn, "UPDATE tbl_login set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["username"] . "'");
        $message = "Password Changed";
    } 


    else
    {
        $message = "Current Password is not correct";
    }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Tailoring</title>
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<?php
	include("custnav.html");
	?>
	<div class="center">
		<h1>Change Password</h1>
		<form action="" method="post" class="decor" enctype="multipart/form-data">
            <br><br><br>
			<div class="txt_field">
				<input type="password" name="currentPassword" >
                <span></span>
                <label><br>CURRENT PASSWORD<h6>(if you are changing password for the first time otp will be your current password)</h6><br><br><br><br></label>
			</div>
			<div class="txt_field">
				<input type="password" name="newPassword">
                <span></span>
                <label>NEW PASSWORD</label>
			</div>
			<div class="txt_field">
				<input type="password" name="confirmPassword">
                <span></span>
				<label>CONFIRM PASSWORD</label>
			</div>
			<input type="submit" name="submit" value="change">
			<h5><font color="red"><?php if(isset($message)) { echo $message; } ?><h5><br><br>
		</form>
	</div>
</body>
</html>