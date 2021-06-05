<?php
include("../dbconn.php");
session_start();
$cust_id=$_SESSION["cust_id"];
$cust_email=$_SESSION["cust_email"];
if(!isset($_SESSION['cust_name']))
{
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Tailoring</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="table.css">
</head>
<body>

	<div class="filter">
		<?php
	include("custnav.html");
	?>
		
	</div>
	<table>
		<tr>
			<th>Boutique Name</th>
			<th>Date</th>
			<th>Response</th>
			<th>Payment</th>
			<th>Decline</th>
		</tr>
		<?php
		$query="SELECT tbl_btqreg.btq_name,tbl_respond.respond_date,tbl_respond.respond_id FROM tbl_respond INNER JOIN tbl_btqreg ON tbl_btqreg.btq_id=tbl_respond.respond_btqid";
		$res=mysqli_query($conn,$query);
		while($rows=mysqli_fetch_array($res))
            {
            ?>
            <tr>
                <td><?php echo $rows['btq_name'];?></td>
                <td><?php echo $rows['respond_date'];?></td>
                
                <td><a href="view.php?view=<?php echo $rows['respond_id']; ?>">view</td>
                <td>Proceed to pay</td>
                <td><i class="fa fa-trash" aria-hidden="true"></i></td>
            </tr>
            <?php
        }
        ?>		
	</table>
        <?php mysqli_close($conn);
        ?>

</body>
</html>