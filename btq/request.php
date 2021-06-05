<?php
session_start();
$btq_id=$_SESSION["btq_id"];
include('../dbconn.php');
if(!isset($_SESSION['btq_name']))
{
header('location:../login.php');

}


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
                    <a href="btqhelp.php">
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                        <span>Help</span>
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
        <table>
            <tr>
                <td>customer name</td>
                <td>customer email</td>
                <td>customer phone</td>
                <td>Category</td>
                <td>Subcategory</td>
                <td>Material</td>
                <td>Measurements</td>
                <td>Suggestion</td>
                <td>Proceed</td>
            </tr>
            <?php
            include("../dbconn.php");
            $query="SELECT tbl_custreg.cust_name,tbl_customiseform.custform_mail,tbl_customiseform.cust_id,tbl_customiseform.custform_phn,tbl_category.cat_name,tbl_subcategory.subcat_name,tbl_material.mat_name,tbl_customiseform.custform_measure,tbl_customiseform.custform_sug,tbl_customiseform.custform_id FROM tbl_customiseform INNER JOIN tbl_category ON tbl_category.cat_id=tbl_customiseform.custform_cat INNER JOIN tbl_subcategory ON tbl_subcategory.subcat_id=tbl_customiseform.custform_subcat INNER JOIN tbl_custreg ON tbl_custreg.cust_id=tbl_customiseform.cust_id INNER JOIN tbl_material ON tbl_material.mat_id=tbl_customiseform.custform_mat WHERE custform_btq = '$btq_id'";

            $res=mysqli_query($conn,$query);
            
            while($rows=mysqli_fetch_array($res))
            {
            ?>
            <tr>
                <td><?php echo $rows['cust_name'];?></td>
                <td><?php echo $rows['custform_mail'];?></td>
                <td><?php echo $rows['custform_phn'];?></td>
                <td><?php echo $rows['cat_name'];?></td>
                <td><?php echo $rows['subcat_name'];?></td>
                <td><?php echo $rows['mat_name'];?></td>
                <td><?php echo $rows['custform_measure'];?></td>
                <td><?php echo $rows['custform_sug'];?></td>
                <td><a href="respond.php?respond=<?php echo $rows['custform_id']; ?>">respond</td>
            </tr>
            <?php
            }

            $query="SELECT tbl_custreg.cust_name,tbl_customiseform1.form_email,tbl_customiseform1.cust_id,tbl_customiseform1.form_phone,tbl_category.cat_name,tbl_subcategory.subcat_name,tbl_material.mat_name,tbl_customiseform1.form_measure,tbl_customiseform1.form_sug,tbl_customiseform1.form_id FROM tbl_customiseform1 INNER JOIN tbl_category ON tbl_category.cat_id=tbl_customiseform1.form_cat INNER JOIN tbl_subcategory ON tbl_subcategory.subcat_id=tbl_customiseform1.form_subcat INNER JOIN tbl_custreg ON tbl_custreg.cust_id=tbl_customiseform1.cust_id INNER JOIN tbl_material ON tbl_material.mat_id=tbl_customiseform1.form_mat";

            $res=mysqli_query($conn,$query);
            
            while($rows=mysqli_fetch_array($res))
            {
            ?>
            <tr>
                <td><?php echo $rows['cust_name'];?></td>
                <td><?php echo $rows['form_email'];?></td>
                <td><?php echo $rows['form_phone'];?></td>
                <td><?php echo $rows['cat_name'];?></td>
                <td><?php echo $rows['subcat_name'];?></td>
                <td><?php echo $rows['mat_name'];?></td>
                <td><?php echo $rows['form_measure'];?></td>
                <td><?php echo $rows['form_sug'];?></td>
                <td><a href="respond.php?respond=<?php echo $rows['form_id']; ?>">respond</td>
            </tr>
            <?php
            }
        ?>
        </table>
        <?php mysqli_close($conn);
        ?>
    </div>

</body>

</html>