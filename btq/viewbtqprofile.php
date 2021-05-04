<?php
session_start();
$btq_id=$_SESSION["btq_id"];
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
    <style>
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
   


   
        <section>
            <?php 
			require_once("../classes/DataAccess.class.php");
			$dao = new DataAccess();
			$fields=array("btq_name","btq_owner","btq_address","btq_phone","btq_lic","btq_email");
			if($boutique = $dao->getData($fields,"tbl_btqreg","btq_id=$btq_id"))
			{
				//var_dump(students);
				?>`
            <table>
                <tr>

                    <th>Boutique Name</th>
                    <th>Owner Name</th>

                    <th>Address</th>
                    <th>Phone</th>
                    <th>License Number</th>
                    <th>Email</th>
                    <th>Update</th>



                </tr>
                <?php
						foreach($boutique as $btq)
						{
							?>
                <tr>

                    <td><?php echo $btq["btq_name"]; ?></td>
                    <td><?php echo $btq["btq_owner"]; ?></td>
                    <td><?php echo $btq["btq_address"]; ?></td>

                    <td><?php echo $btq["btq_phone"]; ?></td>
                    <td><?php echo $btq["btq_lic"];?></td>
                    <td><?php echo $btq["btq_email"]; ?></td>
                    <td><a class="btn" href="updateprofile.php">update</a></td>



                </tr>

                <?php
						}

						?>

           


            <?php
			}
			else
			{
				echo "<h3>No boutiques found ".$dao->getErrors()."</h3>";
			}


		?>
        </section>

   </div>
</table>
</body>

</html>