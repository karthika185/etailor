<?php
session_start();
$btq_id=$_SESSION["btq_id"];
include('../dbconn.php');
if(!isset($_SESSION['btq_name']))
{
header('location:../login.php');

}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>
<!DOCTYPE html>
<html>

<head>
    <title>e-Tailoring</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
       
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    th {
        background-color: #ffb03b;
        color: white;
    }

    .btn {
        background: #ffb03b;
        color: #fff;
        border-radius: 30px;
        margin: 0 0 0 20px;
        padding: 5px 20px;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 1px;
        transition: 0.3s;
        white-space: nowrap;
    }
    
    </style>
</head>

<body>
    <input type="checkbox" id="checkbox">
    <header class="header">
        <h2 class="u-name">e<b>Tailoring</b>
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <i class="fa fa-user" aria-hidden="true"></i>
    </header>
    <div class="body">
        <nav class="side-bar">
            <div class="user-p">
                <img src="img/user.jpg">
                <h4><?php echo $_SESSION["btq_name"];?></h4>
            </div>
            <ul>
                <li>
                    <a href="changepwd.php">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="viewbtqprofile.php">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="addmaterial.php">
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                        <span>Add Materials</span>
                    </a>
                </li>
                <li>
                    <a href="addproduct.php">
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                        <span>Add Products</span>
                    </a>
                </li>
                <li>
                    <a href="request.php">
                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        <span>Requests</span>
                    </a>
                </li>
                <li>
                    <a href="order.php">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="btqnot.php">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li>
                    <a href="../destroysession.php">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php
            include("../dbconn.php");
            $custform_id = $_GET["respond"];
            $sql="SELECT tbl_customiseform.custform_mail,tbl_customiseform.custform_phn,tbl_customiseform.custform_subcat,tbl_material.mat_price FROM tbl_customiseform INNER JOIN tbl_material ON tbl_material.mat_id=tbl_customiseform.custform_mat WHERE custform_id = '$custform_id'";
            $result=mysqli_query($conn,$sql) or die(mysql_error());
            while($row=mysqli_fetch_array($result))
            {
                 $mail = $row['custform_mail'];
                 $phn = $row['custform_phn'];
                 $dress = $row['custform_subcat'];
                 $cost=$row['mat_price'];
            

        ?>
        <form action="respond.php" method="post" class="decor" enctype="multipart/form-data">
            Email
            <input type="text" name= "mail" value= "<?php echo $mail; ?>" >
            <br>
            Phone
            <input type="text" name= "phn" value= "<?php echo $phn; ?>
            " >
            <br>
            Dress
            <input type="text" name= "dress" value= "<?php echo $dress; ?>
            " >
            <br>
            Material
            <input type="text" name= "mat" value= "<?php echo "Material"; ?>
            " >
            <br>
            Total Material
            <input type="text" name= "totmat" value= "" >
            <br>
            Cost
            <input type="text" name= "cost" value= "<?php echo $cost; ?>
            " >
            <br>
            Total Cost
            <input type="text" name= "totcost" value= "">
             
        </form>
       <?php
    }
    ?>

    </div>

</body>

</html>